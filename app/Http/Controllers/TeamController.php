<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipe;
use Illuminate\Support\Str;
use Exception;

class TeamController extends Controller
{
    public function index()
    {
        $equipe = Equipe::all();
        return view('equipe.index', compact('equipe'));
    }

    public function create()
    {
        return view('equipe.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'poste_fr' => 'required',
            'poste_en' => 'required',
            'poste_de' => 'required',
            'email' => 'required|email',
            'nom' => 'required',
        ], [
            'required' => ':attribute est requis',
            'email' => ':attribute doit être une adresse email valide'
        ]);

        $input = $request->all();
        if($request->hasfile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename =time().Str::random(2).'.'.$extension;
            $file->move('images/', $filename);
            $input['image'] = url('/').'/images/'. $filename;
        }

        
        try{
            Equipe::create($input);
            return redirect()->route('teams')->withSuccess('Membre enregistré avec succès !');
        }catch(Exception $e){
            return back()->withErrors(['message' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $equipe = Equipe::find($id);
        return view('equipe.edit', compact('equipe'));
    }

    public function delete($id)
    {
        try{
            $equipe = Equipe::find($id);
            if($equipe){
                $equipe->delete();
                return redirect()->route('teams')->withSuccess('Membre supprimé avec succès !');
            }else{
                return back()->withErrors(['message' => 'Membre introuvable !']);
            }
        }catch(Exception $e){
            return back()->withErrors(['message' => $e->getMessage()]);
        }
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'poste_fr' => 'required',
            'poste_en' => 'required',
            'poste_de' => 'required',
            'email' => 'required|email',
            'nom' => 'required',
        ], [
            'required' => ':attribute est requis',
            'email' => ':attribute doit être une adresse email valide'
        ]);

        $input = $request->all();
        if($request->hasfile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename =time().Str::random(2).'.'.$extension;
            $file->move('images/', $filename);
            $input['image'] = url('/').'/images/'. $filename;
        }

        
        try{
            $equipe = Equipe::find($id);
            if($equipe){
                $equipe->update($input);
                return redirect()->route('teams')->withSuccess('Informations du membre modifiées avec succès !');
            }else{
                return back()->withErrors(['message' => 'Membre introuvable']);
            }
        }catch(Exception $e){
            return back()->withErrors(['message' => $e->getMessage()]);
        }
    }
}
