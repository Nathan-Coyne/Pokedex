<?php

namespace App\Http\Controllers;

use App\Services\PokedexService;
use Illuminate\Http\Request;

class PokedexController extends Controller
{
    public function index(Request $request)
    {
        $response = PokedexService::getPokemon(
            (int)$request->query('limit') ?: 20,
            $request->query('offset') ?: 0
        );

        $formattedResponse = $response->map(function ($item) {
            return $item->toArray();
        });
        return response()->json($formattedResponse->toArray());
    }

    public function show(string $name)
    {
        $response = PokedexService::getSpecificPokemonByName($name);

        return response()->json($response->toArray());
    }
}
