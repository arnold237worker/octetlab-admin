<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Exception;
use App\Models\Service;
use App\Models\CategorieService;
use App\Models\Log;
use Illuminate\Support\Facades\Auth;
use Helper;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::with('categorie')->get();
        return view('services.index', compact('services'));
    }

    public function create()
    {
        $categories = CategorieService::all();
        return view('services.create', compact('categories'));
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
            'categorie_service_id' => 'required'
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
            Service::create($input);
            
            Log::create(array(
                'user_id' => Auth::user()->id,
                'item' => 'Service',
                'action' => 'Enregistrement du service '.$input['nom_fr']
            ));
            return redirect('services')->withSuccess('Service enregistré avec succès !');
        }catch(Exception $e){
            return back()->withErrors(['message' => $e->getMessage()]);
        }
    }

    public function edit($slug)
    {
        
        $categories = CategorieService::all();
        $service = Service::where('slug', $slug)->first();
        return view('services.show', compact('service', 'categories'));
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
            'categorie_service_id' => 'required'
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
            $service = Service::find($id);
            if($service){
                $service->update($input);
                Log::create(array(
                    'user_id' => Auth::user()->id,
                    'item' => 'Service',
                    'action' => 'Mise à jour des informations du service '.$input['nom_fr']
                ));
                return redirect('services')->withSuccess('Service modifié avec succès !');
            }else{
                return back()->withErrors(['message' => 'Service introuvable !']);
            }
        }catch(Exception $e){
            return back()->withErrors(['message' => $e->getMessage()]);
        }
    }

    public function delete($id)
    {
        try{
            $service = Service::find($id);
            if($service){
                $service->delete();
                Log::create(array(
                    'user_id' => Auth::user()->id,
                    'item' => 'Service',
                    'action' => 'Suppression du service '.$service->nom_fr
                ));
                return redirect()->route('services')->withSuccess('Service supprimé avec succès !');
            }else{
                return back()->withErrors(['message' => 'Service introuvable !']);
            }
        }catch(Exception $e){
            return back()->withErrors(['message' => $e->getMessage()]);
        }
    }
}
