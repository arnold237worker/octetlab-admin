<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Temoignage;
use Illuminate\Support\Str;
use Exception;

class TestimonialController extends Controller
{
    public function index()
    {
        $temoignages = Temoignage::get();
        return view('temoignages.index', compact('temoignages'));
    }

    public function create()
    {
        return view('temoignages.create');
    }

    public function edit($id)
    {
        $temoignage = Temoignage::find($id);
        return view('temoignages.edit', compact('temoignage'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nom' => 'required',
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
        
        try{
            Temoignage::create($input);
            return redirect('temoignages')->withSuccess('Témoignage enregistré avec succès !');
        }catch(Exception $e){
            return back()->withErrors(['message' => $e->getMessage()]);
        }
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nom' => 'required',
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
        
        try{
            $temoignage = Temoignage::find($id);
            if($temoignage){
                $temoignage->update($input);
                return redirect()->route('testimonial')->withSuccess('Témoignage modifié avec succès !');
            }else{
                return back()->withErrors(['message' => 'Témoignage introuvable !']);
            }
        }catch(Exception $e){
            return back()->withErrors(['message' => $e->getMessage()]);
        }
    }

    public function delete($id)
    {
        try{
            $temoignage = Temoignage::find($id);
            if($temoignage){
                $temoignage->delete();
                return redirect()->route('testimonial')->withSuccess('Témoignage supprimé avec succès !');
            }else{
                return back()->withErrors(['message' => 'Témoignage introuvable !']);
            }
        }catch(Exception $e){
            return back()->withErrors(['message' => $e->getMessage()]);
        }
    }
}
