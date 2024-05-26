<?php

namespace App\Transformers;

use Carbon\Carbon;
use App\Constants\UserType;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Resources\Json\JsonResource;

class PresenceCollection extends JsonResource
{
    private static $userType;

    public static function customCollection($resource, $userType): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        self::$userType = $userType;
        return parent::collection($resource);
    }

    public function toArray($request)
    {
        $data = $this->resource;

        $res = [
            'id' => $data->id,
            'week' => $data->week,
            'presence_date' => $data->presence_date,
        ];

        $presenceDate = Carbon::parse($data->presence_date);
        $todayDate = Carbon::today();

        if (self::$userType == UserType::DOSEN) {
            if ($presenceDate->greaterThan($todayDate)) {
                $res['status'] = 1;
                $res['status_label'] = 'belum dimulai';
            } elseif ($presenceDate->equalTo($todayDate)) {
                $res['status'] = 2;
                $res['status_label'] = 'hari ini';
            } elseif ($data->is_enabled && $data->qr_is_generated) {
                $res['status'] = 3;
                $res['status_label'] = 'selesai';
            } else {
                $res['status'] = 4;
                $res['status_label'] = 'tidak ada kelas';
            }
        } elseif (self::$userType == UserType::MAHASISWA) {
            if ($presenceDate->greaterThan($todayDate)) {
                $res['status'] = 4;
                $res['status_label'] = 'belum dimulai';
            } elseif ($presenceDate->equalTo($todayDate)) {
                $res['status'] = 5;
                $res['status_label'] = 'hari ini';
            } else {
                if (count($data->presenceAttendances) > 0) {
                    $res['status'] = 1;
                    $res['status_label'] = 'hadir';
                } elseif (count($data->presenceAbsences) > 0) {
                    $res['status'] = 2;
                    $res['status_label'] = strtolower($data->presenceAbsences[0]->absence_type);
                } elseif ($data->is_enabled && $data->qr_is_generated) {
                    $res['status'] = 3;
                    $res['status_label'] = 'tidak hadir';
                } else {
                    $res['status'] = 6;
                    $res['status_label'] = 'tidak ada kelas';
                }
            }
        }

        return $res;
    }
}
