<?php

namespace App\Transformers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Resources\Json\JsonResource;

class ScheduleSessionCollection extends JsonResource
{
    public function toArray($request)
    {
        $data = $this->resource;

        return [
            'id' => $data->id,
            'kode_matkul' => $data->schedule->kode_matkul,
            'nama_matkul' => $data->schedule->nama_matkul,
            'kode_kelompok' => $data->schedule->kode_kelompok,
            'sks' => $data->schedule->sks,
            'day' => $data->day,
            'time_start' => (! empty($data->time_start)) ? substr($data->time_start, 0, 5) : '',
            'time_end' => (! empty($data->time_end)) ? substr($data->time_end, 0, 5) : '',
            'classroom' => $data->classroom?->name,
            'dosen' => [
                'fullname' => trim($data->schedule->dosen?->user?->fullname),
                'nip' => $data->schedule->dosen?->nip,
            ]
        ];
    }
}
