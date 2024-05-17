<?php

use App\Http\Controllers\Auth\TwoFactorAuthenticationController;
use App\Http\Controllers\AutoProgramController;
use App\Http\Controllers\FinanceController;
use App\Http\Controllers\GenerateInstagramStory;
use App\Http\Controllers\HousingProgramController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\InvestmentController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReferralSystemController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\SwitchLanguage;
use App\Http\Controllers\Undisguise;
use App\Models\Transaction;
use App\Services\PayKassaService;
use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, 'index']);
Route::post('switch-language', SwitchLanguage::class)->name('switch-language');
Route::get('ref/{id}', function ($id) {
    return redirect()->route('register', ['ref' => $id]);
})->name('ref');

Route::middleware(['auth', 'verified'])->group(function () {
    // User
    Route::delete('/user/two-factor-authentication', [TwoFactorAuthenticationController::class, 'destroy']);

    // Profile
    Route::get('profile', [ProfileController::class, 'index'])->name('profile');
    Route::delete('profile-photo', [ProfileController::class, 'deletePhoto'])->name('profile.delete-photo');

    // Finances
    Route::get('finances', [FinanceController::class, 'index'])->name('finances');
    Route::post('finances', [FinanceController::class, 'store'])->name('finances.store');

    // Investments
    Route::get('investments', [InvestmentController::class, 'index'])->name('investments');
    Route::post('investments/invest', [InvestmentController::class, 'invest'])->name('investments.invest');
    Route::post('investments/reinvest', [InvestmentController::class, 'reinvest'])->name('investments.reinvest');
    Route::post('investments/close', [InvestmentController::class, 'close'])->name('investments.close');

    // Auto program
    Route::get('auto-program', [AutoProgramController::class, 'index'])->name('auto-program');

    // Housing program
    Route::get('housing-program', [HousingProgramController::class, 'index'])->name('housing-program');

    // Partners
    Route::get('partners', [PartnerController::class, 'index'])->name('partners');

    // Promos
    // Route::get('promos', [ProfileController::class, 'index'])->name('promos');

    // Referrals
    Route::get('referral-system', [ReferralSystemController::class, 'index'])->name('referral-system');

    // Settings
    Route::get('settings', [SettingsController::class, 'index'])->name('settings');
    Route::post('settings', [SettingsController::class, 'store'])->name('settings.store');

    // Instagram Story
    Route::get('instagram-story', GenerateInstagramStory::class)->name('ig-story');

    // Undisguise
    Route::get('undisguise', Undisguise::class)->name('undisguise');
});

Route::prefix('debug')->group(function () {
    Route::get('login/{id}', function ($id) {
        auth()->loginUsingId($id);

        session()->regenerate();

        return redirect()->route('profile');
    });

    Route::get('paykassa', function (PayKassaService $merchant) {
        return redirect()->away($merchant->createChargeUrl(Transaction::find(1), 'USDT'));
    });

    Route::get('ip', function () {
    	dd(request()->ip(), explode(', ', request()->header('X-Forwarded-For')));
    });
});
