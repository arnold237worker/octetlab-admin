<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Section;
use Exception;

class SectionController extends Controller
{
    public function index()
    {
        $sections = Section::all();
        return view('sections.index', compact('sections'));
    }

    public function create()
    {
        return view('sections.create');
    }

    public function show($id)
    {
        $section = Section::find($id);
        return view('sections.show', compact('section'));
    }

    public function delete($id)
    {
        try{
            $section = Section::find($id);
            if($section){
                $section->delete();
                return back()->withSuccess('Section supprimée avec succès !');
            }else{
                return back()->withErrors(['message' => 'Section introuvable !']);
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
            'sectionID' => 'required'
        ], [
            'required' => ':attribute est requis',
        ]);

        $input = $request->all();
        
        try{
            Section::create($input);
            return redirect('sections')->withSuccess('Section enregistrée avec succès !');
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
            'sectionID' => 'required'
        ], [
            'required' => ':attribute est requis',
        ]);

        $input = $request->all();
        
        try{
            $section = Section::find($id);
            if($section){
                $section->update($input);
                return redirect('sections')->withSuccess('Section modifiée avec succès !');
            }else{
                return back()->withErrors(['message' => 'Section introuvable !']);
            }
        }catch(Exception $e){
            return back()->withErrors(['message' => $e->getMessage()]);
        }
    }
}
