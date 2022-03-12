<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use App\Models\Package;

class PackageController extends Controller
{
    public function index()
    {
        $packages = Package::all();
        return view('package.index', compact('packages'));
    }

    public function create()
    {
        return view('package.create');
    }
    
    public function edit($id)
    {
        $package = Package::find($id);
        return view('package.edit', compact('package'));
    }

    public function delete($id)
    {
        try{
            $package = Package::find($id);
            if($package){
                $package->delete();
                return redirect()->route('packages')->withSuccess('Pack supprimé avec succès !');
            }else{
                return back()->withErrors(['message' => 'Pack introuvable !']);
            }
        }catch(Exception $e){
            return back()->withErrors(['message' => $e->getMessage()]);
        }
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nom_fr' => 'required',
            'nom_en' => 'required',
            'nom_de' => 'required',
            'services_fr' => 'required',
            'services_de' => 'required',
            'services_en' => 'required'
        ], [
            'required' => ':attribute est requis',
        ]);

        $input = $request->all();
        
        try{
            Package::create($input);
            return redirect('packages')->withSuccess('Pack supprimé avec succès !');
        }catch(Exception $e){
            return back()->withErrors(['message' => $e->getMessage()]);
        }
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nom_fr' => 'required',
            'nom_en' => 'required',
            'nom_de' => 'required',
            'services_fr' => 'required',
            'services_de' => 'required',
            'services_en' => 'required'
        ], [
            'required' => ':attribute est requis',
        ]);

        $input = $request->all();
        
        try{
            $package = Package::find($id);
            if($package){
                $package->update($input);
                return redirect('packages')->withSuccess('Pack modifié avec succès !');
            }else{
                return back()->withErrors(['message' => 'Pack introuvable !']);
            }
        }catch(Exception $e){
            return back()->withErrors(['message' => $e->getMessage()]);
        }
    }
}
