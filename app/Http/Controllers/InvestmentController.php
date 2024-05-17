<?php

namespace App\Http\Controllers;

use App\Http\Requests\CloseInvestment;
use App\Http\Requests\StoreInvestment;
use App\Models\PacketOption;
use App\Services\InvestmentService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class InvestmentController extends Controller
{
    private InvestmentService $investmentService;

    public function __construct(InvestmentService $investmentService)
    {
        $this->investmentService = $investmentService;
    }

    public function index(Request $request)
    {
        $packets = $request->user()->packets;
        $packetOptions = PacketOption::where('status', '!=', PacketOption::STATUS_HIDDEN)->get();
        $history = $this->investmentService->getHistory($request->user());

        return view('investments')->with(compact(
            'packets',
            'packetOptions',
            'history',
        ));
    }

    public function invest(StoreInvestment $request): RedirectResponse
    {
        return $this->investmentService->invest($request->user(), $request->all());
    }

    public function reinvest(StoreInvestment $request): RedirectResponse
    {
        return $this->investmentService->reinvest($request->user(), $request->all());
    }

    public function close(CloseInvestment $request): RedirectResponse
    {
        return $this->investmentService->close($request->user(), $request->all());
    }
}
