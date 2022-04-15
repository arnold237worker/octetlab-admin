<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategorieService;
use Exception;
use Illuminate\Support\Str;
use App\Models\Log;
use Illuminate\Support\Facades\Auth;

class CategorieServiceController extends Controller
{
    public function index()
    {
        $categorieservices = CategorieService::all();
        return view('categorieservices.index', compact('categorieservices'));
    }

    public function create()
    {
        return view('categorieservices.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nom_fr' => 'required',
            'nom_en' => 'required',
            'nom_de' => 'required',
            'contenu_fr' => 'required',
            'contenu_de' => 'required',
            'contenu_en' => 'required',
        ], [
            'required' => ':attribute est requis',
        ]);

        $input = $request->all();
        if($request->hasfile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename =time().Str::random(2).'.'.$extension;
            $file->move('images/', $filename);
            $input['image'] = url('/').'/images/'. $filename;
        }

        $input['slug'] = Str::slug($input['nom_fr'], '-');
        
        try{
            CategorieService::create($input);
            Log::create(array(
                'user_id' => Auth::user()->id,
                'item' => 'Catégorie de service',
                'action' => 'Enregistrement de la catégorie de service '.$input['nom_fr']
            ));
            return redirect('categorieservices')->withSuccess('Catégorie enregistrée avec succès !');
        }catch(Exception $e){
            return back()->withErrors(['message' => $e->getMessage()]);
        }
    }

    public function edit($slug)
    {
        $categorieservice = CategorieService::where('slug', $slug)->first();
        return view('categorieservices.show', compact('categorieservice'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nom_fr' => 'required',
            'nom_en' => 'required',
            'nom_de' => 'required',
            'contenu_fr' => 'required',
            'contenu_de' => 'required',
            'contenu_en' => 'required',
        ], [
            'required' => ':attribute est requis',
        ]);

        $input = $request->all();
        if($request->hasfile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename =time().Str::random(2).'.'.$extension;
            $file->move('images/', $filename);
            $input['image'] = url('/').'/images/'. $filename;
        }

        $input['slug'] = Str::slug($input['nom_fr'], '-');
        
        try{
            $categorieservice = CategorieService::find($id);
            if($categorieservice){
                $categorieservice->update($input);
                Log::create(array(
                    'user_id' => Auth::user()->id,
                    'item' => 'Catégorie de service',
                    'action' => 'Mise à jour de la catégorie de service '.$input['nom_fr']
                ));
                return redirect('categorieservices')->withSuccess('Catégorie modifiée avec succès !');
            }else{
                return back()->withErrors(['message' => 'Catégorie introuvable !']);
            }
        }catch(Exception $e){
            return back()->withErrors(['message' => $e->getMessage()]);
        }
    }

    public function delete($id)
    {
        try{
            $categorie = CategorieService::find($id);
            if($categorie){
                $categorie->delete();
                Log::create(array(
                    'user_id' => Auth::user()->id,
                    'item' => 'Catégorie de service',
                    'action' => 'Suppression catégorie de service '.$categorie->nom_fr
                ));
                return redirect()->route('categorieservices')->withSuccess('Catégorie supprimée avec succès !');
            }else{
                return back()->withErrors(['message' => 'Catégorie introuvable !']);
            }
        }catch(Exception $e){
            return back()->withErrors(['message' => $e->getMessage()]);
        }
    }
}
