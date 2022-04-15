<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Log;
use Exception;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function doLogin(Request $request)
    {
        $validator = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ], [
            'required' => ':attribute est requis',
            'email' => ':attribute doit être une adresse email valide'
        ]);

        if (Auth::attempt($request->only(['email', 'password']))) {

            Log::create(array(
                'user_id' => Auth::user()->id,
                'item' => 'Utilisateurs',
                'action' => 'Connexion de l\'utilisateur ' . Auth::user()->name
            ));
            return \redirect()->route('dashboard');
        } else {
            return back()->withErrors(['message' => 'Vos identifiants sont invalides !']);
        }
    }

    public function profil()
    {
        $user = Auth::user();
        return view('users.profil', compact('user'));
    }

    public function change_password()
    {
        return view('users.password');
    }

    public function deconnexion()
    {
        Log::create(array(
            'user_id' => Auth::user()->id,
            'item' => 'Utilisateurs',
            'action' => 'Déconnexion de l\'utilisateur ' . Auth::user()->name
        ));
        Auth::logout();
        return redirect('/');
    }

    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('users.edit', compact('user'));
    }

    public function delete($id)
    {
        try {
            $user = User::find($id);
            if ($user) {
                $user->delete();

                Log::create(array(
                    'user_id' => Auth::user()->id,
                    'item' => 'Utilisateurs',
                    'action' => 'Suppression de l\'utilisateur ' . $user->name
                ));
                return redirect()->route('users')->withSuccess('Utilisateur supprimé avec succès !');
            } else {
                return back()->withErrors(['message' => 'Utilisateur introuvable !']);
            }
        } catch (Exception $e) {
            return back()->withErrors(['message' => $e->getMessage()]);
        }
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|same:cpassword',
        ], [
            'required' => ':attribute est requis',
        ]);

        $input = $request->all();
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . Str::random(2) . '.' . $extension;
            $file->move('images/', $filename);
            $input['avatar'] = url('/') . '/images/' . $filename;
        }

        $input['password'] = bcrypt($input['password']);

        try {
            User::create($input);

            Log::create(array(
                'user_id' => Auth::user()->id,
                'item' => 'Utilisateurs',
                'action' => 'Enregistrement de l\'utilisateur ' . $input['name']
            ));
            return redirect('users')->withSuccess('Utilisateur enregistré avec succès !');
        } catch (Exception $e) {
            return back()->withErrors(['message' => $e->getMessage()]);
        }
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
        ], [
            'required' => ':attribute est requis',
        ]);

        $input = $request->all();

        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . Str::random(2) . '.' . $extension;
            $file->move('images/', $filename);
            $input['avatar'] = url('/') . '/images/' . $filename;
        }

        try {
            $users = User::find($id);
            if ($users) {
                $users->update($input);
                Log::create(array(
                    'user_id' => Auth::user()->id,
                    'item' => 'Utilisateurs',
                    'action' => 'Mise à jour des informations de l\'utilisateur ' . $input['name']
                ));
                return back()->withSuccess('Informations de l\'utilisateur modifiées avec succès !');
            } else {
                return back()->withErrors(['message' => 'Utilisateur introuvable !']);
            }
        } catch (Exception $e) {
            return back()->withErrors(['message' => $e->getMessage()]);
        }
    }

    public function update_password(Request $request)
    {
        $this->validate($request, [
            'password' => 'required',
            'npassword' => 'required|same:cpassword',
        ], [
            'required' => ':attribute est requis',
            'same' => 'Vos mots de passe ne correspondent pas !'
        ]);

        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->password, $hashedPassword)) {
            $user = User::find(Auth::user()->id);
            $user->password = bcrypt($request->npassword);
            $user->save();

            Log::create(array(
                'user_id' => Auth::user()->id,
                'item' => 'Utilisateurs',
                'action' => 'Mise à jour de son mot de passe'
            ));
            return back()->withSuccess('Mot de passe mis à jour avec succès !');
        } else {
            return back()->withErrors(['message' => "Le mot de passe n'est pas correct !"]);
        }
    }
}
