<?php

namespace App\Http\Controllers;

use App\Models\Exercice;
use Illuminate\Http\Request;

class ExerciseController extends Controller
{
    private $categories = [
        'Biceps',
        'Triceps',
        'Pectoraux',
        'Dos',
        'Épaules', 
        'Jambes',
        'Abdominaux',
        'Cardio'
    ];

    public function index(Request $request)
    {
        $query = Exercice::query();
        
        if ($request->has('category') && $request->category) {
            $query->where('category', $request->category);
        }
        
        $exercices = $query->get();
        
        return view('index', [
            'exercices' => $exercices,
            'categories' => $this->categories
        ]);
    }

    public function create()
    {
        return view('create', [
            'categories' => $this->categories
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|string',
            'category' => 'required|string',
        ]);

        Exercice::create($request->all());

        // CORRECTION : Utilise 'index' (le nom de ta route racine)
        return redirect()->route('index')->with('success', 'Exercice créé avec succès!');
    }



    
    public function show(Exercice $exercice)
    {
        return view('show', compact('exercice'));
    }

    public function edit(Exercice $exercice)
    {
        return view('edit', [
            'exercice' => $exercice,
            'categories' => $this->categories
        ]);
    }

    public function update(Request $request, Exercice $exercice)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|string',
            'category' => 'required|string',
        ]);

        $exercice->update($request->all());

        // CORRECTION : Utilise 'index' (le nom de ta route racine)
        return redirect()->route('index')->with('success', 'Exercice modifié avec succès!');
    }

    public function destroy(Exercice $exercice)
    {
        $exercice->delete();

        // CORRECTION : Utilise 'index' (le nom de ta route racine)
        return redirect()->route('index')->with('success', 'Exercice supprimé avec succès!');
    }
}