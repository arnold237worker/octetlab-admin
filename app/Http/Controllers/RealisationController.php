<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Realisation;
use App\Models\RealisationImage;
use App\Models\Service;
use App\Models\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Exception;

class RealisationController extends Controller
{
    public function index()
    {
        $realisations = Realisation::with('service')->get();

        return view('realisations.index', compact('realisations'));
    }

    public function create()
    {
        $services = Service::all();
        return view('realisations.create', compact('services'));
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
            'images' => 'required',
            'service_id' => 'required'
        ], [
            'required' => ':attribute est requis',
        ]);

        $input = $request->all();
        $input['slug'] = Str::slug($input['nom_fr'], '-');

        try {
            $realisation = Realisation::create($input);
            if ($request->hasfile('images')) {
                foreach ($request->file('images') as $file) {
                    $realisationImage = new RealisationImage();
                    $realisationImage->realisation_id = $realisation->id;
                    $extension = $file->getClientOriginalExtension();
                    $filename = time() . Str::random(2) . '.' . $extension;
                    $file->move('images/', $filename);
                    $realisationImage->path = url('/') . '/images/' . $filename;
                    try {
                        $realisationImage->save();
                    } catch (Exception $e) {
                        return back()->withErrors(['message' => $e->getMessage()]);
                    }
                }
            }
            Log::create(array(
                'user_id' => Auth::user()->id,
                'item' => 'R??alisation',
                'action' => 'Enregistrement de la r??alisation ' . $input['nom_fr'] . 'dans le portfolio'
            ));
            return redirect('realisations')->withSuccess('R??alisation enregistr??e avec succ??s !');
        } catch (Exception $e) {
            return back()->withErrors(['message' => $e->getMessage()]);
        }
    }

    public function storeImage(Request $request)
    {
        $this->validate($request, [
            'images' => 'required',
            'realisation_id' => 'required'
        ], [
            'required' => ':attribute est requis',
        ]);


        try {
            if ($request->hasfile('images')) {
                $input = $request->all();
                foreach ($request->file('images') as $file) {
                    $extension = $file->getClientOriginalExtension();
                    $filename = time() . Str::random(2) . '.' . $extension;
                    $file->move('images/', $filename);
                    $input['path'] = url('/') . '/images/' . $filename;
                    try {
                        RealisationImage::create($input);
                    } catch (Exception $e) {
                        return back()->withErrors(['message' => $e->getMessage()]);
                    }
                }

                Log::create(array(
                    'user_id' => Auth::user()->id,
                    'item' => 'R??alisation',
                    'action' => 'Enregistrement des images pour une r??alisation'
                ));
                return back()->withSuccess('Image enregistr??e avec succ??s !');
            } else {

                return back()->withErrors(['message' => "Aucune image trouv??e !"]);
            }
        } catch (Exception $e) {
            return back()->withErrors(['message' => $e->getMessage()]);
        }
    }

    public function delete($id)
    {
        try {
            $realisation = Realisation::find($id);
            if ($realisation) {
                $realisation->delete();

                Log::create(array(
                    'user_id' => Auth::user()->id,
                    'item' => 'R??alisation',
                    'action' => 'Suppression de la r??alisation ' . $realisation->nom_fr
                ));
                return redirect()->route('realisations')->withSuccess('R??alisation supprim??e avec succ??s !');
            } else {
                return back()->withErrors(['message' => 'R??alisation introuvable !']);
            }
        } catch (Exception $e) {
            return back()->withErrors(['message' => $e->getMessage()]);
        }
    }
    public function deleteImage($id)
    {
        try {
            $image = RealisationImage::find($id);
            if ($image) {
                $image->delete();

                Log::create(array(
                    'user_id' => Auth::user()->id,
                    'item' => 'R??alisation',
                    'action' => 'Suppression de l\'image d\'une r??alisation'
                ));
                return back()->withSuccess('Image supprim??e avec succ??s !');
            } else {
                return back()->withErrors(['message' => 'Image introuvable !']);
            }
        } catch (Exception $e) {
            return back()->withErrors(['message' => $e->getMessage()]);
        }
    }

    public function edit($slug)
    {
        $realisation = Realisation::where('slug', $slug)->with('images')->first();
        $services = Service::all();
        return view('realisations.show', compact('realisation', 'services'));
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
        $input['slug'] = Str::slug($input['nom_fr'], '-');

        try {
            $realisation = Realisation::find($id);
            if ($realisation) {
                $realisation->update($input);
                Log::create(array(
                    'user_id' => Auth::user()->id,
                    'item' => 'R??alisation',
                    'action' => 'Mise ?? jour des informations de la r??alisation '.$input['nom_fr']. 'dans le portfolio'
                ));
                return redirect()->route('realisations.edit', $realisation->slug)->withSuccess('R??alisation modifi??e avec succ??s !');
            } else {
                return back()->withErrors(['message' => 'R??alisation introuvable !']);
            }
        } catch (Exception $e) {
            return back()->withErrors(['message' => $e->getMessage()]);
        }
    }
}
