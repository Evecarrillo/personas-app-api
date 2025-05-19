<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Pais;
use Illuminate\Http\Request;

class PaisesController extends Controller
{
    public function index()
    {
        $paises = Pais::all();
        return response()->json($paises);
    }

    public function store(Request $request)
    {
        $pais = new Pais();
        $pais->pais_codi = $request->input('pais_codi');
        $pais->pais_nomb = $request->input('pais_nomb');
        $pais->save();

        return response()->json([
            'message' => 'País creado correctamente',
            'pais' => $pais
        ], 201);
    }

    public function show(string $id)
    {
        $pais = Pais::find($id);

        if (!$pais) {
            return response()->json(['message' => 'País no encontrado'], 404);
        }

        return response()->json($pais);
    }

    public function update(Request $request, string $id)
    {
        $pais = Pais::find($id);

        if (!$pais) {
            return response()->json(['message' => 'País no encontrado'], 404);
        }

        $pais->pais_nomb = $request->input('pais_nomb');
        $pais->save();

        return response()->json([
            'message' => 'País actualizado correctamente',
            'pais' => $pais
        ]);
    }

    public function destroy(string $id)
    {
        $pais = Pais::find($id);

        if (!$pais) {
            return response()->json(['message' => 'País no encontrado'], 404);
        }

        $pais->delete();

        return response()->json(['message' => 'País eliminado correctamente']);
    }
}
