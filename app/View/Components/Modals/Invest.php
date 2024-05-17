<?php

namespace App\View\Components\Modals;

use App\Models\Packet;
use App\Models\PacketOption;
use Illuminate\Support\Str;
use Illuminate\View\Component;

class Invest extends Component
{
    public PacketOption $packetOption;

    public bool $isReinvesting;

    public ?Packet $packet;

    public string $formId;

    public function __construct(PacketOption $packetOption, bool $isReinvesting, ?Packet $packet)
    {
        $this->packetOption = $packetOption;
        $this->isReinvesting = $isReinvesting;
        $this->packet = $packet;
        $this->formId = Str::random();
    }

    public function render()
    {
        return view('components.modals.invest');
    }
}
