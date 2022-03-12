<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Process;
use Exception;

class ProcessController extends Controller
{
    public function index()
    {
        $process = Process::all();
        return view('process.index', compact('process'));
    }

    public function create()
    {
        return view('process.create');
    }
    
    public function edit($id)
    {
        $process = Process::find($id);
        return view('process.edit', compact('process'));
    }

    public function delete($id)
    {
        try{
            $process = Process::find($id);
            if($process){
                $process->delete();
                return redirect()->route('process')->withSuccess('Etape supprimée avec succès !');
            }else{
                return back()->withErrors(['message' => 'Etape introuvable !']);
            }
        }catch(Exception $e){
            return back()->withErrors(['message' => $e->getMessage()]);
        }
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'titre_fr' => 'required',
            'titre_en' => 'required',
            'titre_de' => 'required',
            'contenu_fr' => 'required',
            'contenu_de' => 'required',
            'contenu_en' => 'required',
        ], [
            'required' => ':attribute est requis',
        ]);

        $input = $request->all();
        
        try{
            Process::create($input);
            return redirect('process')->withSuccess('Etape enregistrée avec succès !');
        }catch(Exception $e){
            return back()->withErrors(['message' => $e->getMessage()]);
        }
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'titre_fr' => 'required',
            'titre_en' => 'required',
            'titre_de' => 'required',
            'contenu_fr' => 'required',
            'contenu_de' => 'required',
            'contenu_en' => 'required',
        ], [
            'required' => ':attribute est requis',
        ]);

        $input = $request->all();
        
        try{
            $process = Process::find($id);
            if($process){
                $process->update($input);
                return redirect('process')->withSuccess('Etape modifiée avec succès !');
            }else{
                return back()->withErrors(['message' => 'Etape introuvable !']);
            }
        }catch(Exception $e){
            return back()->withErrors(['message' => $e->getMessage()]);
        }
    }
}
