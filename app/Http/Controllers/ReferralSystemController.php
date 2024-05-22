<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Star;

class ReferralSystemController extends Controller
{
    public function index(User $user)
    {
        $stars = Star::all();

        $referrals = User::query()
                ->where('referrer_id', auth()->user()->id)  
                ->get();

        return view('referral-system')->with(compact('stars', 'referrals'));
    }

    public function redirect($id)
    {
        $user = User::query()
                ->where('id', $id) 
                ->first();

        return redirect()->route('register', ['ref' => $user->email?$user->email:$user->login,'ref_id' => $id]);  
    }
}
