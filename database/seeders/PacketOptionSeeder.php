<?php

namespace Database\Seeders;

use App\Models\PacketOption;
use Illuminate\Database\Seeder;

class PacketOptionSeeder extends Seeder
{
    public function run()
    {
        PacketOption::create([
            'name' => 'infinity',
            'percentage' => 1.1,
            'min_invest' => 100,
            'min_reinvest' => 100,
            'duration_days' => null,
            'is_refundable' => false,
        ]);

        PacketOption::create([
            'name' => 'back',
            'percentage' => 0.9,
            'min_invest' => 100,
            'min_reinvest' => 100,
            'duration_days' => null,
            'is_refundable' => true,
        ]);

        PacketOption::create([
            'name' => 'premium',
            'percentage' => 1.7,
            'min_invest' => 5000,
            'min_reinvest' => false,
            'duration_days' => 120,
            'is_refundable' => false,
        ]);
    }
}
