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
    public function storeRecipe(Request $request)
    {
        // Validate the form data
        $request->validate([
            'titre' => 'required|string|max:100',
            'description' => 'string',
            'ingredients' => 'required|string',
            'instructions' => 'string',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Handle file upload if an image is provided
        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $imagePath = $image->storeAs('recipe_images', $imageName, 'public');
        }

        // Store the recipe in the database
        DB::table('recette')->insert([
            'titre' => $request->input('titre'),
            'description' => $request->input('description'),
            'ingredients' => $request->input('ingredients'),
            'instructions' => $request->input('instructions'),
            'image_path' => $imagePath,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Redirect to the home page or wherever you want after adding the recipe
        return redirect()->route('home')->with('success', 'Recipe added successfully!');
    }
}
