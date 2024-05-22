<?php

namespace App\Transformers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Resources\Json\JsonResource;

class PresenceCollection extends JsonResource
{
    public function toArray($request)
    {
        $data = $this->resource;

        $res = [
            'id' => $data->id,
            'week' => $data->week,
            'presence_date' => $data->presence_date,
        ];

        if (count($data->presenceAttendances) > 0) {
            $res['status'] = 1;
            $res['status_label'] = 'hadir';
        } else if (count($data->presenceAbsences) > 0) {
            $res['status'] = 2;
            $res['status_label'] = strtolower($data->presenceAbsences[0]->absence_type);
        } else if ($data->is_enabled && $data->qr_is_generated) {
            $res['status'] = 3;
            $res['status_label'] = 'tidak hadir';
        } else {
            $res['status'] = 4;
            $res['status_label'] = 'belum dimulai';
        }

        return $res;
    }
}
