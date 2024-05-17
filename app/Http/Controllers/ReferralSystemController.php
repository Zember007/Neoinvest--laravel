<?php

namespace App\Http\Controllers;

use App\Models\Star;

class ReferralSystemController extends Controller
{
    public function index()
    {
        $stars = Star::all();

        return view('referral-system')->with(compact('stars'));
    }
}
