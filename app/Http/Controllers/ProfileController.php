<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class ProfileController extends Controller
{
    public function index()
    {     
        $transactions = auth()->user()->transactions()->withoutCreated()->latest()->get();
        $transfers = auth()->user()->transactions()->transfers()->successful()->get();
        $transferUserIds = $transfers->pluck('payload.receiver_id')
            ->merge($transfers->pluck('payload.sender_id'))
            ->filter(fn($id) => ! is_null($id))
            ->unique()
            ->values()
            ->all();
        $users = User::query()
            ->whereIn('id', $transferUserIds)
            ->get();   
        return view('profile')->with(compact('transactions', 'users'));
    }

    public function deletePhoto(Request $request): RedirectResponse
    {
        $request->user()->deleteProfilePhoto();

        return redirect()->route('settings');
    }
}
