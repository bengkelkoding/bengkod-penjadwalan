<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Classroom;

class ClassroomController extends Controller
{
    public function index() {
        $classrooms = Classroom::all();

        return view('classrooms.index', compact('classrooms'));
    }
}
