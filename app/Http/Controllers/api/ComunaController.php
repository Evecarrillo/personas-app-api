<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Comuna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ComunaController extends Controller
{
    public function index()
    {
        $comunas = DB::table('tb_comuna')
            ->join('tb_municipio', 'tb_comuna.muni_codi', '=', 'tb_municipio.muni_codi')
            ->select('tb_comuna.*', 'tb_municipio.muni_nomb')
            ->get();

        return json_encode(['comunas' => $comunas]);
    }

    public function store(Request $request)
    {
        // Validación
        $request->validate([
            'comu_nomb' => 'required|string|max:255',
            'muni_codi' => 'required|integer|exists:tb_municipio,muni_codi',
        ]);

        // Crear nueva comuna con los nombres correctos
        $comuna = new Comuna();
        $comuna->comu_nomb = $request->comu_nomb;
        $comuna->muni_codi = $request->muni_codi;
        $comuna->save();

        return response()->json(['comuna' => $comuna], 201);
    }
    public function show(Comuna $comuna)
    {
        $comuna = Comuna::find($comuna);
        if (!$comuna) {
            return response()->json(['message' => 'Comuna no encontrada'], 404);
        }
        $municipios = DB::table('tb_municipio')->orderBy('muni_nomb')->get();

        return response()->json([
            'comuna' => $comuna,
            'municipios' => $municipios,
        ]);
    }

    public function update(Request $request, Comuna $comuna)
    {
        $comuna = Comuna::find($comuna);

        if (!$comuna) {
            return response()->json(['message' => 'Comuna no encontrada'], 404);
        }

        $request->validate([
            'comu_nomb' => 'required|string|max:255',
            'muni_codi' => 'required|integer|exists:tb_municipio,muni_codi',
        ]);

        $comuna->comu_nomb = $request->comu_nomb;
        $comuna->muni_codi = $request->muni_codi;
        $comuna->save();

        return response()->json(['comuna' => $comuna]);
    }

    public function destroy(Comuna $comuna)
    {
        $comuna = Comuna::find($comuna);
        $comuna->delete();
        $comunas = DB::table('tb_comuna')
            ->join('tb_municipio', 'tb_comuna.muni_codi', '=', 'tb_municipio.muni_codi')
            ->select('tb_comuna.*', 'tb_municipio.muni_nomb')
            ->get();
        return json_encode(['comunas' => $comunas, 'success' => true]);
    }
}
