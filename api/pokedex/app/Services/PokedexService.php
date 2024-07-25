<?php

namespace App\Services;

use App\Models\Pokemon;
use App\Repositories\PokedexRepository;
use Illuminate\Support\Collection;

class PokedexService
{
    /**
     * @param int $limit
     * @param int $offset
     * @return Collection<Pokemon>
     */
    public static function getPokemon(int $limit, int $offset): Collection
    {
        if ($limit === 0) {
            return collect([]);
        }

        $response = PokedexRepository::getAllPokemon($limit, $offset);
        $pokemon = $response->json();

        if (count($pokemon['results']) === 0) {
            return collect([]);
        }

        return collect($pokemon['results'])->map(function ($item) {
            $pokemon = new Pokemon();
            $pokemon->setName($item['name']);
            $pokemon->setUrl($item['url']);
            return $pokemon;
        });
    }

    /**
     * @param string $name
     * @return Pokemon
     */
    public static function getSpecificPokemonByName(string $name): Pokemon
    {
        $response = PokedexRepository::getPokemonByName($name);
        $pokemonArray = $response->json();

        $pokemon = new Pokemon();
        $pokemon->setName($pokemonArray['name'] ?? '');
        $pokemon->setUrl($pokemonArray['url'] ?? '');
        $pokemon->setImage($pokemonArray['sprites']['front_default'] ?? '');
        $pokemon->setHeight($pokemonArray['height'] ?? '');
        $pokemon->setWeight($pokemonArray['weight'] ?? '');
        $pokemon->setTypes($pokemonArray['types'] ?? []);
        $pokemon->setAbilities($pokemonArray['abilities'] ?? []);

        return $pokemon;
    }
}
