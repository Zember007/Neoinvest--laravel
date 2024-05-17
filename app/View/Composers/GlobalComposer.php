<?php

namespace App\View\Composers;

use Illuminate\View\View;

class GlobalComposer
{
    public function compose(View $view)
    {
        $view->with('userBalance', optional(auth()->user())->balance);
    }
}