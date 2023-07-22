<?php

namespace App\Http\Controllers;

use App\Models\JadwalMain;
use Illuminate\Http\Request;
use App\Http\Controllers\AdminDashboardController;


class AdminDashboardController extends Controller
{
    public function index()
    {
        $JadwalMain = JadwalMain::all();

        return view('admin.dashboard', compact('JadwalMain'));
    }

    

}
