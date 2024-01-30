<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recette;
use Illuminate\Support\Facades\DB;

class recetteController extends Controller
{
    public function showRecette()
    {
        $recettes = DB::select("SELECT * FROM recette");
        return view('home', compact('recettes'));
    }
    public function AddFormController()
    {
        return view('addRecipe');
    }
    public function addRecipe(Request $request)
    {
       $validated = $request->validate([
            'titre' => 'required|string|max:100',
            'description' => 'string',
            'ingredients' => 'required|string',
            'instructions' => 'string',
            'img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($request->hasFile('img')) {
            $validated['img'] = $request->file('img')->store('imgs', 'public');
    
        }
        Recette::create($validated);
        return redirect(route('home'))->with('success', 'Recette ajoutée avec succés');
    }
    public function updtForm($idr){
        $recette=Recette::find($idr);
   
            return view('updtRecipe', ['recette' => $recette]);
     
     
        
    }
}
