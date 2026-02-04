<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Choco;
use App\Http\Resources\ChocoResource;
use Illuminate\Support\Facades\Validator;

class ChocoController extends Controller
{
    public function index()
    {
        $chocos = Choco::all();
        return new ChocoResource(true, 'List Data Choco', $chocos);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'Sales Person' => 'required|string',
            'Country' => 'required|string',
            'Product' => 'required|string',
            'Date' => 'required|date',
            'Amount' => 'required|numeric',
            'Boxes Shipped' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $choco = Choco::create($request->all());

        return new ChocoResource(true, 'Data Berhasil Ditambahkan', $choco);
    }

    public function show($id)
    {
        $choco = Choco::find($id);

        if (!$choco) {
            return response()->json(['message' => 'Data Tidak Ditemukan'], 404);
        }

        return new ChocoResource(true, 'Detail Data Choco', $choco);
    }

    public function update(Request $request, $id)
    {
        $choco = Choco::find($id);

        if (!$choco) {
            return response()->json(['message' => 'Data Tidak Ditemukan'], 404);
        }

        $validator = Validator::make($request->all(), [
            'Sales Person' => 'required|string',
            'Country' => 'required|string',
            'Product' => 'required|string',
            'Date' => 'required|date',
            'Amount' => 'required|numeric',
            'Boxes Shipped' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $choco->update($request->all());

        return new ChocoResource(true, 'Data Berhasil Diupdate', $choco);
    }

    public function destroy($id)
    {
        $choco = Choco::find($id);

        if (!$choco) {
            return response()->json(['message' => 'Data Tidak Ditemukan'], 404);
        }

        $choco->delete();

        return response()->json(['message' => 'Data Berhasil Dihapus'], 200);
    }
}
