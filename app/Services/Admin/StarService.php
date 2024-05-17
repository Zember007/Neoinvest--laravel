<?php

namespace App\Services\Admin;

use App\Models\Log;
use App\Models\Star;
use App\Services\LoggerService;
use Illuminate\Support\Arr;

class StarService
{
    private LoggerService $loggerService;

    public function __construct(LoggerService $loggerService)
    {
        $this->loggerService = $loggerService;
    }

    public function update(Star $star, array $data)
    {
        $before = $star->getAttributes();

        $star->update($data);

        $star->refresh();
        $after = $star->getAttributes();

        $changesBefore = Arr::except(array_diff_assoc($before, $after), ['updated_at', 'referral_bonus_percentage']);
        $changesAfter = Arr::except(array_diff_assoc($after, $before), ['updated_at', 'referral_bonus_percentage']);

        $bonusesBefore = array_diff_assoc(
            json_decode($before['referral_bonus_percentage'], true),
            json_decode($after['referral_bonus_percentage'], true)
        );
        $bonusesAfter = array_diff_assoc(
            json_decode($after['referral_bonus_percentage'], true),
            json_decode($before['referral_bonus_percentage'], true)
        );

        if (!empty($bonusesBefore)) {
            $changesBefore['referral_bonus_percentage'] = $bonusesBefore;
        }
        if (!empty($bonusesAfter)) {
            $changesAfter['referral_bonus_percentage'] = $bonusesAfter;
        }

        $payload = array_merge(
            ['star_before' => $changesBefore],
            ['star_after' => $changesAfter],
            [
                'is_update' => true,
                'star' => $star->level,
            ]);

        $this->loggerService->logAdmin(Log::ADMIN_UPDATE_STAR, $payload);
    }
}
