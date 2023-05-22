<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index() {
        $namaDepan = "Hafiz";

        // cara 1
        // return view('pertama', ["nama_depan" => $namaDepan]);

        // cara 2
        return view('pertama', compact("namaDepan"));
    }
}
