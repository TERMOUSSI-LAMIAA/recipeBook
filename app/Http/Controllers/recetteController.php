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
    public function updtForm($idr)
    {
        $recette = Recette::find($idr);
        return view('updtRecipe', ['recette' => $recette]);
    }
    public function updtRecipeAction(Request $request, $id)
    {
        $validated = $request->validate([
            'titre' => 'required|string|max:100',
            'description' => 'string',
            'ingredients' => 'required|string',
            'instructions' => 'string',
            'img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $recette = Recette::find($id);
        $recette->titre = $validated['titre'];
        $recette->description = $validated['description'];
        $recette->ingredients = $validated['ingredients'];
        $recette->instructions = $validated['instructions'];
        if ($request->hasFile('img')) {
            $validated['img'] = $request->file('img')->store('imgs', 'public');
            $recette->img = $validated['img'];
        }
        $recette->save();
        return redirect(route('home'))->with('success', 'Recette modifiée avec succés');
    }
    public function deleteRecipe($id){
        $recette = Recette::find($id);
        $recette->delete();
        return redirect(route('home'))->with('success', 'Recette supprimée avec succés');
    }
}
