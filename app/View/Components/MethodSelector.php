<?php

namespace App\View\Components;

use Illuminate\View\Component;

class MethodSelector extends Component
{
    public bool $isSingle;

    public string $preferredMode;

    public function __construct(bool $isSingle, string $preferredMode)
    {
        $this->isSingle = $isSingle;
        $this->preferredMode = $preferredMode;
    }

    public function render()
    {
        return view('components.method-selector');
    }
}
