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

        $jadwals = [];
        for ($i = 1; $i <= 3; $i++) {
            $jadwals[] = [
                'day' => $request->{"day$i"},
                'name' => $request->{"name$i"},
                'time_start' => $request->{"time_start$i"},
                'time_end' => $request->{"time_end$i"},
            ];
        }

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
        $scheduleData = $request->only(['nama_matkul', 'kode_kelompok', 'kuota', 'jumlah_mahasiswa']);
        $schedule = Schedule::find($id);
        // Update 'kode_matkul', and 'sks' berdasarkan matkul yanga da ditabel schedule sendiri
        $kode_matkul = Schedule::where('nama_matkul', $request->nama_matkul)->value('kode_matkul');
        $sks = Schedule::where('nama_matkul', $request->nama_matkul)->value('sks');
        $scheduleData['kode_matkul'] = $kode_matkul;
        $scheduleData['sks'] = $sks;
        // Update Schedule
        $schedule->update($scheduleData);

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

        // Update Schedule Sessions
        $jadwals = [];
        for ($i = 1; $i <= 3; $i++) {
            $jadwals[] = [
                'day' => $request->{"day$i" ?? ""},
                'name' => $request->{"name$i" ?? ""},
                'time_start' => $request->{"time_start$i" ?? ""},
                'time_end' => $request->{"time_end$i" ?? ""},
                'id_session' => $request->{"session_id$i"}
            ];
        }

        foreach ($jadwals as $jadwal) {
            // Dapatkan ID kelas sesuai dengan nama ruang
            $classroom_id = Classroom::where('name', $jadwal['name'])->value('id');

            // Memastikan jadwal sesi yang ingin diperbarui ada
            if ($scheduleSessions = ScheduleSession::find($jadwal['id_session'])) {
                $scheduleSessionsData = [
                    'day' => $jadwal['day'],
                    'time_start' => $jadwal['time_start'],
                    'time_end' => $jadwal['time_end'],
                    'schedule_id' => $id,
                    'classroom_id' => $classroom_id,
                ];

                // Perbarui jadwal sesi
                $scheduleSessions->update($scheduleSessionsData);
            }
        }


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
