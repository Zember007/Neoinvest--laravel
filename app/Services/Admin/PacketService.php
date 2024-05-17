<?php

namespace App\Services\Admin;

use App\Models\Log;
use App\Models\PacketOption;
use App\Services\LoggerService;
use Illuminate\Support\Arr;

class PacketService
{
    private LoggerService $loggerService;

    public function __construct(LoggerService $loggerService)
    {
        $this->loggerService = $loggerService;
    }

    public function update(PacketOption $packetOption, array $data)
    {
        $before = $packetOption->getAttributes();

        $packetOption->update($data);

        $packetOption->refresh();
        $after = $packetOption->getAttributes();
        $changesBefore = Arr::except(array_diff_assoc($before, $after), ['updated_at']);
        $changesAfter = Arr::except(array_diff_assoc($after, $before), ['updated_at']);

        $payload = array_merge(
            ['packet_before' => $changesBefore],
            ['packet_after' => $changesAfter],
            [
                'is_update' => true,
                'packet_id' => $packetOption->id,
            ]);

        $this->loggerService->logAdmin(Log::ADMIN_UPDATE_PACKET, $payload);
    }
}
