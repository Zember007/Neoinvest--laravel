<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Star;

class ReferralSystemController extends Controller
{
    public function index()
    {
        $stars = Star::all();

        return view('referral-system')->with(compact('stars'));
    }

    public function redirect($id)
    {
        $user = User::query()
                ->where('id', $id) 
                ->first();

        return redirect()->route('register', ['ref' => $user->email?$user->email:$user->login]); 
    }
}
