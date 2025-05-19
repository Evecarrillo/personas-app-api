<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Departamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DepartamentoController extends Controller
{
    public function index()
    {
        $departamentos = DB::table('tb_departamento')
            ->join('tb_pais', 'tb_departamento.pais_codi', '=', 'tb_pais.pais_codi')
            ->select('tb_departamento.*', 'tb_pais.pais_nomb')
            ->orderBy('depa_nomb')
            ->get();

        return response()->json(['departamentos' => $departamentos]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'depa_nomb' => 'required|string|max:255',
            'pais_codi' => 'required|integer|exists:tb_pais,pais_codi',
        ]);

        $departamento = new Departamento();
        $departamento->depa_nomb = $request->depa_nomb;
        $departamento->pais_codi = $request->pais_codi;
        $departamento->save();

        return response()->json(['departamento' => $departamento], 201);
    }

    public function show(string $id)
    {
        $departamento = DB::table('tb_departamento')
            ->join('tb_pais', 'tb_departamento.pais_codi', '=', 'tb_pais.pais_codi')
            ->select('tb_departamento.*', 'tb_pais.pais_nomb')
            ->where('tb_departamento.depa_codi', $id)
            ->first();

        if (!$departamento) {
            return response()->json(['message' => 'Departamento no encontrado'], 404);
        }

        $paises = DB::table('tb_pais')->orderBy('pais_nomb')->get();

        return response()->json([
            'departamento' => $departamento,
            'paises' => $paises,
        ]);
    }

    public function update(Request $request, string $id)
    {
        $departamento = Departamento::find($id);

        if (!$departamento) {
            return response()->json(['message' => 'Departamento no encontrado'], 404);
        }

        $request->validate([
            'depa_nomb' => 'required|string|max:255',
            'pais_codi' => 'required|integer|exists:tb_pais,pais_codi',
        ]);

        $departamento->depa_nomb = $request->depa_nomb;
        $departamento->pais_codi = $request->pais_codi;
        $departamento->save();

        return response()->json(['departamento' => $departamento]);
    }

    public function destroy(string $id)
    {
        $departamento = Departamento::find($id);

        if (!$departamento) {
            return response()->json(['message' => 'Departamento no encontrado'], 404);
        }

        $departamento->delete();

        $departamentos = DB::table('tb_departamento')
            ->join('tb_pais', 'tb_departamento.pais_codi', '=', 'tb_pais.pais_codi')
            ->select('tb_departamento.*', 'tb_pais.pais_nomb')
            ->orderBy('depa_nomb')
            ->get();

        return response()->json([
            'departamentos' => $departamentos,
            'success' => true,
        ]);
    }
}
