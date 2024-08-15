<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;

class HotelController extends Controller
{
    public function index()
    {
        return Hotel::all();
    }

    public function store(Request $request) {
        
        $this->authorize('create', Hotel::class);
    
        $data = $request->validate([
            'nome' => 'required|string',
            'url' => 'required|url',
            'cnpj' => 'required|unique:hotels,cnpj',
            'status' => 'required|in:ativo,inativo'
        ]);
    
        $hotel = Hotel::create($data);
    
        return response()->json($hotel, 201);
    }
    

    public function show($id)
    {
        $hotel = Hotel::find($id);

        if (auth()->user()->hotel_id !== $hotel->id && auth()->user()->funcao !== 'master') {
            abort(403, 'Acesso negado.');
        }

        return response()->json($hotel);
    }

    public function update(Request $request, $id)
    {
        $hotel = Hotel::findOrFail($id);
        $hotel->update($request->all());
        return response()->json($hotel, 200);
    }

    public function destroy($id)
    {
        Hotel::destroy($id);
        return response()->json(null, 204);
    }
}
