<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Process;
use App\Models\Log;
use Illuminate\Support\Facades\Auth;
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
        try {
            $process = Process::find($id);
            if ($process) {
                $process->delete();

                Log::create(array(
                    'user_id' => Auth::user()->id,
                    'item' => 'Design process',
                    'action' => 'Suppression de l\'étape ' . $process->nom_fr
                ));
                return redirect()->route('process')->withSuccess('Etape supprimée avec succès !');
            } else {
                return back()->withErrors(['message' => 'Etape introuvable !']);
            }
        } catch (Exception $e) {
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

        try {
            Process::create($input);
            Log::create(array(
                'user_id' => Auth::user()->id,
                'item' => 'Design process',
                'action' => 'Enregistrement de la nouvelle étape ' . $input['nom_fr'] . 'dans le Web design process'
            ));
            return redirect('process')->withSuccess('Etape enregistrée avec succès !');
        } catch (Exception $e) {
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

        try {
            $process = Process::find($id);
            if ($process) {
                $process->update($input);Log::create(array(
                    'user_id' => Auth::user()->id,
                    'item' => 'Design process',
                    'action' => 'Mise à jour de l\'étape ' . $process->nom_fr
                ));
                return redirect('process')->withSuccess('Etape modifiée avec succès !');
            } else {
                return back()->withErrors(['message' => 'Etape introuvable !']);
            }
        } catch (Exception $e) {
            return back()->withErrors(['message' => $e->getMessage()]);
        }
    }
}
