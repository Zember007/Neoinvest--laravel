<?php

use App\Http\Controllers\Admin\ClosingPacketsController;
use App\Http\Controllers\Admin\DebugController;
use App\Http\Controllers\Admin\LogsController;
use App\Http\Controllers\Admin\MetricController;
use App\Http\Controllers\Admin\PacketController;
use App\Http\Controllers\Admin\RedirectToAvailable;
use App\Http\Controllers\Admin\ReplenishmentController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\StarController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\WithdrawalController;

Route::get('/', RedirectToAvailable::class)->name('index');

Route::resource('metrics', MetricController::class)->only(['index']);

Route::resource('packets', PacketController::class)->only(['index', 'edit', 'update']);

Route::resource('stars', StarController::class)->only(['index', 'edit', 'update']);

Route::post('users/{user}/ban', [UserController::class, 'ban'])->name('users.ban');
Route::post('users/{user}/unban', [UserController::class, 'unban'])->name('users.unban');
Route::post('users/{user}/disguise', [UserController::class, 'disguise'])->name('users.disguise');
Route::post('users/search', [UserController::class, 'search'])->name('users.search');
Route::resource('users', UserController::class)->except(['create', 'store', 'destroy']);

Route::post('replenishments/search', [ReplenishmentController::class, 'search'])->name('replenishments.search');
Route::resource('replenishments', ReplenishmentController::class)->only(['index']);

Route::post('withdrawals/{transaction}/allow', [WithdrawalController::class, 'allow'])->name('withdrawals.allow');
Route::post('withdrawals/{transaction}/deny', [WithdrawalController::class, 'deny'])->name('withdrawals.deny');
Route::post('withdrawals/search', [WithdrawalController::class, 'search'])->name('withdrawals.search');
Route::resource('withdrawals', WithdrawalController::class)->only(['index']);

// Route::resource('promos', PromoController::class);

Route::resource('roles', RoleController::class);

Route::resource('closing-packets', ClosingPacketsController::class)->only(['index']);

Route::post('logs/search', [LogsController::class, 'search'])->name('logs.search');
Route::resource('logs', LogsController::class)->only(['index']);

Route::resource('debugs', DebugController::class);
