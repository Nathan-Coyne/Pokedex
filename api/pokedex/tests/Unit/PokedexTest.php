<?php

namespace Tests\Unit;

use App\Models\Pokemon;
use App\Repositories\PokedexRepository;
use App\Models\User;
use App\Services\PokedexService;
use Illuminate\Contracts\Console\Kernel;
use PHPUnit\Framework\TestCase;

class PokedexTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        $app = require __DIR__.'/../../bootstrap/app.php';
        $app->make(Kernel::class)->bootstrap();
    }

    /** I would test the http request but I am using the test to build the logic quickly */
    public function test_pokemon_get_specific_by_name(): void
    {
        $inputs = [
            'ditto',
            'pikachu',
            'bulbasaur',
            'charmander',
            'squirtle',
            'jigglypuff',
        ];

        foreach ($inputs as $input) {
            $response = PokedexRepository::getPokemonByName($input);
            $data = $response->json();
            $this->assertEquals(200, $response->status());
            $this->assertEquals($input, $data['name']);
        }
    }

    public function test_pokemon_get_all(): void
    {
        $response = PokedexRepository::getAllPokemon(30);
        $this->assertEquals(200, $response->status());
        $data = $response->json();
        $this->assertCount(30, $data['results']);
        foreach ($data['results'] as $result) {
            $this->assertArrayHasKey('name', $result);
            $this->assertArrayHasKey('url', $result);
        }
    }

    public function test_pokemon_service_get_all() {
        $pokemon = PokedexService::getPokemon(30, 0);

        foreach ($pokemon as $mon) {
            $this->assertInstanceOf(Pokemon::class, $mon);
        }
    }

    public function test_pokemon_service_get_specific_by_name() {
        $input = 'ditto';
        $pokemon = PokedexService::getSpecificPokemonByName($input);
        $this->assertCount(1, $pokemon);
        foreach ($pokemon as $mon) {
            $this->assertInstanceOf(Pokemon::class, $mon);
            $this->assertEquals($input, $mon->getName());
        }
    }
}
