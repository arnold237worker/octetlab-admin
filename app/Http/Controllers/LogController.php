<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Log;

class LogController extends Controller
{
    public function index()
    {
        $logs = Log::with('user')->orderby('created_at', 'desc')->take(500)->get();
        return view('logs', compact('logs'));
    }
}
