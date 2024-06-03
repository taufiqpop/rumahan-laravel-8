<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // return [config('app.theme'), env('THEME_URL')];
        return view('contents.dashboard.home', [
            'title' => 'Beranda'
        ]);
    }
}
