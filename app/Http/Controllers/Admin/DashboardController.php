<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard'); // aggiungiamo admin. perchè il dashboard.blade che abbiamo nella view lo mettiamo in un cartella admin
    }
}
