<?php

namespace App\Http\Controllers\Admin;

use App\Constants\UserType;
use App\Http\Controllers\Controller;
use App\Models\Dosen;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DosenController extends Controller
{
    public function index()
    {
        $lectures = Dosen::paginate(10);

        return view('lecture.index', compact('lectures'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nip' => 'required|unique:dosen|unique:users,code',
            'name' => 'required'
        ]);

        $user = User::create([
            'code' => $request->nip,
            'fullname' => $request->name,
            'type' => UserType::DOSEN,
            'password' => Hash::make('12345678'),
        ]);

        $user->dosen()->create([
            'nip' => $request->nip,
        ]);

        return redirect()->back()->with('success', 'Berhasil menambah dosen');
    }

    public function update($id, Request $request)
    {
        $dosen = Dosen::findOrFail($id);

        $request->validate([
            'nip' => 'required|unique:dosen,nip,' . $id . '|unique:users,code,' . $dosen->user->id,
            'name' => 'required'
        ]);

        $dosen->user()->update([
            'code' => $request->nip,
            'fullname' => $request->name
        ]);

        return redirect()->back()->with('success', 'Berhasil mengubah dosen');
    }

    public function destroy($id)
    {
        $dosen = Dosen::findOrFail($id);

        $dosen->user()->delete();

        return redirect()->back()->with('success', 'Berhasil menghapus dosen');
    }
}
