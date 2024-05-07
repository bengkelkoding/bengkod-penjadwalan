<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AbsentController extends Controller
{
    public function index() {
        return view('absent.index');
    }

    public function import(Request $request) {

        return redirect()->back();
    }
}
