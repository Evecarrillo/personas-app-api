<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Municipio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MunicipioController extends Controller
{
    public function index()
    {
        $municipios = DB::table('tb_municipio')
            ->orderBy('muni_codi')
            ->get();
        return json_encode(['municipios' => $municipios]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|exists:tb_departamento,depa_codi',
        ]);

        $municipio = new Municipio();
        $municipio->muni_nomb = $request->name;
        $municipio->depa_codi = $request->code;
        $municipio->save();

        return json_encode(['municipio' => $municipio]);
    }

    public function show(string $id)
    {
        $municipio = DB::table('tb_municipio')
            ->join('tb_departamento', 'tb_municipio.depa_codi', '=', 'tb_departamento.depa_codi')
            ->select('tb_municipio.*', 'tb_departamento.depa_nomb')
            ->where('tb_municipio.id', $id)
            ->first();

        if (!$municipio) {
            return response()->json(['message' => 'Municipio no encontrado'], 404);
        }

        return json_encode(['municipio' => $municipio]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|exists:tb_departamento,depa_codi',
        ]);

        $municipio = Municipio::find($id);

        if (!$municipio) {
            return response()->json(['message' => 'Municipio no encontrado'], 404);
        }

        $municipio->muni_nomb = $request->name;
        $municipio->depa_codi = $request->code;
        $municipio->save();

        return json_encode(['municipio' => $municipio]);
    }

    public function destroy(string $id)
    {
        $municipio = Municipio::find($id);

        if (!$municipio) {
            return response()->json(['message' => 'Municipio no encontrado'], 404);
        }

        $municipio->delete();

        return json_encode(['municipio' => $municipio]);
    }
}
