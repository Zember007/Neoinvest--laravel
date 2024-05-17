<?php

namespace Database\Seeders;

use App\Models\Star;
use Illuminate\Database\Seeder;

class StarSeeder extends Seeder
{
    public function run()
    {
        Star::create([
            'level' => 0,
            'min_turnover' => 0,
            'min_turnover_fl' => 0,
            'bonus' => 0,
            'referral_bonus_percentage' => [1 => 4, 2 => 1, 3 => 0.5, 4 => 0.5],
        ]);

        Star::create([
            'level' => 1,
            'min_turnover' => 20000,
            'min_turnover_fl' => 0,
            'bonus' => 400,
            'referral_bonus_percentage' => [1 => 5, 2 => 1, 3 => 0.5, 4 => 0.5],
        ]);

        Star::create([
            'level' => 2,
            'min_turnover' => 50000,
            'min_turnover_fl' => 10000,
            'bonus' => 800,
            'referral_bonus_percentage' => [1 => 6, 2 => 1, 3 => 0.5, 4 => 0.5],
        ]);

        Star::create([
            'level' => 3,
            'min_turnover' => 200000,
            'min_turnover_fl' => 15000,
            'bonus' => 2000,
            'referral_bonus_percentage' => [1 => 7, 2 => 1, 3 => 0.5, 4 => 0.5, 5 => 0.5],
        ]);

        Star::create([
            'level' => 4,
            'min_turnover' => 500000,
            'min_turnover_fl' => 20000,
            'bonus' => 2500,
            'referral_bonus_percentage' => [1 => 8, 2 => 1, 3 => 0.5, 4 => 0.5, 5 => 0.5, 6 => 0.5],
        ]);

        Star::create([
            'level' => 5,
            'min_turnover' => 1000000,
            'min_turnover_fl' => 30000,
            'bonus' => 4000,
            'referral_bonus_percentage' => [1 => 9, 2 => 1, 3 => 0.5, 4 => 0.5, 5 => 0.5, 6 => 0.5, 7 => 0.25],
        ]);

        Star::create([
            'level' => 6,
            'min_turnover' => 2500000,
            'min_turnover_fl' => 40000,
            'bonus' => 5000,
            'referral_bonus_percentage' => [
                1 => 10, 2 => 1, 3 => 0.5, 4 => 0.5, 5 => 0.5, 6 => 0.5, 7 => 0.25, 8 => 0.25
            ],
        ]);

        Star::create([
            'level' => 7,
            'min_turnover' => 5000000,
            'min_turnover_fl' => 50000,
            'bonus' => 10000,
            'referral_bonus_percentage' => [
                1 => 11, 2 => 2, 3 => 1, 4 => 0.5, 5 => 0.5, 6 => 0.5, 7 => 0.5, 8 => 0.5
            ],
        ]);

        Star::create([
            'level' => 8,
            'min_turnover' => 10000000,
            'min_turnover_fl' => 70000,
            'bonus' => 20000,
            'referral_bonus_percentage' => [
                1 => 12, 2 => 3, 3 => 1, 4 => 1, 5 => 0.5, 6 => 0.5, 7 => 0.5, 8 => 0.5, 9 => 0.5
            ],
        ]);

        Star::create([
            'level' => 9,
            'min_turnover' => 20000000,
            'min_turnover_fl' => 90000,
            'bonus' => 30000,
            'monthly_turnover_bonus_percentage' => 0.5,
            'referral_bonus_percentage' => [
                1 => 13, 2 => 4, 3 => 1, 4 => 1, 5 => 1, 6 => 0.5, 7 => 0.5, 8 => 0.5, 9 => 0.5
            ],
        ]);
    }
}
