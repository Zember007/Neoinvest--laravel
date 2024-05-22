<?php

namespace App\View\Components\Modals;

use App\Models\Packet;
use App\Models\PacketOption;
use Illuminate\Support\Str;
use Illuminate\View\Component;

class Invest extends Component
{
    public $packetOptions;

    public string $formId;

    public function __construct($packetOptions)
    {
        $this->packetOptions = $packetOptions;  
        $this->formId = Str::random();
    }

    public function render()
    {
        return view('components.modals.invest');
    }
}
