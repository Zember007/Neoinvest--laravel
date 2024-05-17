<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Registered;

class AssignDefaultRole
{
    public function handle(Registered $event)
    {
        $event->user->assignRole('user');
    }
}
