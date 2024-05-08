<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Classroom;

class ClassroomController extends Controller
{
    public function index() {
        $classrooms = Classroom::withCount('scheduleSessions')->paginate(10);

        return view('classrooms.index', compact('classrooms'));
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required'
        ]);

        $exists = Classroom::where('name', $request->name)->exists();
        if ($exists) {
            return redirect()->back()->withErrors(['name' => 'Nama ruang kelas sudah ada']);
        }

        Classroom::create([ 'name' => $request->name ]);

        return redirect()->back()->with('success', 'Berhasil menambah ruang kelas'); 
    }

    public function update($id, Request $request) {
        $request->validate([
            'name' => 'required'
        ]);

        $exists = Classroom::where('name', $request->name)->exists();
        if ($exists) {
            return redirect()->back()->withErrors(['name' => 'Nama ruang kelas sudah ada']);
        }

        Classroom::findOrFail($id)->update([ 'name' => $request->name ]);

        return redirect()->back()->with('success', 'Berhasil mengubah ruang kelas'); 
    }

    public function destroy($id) {
        $class = Classroom::findOrFail($id);
        if ($class->scheduleSessions()->count() > 0) {
            return redirect()->back()->withErrors(['name' => 'Ruang Kelas ini sudah digunakan oleh penjadwalan, silahkan hapus dulu data penjadwalan pada ruang ini']);
        }

        $class->delete();

        return redirect()->back()->with('success', 'Berhasil menghapus ruang kelas'); 
    }
}
