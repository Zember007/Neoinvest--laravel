<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        $user = User::create([
            'first_name' => 'User',
            'last_name' => 'User',
            'country' => 'ru',
            'email' => 'user@neo-invest.club',
            'password' => Hash::make('W8JD6mT4yT6P9GfT'),
            'email_verified_at' => now(),
            'locale' => 'ru',
            'register_ip_address' => '127.0.0.1',
        ]);
        event(new Registered($user));

//        $user->transactions()->create([
//            'type' => Transaction::TYPE_REPLENISH,
//            'amount' => 5_000,
//            'status' => 'success',
//        ]);

//        $user2 = User::create([
//            'first_name' => 'User2',
//            'last_name' => 'User2',
//            'country' => 'ru',
//            'email' => 'user2@neo-invest.club',
//            'password' => Hash::make('W8JD6mT4yT6P9GfT'),
//            'email_verified_at' => now(),
//            'locale' => 'ru',
//            'register_ip_address' => '127.0.0.1',
//            'referrer_id' => $user->id,
//        ]);
//        event(new Registered($user2));
//
//        $user2->transactions()->create([
//            'type' => Transaction::TYPE_REPLENISH,
//            'amount' => 100_000,
//            'status' => 'success',
//        ]);

        $admin = User::create([
            'first_name' => 'Admin',
            'last_name' => 'Admin',
            'country' => 'ru',
            'email' => 'admin@neo-invest.club',
            'password' => Hash::make('3zbK7uYhRPGww8Cc'),
            'email_verified_at' => now(),
            'locale' => 'ru',
            'register_ip_address' => '127.0.0.1',
        ]);
        event(new Registered($admin));
        $admin->syncRoles(['admin']);
    }
}
