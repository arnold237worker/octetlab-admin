<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Exception;
use App\Models\Service;
use Helper;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('services.index', compact('services'));
    }

    public function create()
    {
        return view('services.create');
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
            Service::create($input);
            return redirect('services')->withSuccess('Service enregistré avec succès !');
        }catch(Exception $e){
            return back()->withErrors(['message' => $e->getMessage()]);
        }
    }

    public function edit($slug)
    {
        $service = Service::where('slug', $slug)->first();
        return view('services.show', compact('service'));
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
            $service = Service::find($id);
            if($service){
                $service->update($input);
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
                return redirect()->route('services')->withSuccess('Service supprimé avec succès !');
            }else{
                return back()->withErrors(['message' => 'Service introuvable !']);
            }
        }catch(Exception $e){
            return back()->withErrors(['message' => $e->getMessage()]);
        }
    }
}
