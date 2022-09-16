<?php

namespace App\Http\Controllers;

use App\Models\Perjanjian;

class PerjanjianController extends Controller
{
    public function index() {
        return view('dashboard', [
            "perjanjians" => Perjanjian::latest()->get()
        ]);
    }
}
