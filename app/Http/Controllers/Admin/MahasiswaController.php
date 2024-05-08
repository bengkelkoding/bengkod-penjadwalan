<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Hash;
use App\Imports\MahasiswaImport;
use Illuminate\Http\Request;
use App\Constants\UserType;
use App\Models\Mahasiswa;
use App\Models\User;

class MahasiswaController extends Controller
{
    public function index() {
        $students = Mahasiswa::withCount('schedules')->paginate(10);

        return view('mahasiswa.index', compact('students'));
    }

    public function import(Request $request) {
        $request->validate([
            'mahasiswa_file' => 'required|max:50000|mimes:xlsx,xls'
        ]);

        $mhsImport = new MahasiswaImport;
        Excel::import($mhsImport, $request->mahasiswa_file);
        
        if (! $mhsImport::$isSuccess) {
            return redirect()->back()->withErrors(['mahasiswa_file' => $mhsImport::$message]);
        }

        return redirect()->back()->with('success', 'Berhasil import data');
    }

    public function store(Request $request) {
        $request->validate([
            'nim' => 'required|unique:mahasiswa|unique:users,code',
            'name' => 'required'
        ]);

        $user = User::create([
            'code' => $request->nim,
            'fullname' => $request->name,
            'type' => UserType::MAHASISWA,
            'password' => Hash::make('12345678'),
        ]);

        $user->mahasiswa()->create([
            'nim' => $request->nim,
        ]);

        return redirect()->back()->with('success', 'Berhasil menambah mahasiswa'); 
    }

    public function update($id, Request $request) {
        $mahasiswa = Mahasiswa::findOrFail($id);

        $request->validate([
            'nim' => 'required|unique:mahasiswa,nim,'.$id.'|unique:users,code,'.$mahasiswa->user->id,
            'name' => 'required'
        ]);
        
        $mahasiswa->user()->update([ 
            'code' => $request->nim,
            'fullname' => $request->name
        ]);

        return redirect()->back()->with('success', 'Berhasil mengubah mahasiswa'); 
    }

    public function destroy($id) {
        $mahasiswa = Mahasiswa::findOrFail($id);

        $mahasiswa->user()->delete();

        return redirect()->back()->with('success', 'Berhasil menghapus mahasiswa'); 
    }
}
