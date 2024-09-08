<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    public function store(Request $request)
    {
        // Validar la entrada
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
        ]);

        // Crear el nuevo item con stage 1 e id autogenerado
        $item = Item::create([
            'title' => $validatedData['title'],
            'stage' => 1, // Stage inicial
        ]);

        // Responder con el nuevo item y código 201
        return response()->json($item, 201);
    }

    // Método para manejar PUT /boards/{id}
    public function update(Request $request, $id)
    {
        // Validar que stage esté presente y sea 1, 2 o 3
        $validatedData = $request->validate([
            'stage' => 'required|integer|in:1,2,3',
        ]);

        // Buscar el item por su ID
        $item = Item::findOrFail($id);

        // Actualizar el stage
        $item->stage = $validatedData['stage'];
        $item->save();

        // Responder con el item actualizado y código 200
        return response()->json($item, 200);
    }
}
