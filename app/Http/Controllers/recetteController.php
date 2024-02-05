<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddRecipeRequest;
use App\Http\Resources\RecipeResource;
use Illuminate\Http\Request;
use App\Models\Recette;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class recetteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['showRecette', 'showRecipeDetails', 'searchRecipe']);
    }
    public function showRecette()
    {
        $recettes = Recette::all(); // DB::select("SELECT * FROM recette");
        $user = Auth::user(); 

        return view('home', compact('recettes', 'user'));
    }
    public function AddFormController()
    {
        return view('addRecipe');
    }
    public function addRecipe(AddRecipeRequest $request)
    {
        $validated = $request->validated();
        $user_id = Auth::id();
        $validated['user_id'] = $user_id;

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
    public function deleteRecipe($id)
    {
        $recette = Recette::find($id);
        $recette->delete();
        return redirect(route('home'))->with('success', 'Recette supprimée avec succés');
    }
    public function searchRecipe(Request $request)
    {
        $search_text = $request->input('query');
        $recettes = Recette::where('titre', 'like', '%' . $search_text . '%')->get();
        return view('home', compact('recettes', 'search_text'));
    }

    public function showRecipeDetails($id)
    {
        $recette = Recette::find($id);

        return view('details', compact('recette'));
    }

}
