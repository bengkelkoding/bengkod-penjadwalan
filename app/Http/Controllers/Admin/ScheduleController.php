<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Imports\ScheduleImport;
use App\Models\Classroom;
use App\Models\Dosen;
use App\Models\Schedule;
use App\Models\ScheduleSession;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedules = Schedule::paginate(5);
        $ruang = Classroom::distinct()->pluck('name');
        $scheduleMatkul = Schedule::distinct()->pluck('nama_matkul');
        return view('schedules.index', compact(
            'schedules',
            'scheduleMatkul',
            'ruang'
        ));
    }

    public function import(Request $request)
    {
        Excel::import(new ScheduleImport, $request->schedule);

        return redirect()->back();
    }

    function insertSchedule(Request $request)
    {
        $nip = $request->nip;

        $dosen_id = Dosen::where('nip', $nip)->value('id');
        $kode_matkul = Schedule::where('nama_matkul', $request->nama_matkul)->value('kode_matkul');
        $sks = Schedule::where('nama_matkul', $request->nama_matkul)->value('sks');

        $schedule = Schedule::create([
            'nama_matkul' => $request->nama_matkul,
            'kode_matkul' => $kode_matkul,
            'kode_kelompok' => $request->kode_kelompok,
            'sks' => $sks,
            'kuota' => $request->kuota,
            'jumlah_mahasiswa' => $request->jumlah_mahasiswa,
            'dosen_id' => $dosen_id,
        ]);

        $jadwals = [
            [
                'day' => $request->day,
                'name' => $request->name,
                'time_start' => $request->time_start,
                'time_end' => $request->time_end,
            ],
            [
                'day' => $request->day2,
                'name' => $request->name2,
                'time_start' => $request->time_start2,
                'time_end' => $request->time_end2,
            ],
            [
                'day' => $request->day3,
                'name' => $request->name3,
                'time_start' => $request->time_start3,
                'time_end' => $request->time_end3,
            ],
        ];

        foreach ($jadwals as $jadwal) {
            // Periksa jika jadwal tidak kosong
            if (!empty($jadwal['day']) && !empty($jadwal['name']) && !empty($jadwal['time_start']) && !empty($jadwal['time_end'])) {
                // Dapatkan ID kelas sesuai dengan nama ruang
                $classroom_id = Classroom::where('name', $jadwal['name'])->value('id');

                // Buat sesi baru hanya jika jadwal tidak kosong
                $schedule_session = ScheduleSession::create([
                    'schedule_id' => $schedule->id,
                    'classroom_id' => $classroom_id,
                    'day' => $jadwal['day'],
                    'time_start' => $jadwal['time_start'],
                    'time_end' => $jadwal['time_end'],
                ]);
            }
        }
        return redirect()->route('schedule.index')->with('success', 'Schedule Berhasil Ditambahkan');
    }

    public function updateSchedule(Request $request, $id)
    {
        // Update 'nip' to 'dosen_id'
        if ($request->has('nip')) {
            $dosen = Dosen::where('nip', $request->nip)->first();
            if ($dosen) {
                $scheduleData['dosen_id'] = $dosen->id;
            } else {
                // Jika dosen tidak ditemukan, set 'dosen_id' menjadi null
                $scheduleData['dosen_id'] = null;
            }
        }

        $scheduleData = $request->only(['nama_matkul', 'kode_kelompok', 'kuota', 'jumlah_mahasiswa']);
        $schedule = Schedule::find($id);
        // Update 'kode_matkul', and 'sks' berdasarkan matkul yanga da ditabel schedule sendiri
        $kode_matkul = Schedule::where('nama_matkul', $request->nama_matkul)->value('kode_matkul');
        $sks = Schedule::where('nama_matkul', $request->nama_matkul)->value('sks');
        $scheduleData['kode_matkul'] = $kode_matkul;
        $scheduleData['sks'] = $sks;
        // Update Schedule
        $schedule->update($scheduleData);

        // Update Schedule Sessions  - MASIH PROBLEM UNTUK SCHEDULE SESSION bedain jadwal 1/2/3 dalam schedule id yang sama
        $scheduleSessionsData = $request->only(['day', 'time_start', 'time_end']);
        $scheduleSessions = ScheduleSession::find($id);
        $classroom_id = Classroom::where('name', $request->name)->value('id');
        $scheduleSessionsData['schedule_id'] = $id;
        $scheduleSessionsData['classroom_id'] = $classroom_id;
        // dd($scheduleSessionsData);
        // Update ScheduleSessions
        $scheduleSessions->update($scheduleSessionsData);

        return redirect()->route('schedule.index')->with('success', 'Schedule Berhasil Diupdate');
    }


    public function deleteSchedule($id)
    {
        $schedule = Schedule::findOrFail($id);
        $schedule->scheduleSessions()->delete();
        $schedule->delete();

        return redirect()->route('schedule.index')->with('success', 'Data Berhasil Terhapus');
    }
}
