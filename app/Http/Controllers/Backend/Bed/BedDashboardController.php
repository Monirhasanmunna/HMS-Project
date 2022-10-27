<?php

namespace App\Http\Controllers\Backend\Bed;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BedDashboardController extends Controller
{
    public function index()
    {
        return view('backend.beddashboard.index');
    }
}
