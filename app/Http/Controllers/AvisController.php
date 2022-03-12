<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Avis;

class AvisController extends Controller
{
    public function index()
    {
        $avis = Avis::all();
        return view('avis.index', compact('avis'));
    }

    public function show($id)
    {
        $avis = Avis::find($id);
        return view('avis.show', compact('avis'));
    }
}
