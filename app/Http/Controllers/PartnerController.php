<?php

namespace App\Http\Controllers;

use App\Services\PartnerService;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    private PartnerService $partnerService;

    public function __construct(PartnerService $partnerService)
    {
        $this->partnerService = $partnerService;
    }

    public function index(Request $request)
    {
        $history = $this->partnerService->getHistory($request->user());
        $referrals = $request->user()
            ->referrals()
            ->with('referred.star')
            ->get();

        $leveledReferrals = $referrals
            ->groupBy('level')
            ->mapWithKeys(function ($items, $level) {
                return [$level => $items->pluck('referred')];
            });
        $starredReferrals = $referrals
            ->groupBy('referred.star.level')
            ->mapWithKeys(function ($items, $level) {
                return [$level => $items->pluck('referred')];
            });

        return view('partners', compact('history', 'leveledReferrals', 'starredReferrals'));
    }
}
