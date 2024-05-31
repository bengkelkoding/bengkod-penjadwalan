<?php

namespace App\Transformers;

use App\Constants\PresenceStatus;
use Carbon\Carbon;
use App\Constants\UserType;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Resources\Json\JsonResource;

class PresenceDosenCollection extends JsonResource
{
    public function toArray($request)
    {
        $data = $this->resource;

        $res = [
            'id' => $data->id,
            'week' => $data->week,
            'presence_date' => $data->presence_date
        ];

        $presenceDate = Carbon::parse($data->presence_date);
        $todayDate = Carbon::today();
        
        $status = '';
        $statusLabel = '';

        if ($presenceDate->greaterThan($todayDate)) {
            $status = PresenceStatus::SOON;
            $statusLabel = PresenceStatus::label(PresenceStatus::SOON);
        } elseif ($presenceDate->equalTo($todayDate)) {
            $status = PresenceStatus::TODAY;
            $statusLabel = PresenceStatus::label(PresenceStatus::TODAY);
        } elseif ($data->is_enabled && $data->qr_is_generated) {
            $status = PresenceStatus::DONE;
            $statusLabel = PresenceStatus::label(PresenceStatus::DONE);
        } else {
            $status = PresenceStatus::NO_CLASS;
            $statusLabel = PresenceStatus::label(PresenceStatus::NO_CLASS);
        }

        $res['status'] = $status;
        $res['status_label'] = $statusLabel;

        return $res;
    }
}
