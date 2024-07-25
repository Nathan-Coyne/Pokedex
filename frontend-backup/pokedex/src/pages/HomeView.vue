<template>
  <div>
    <h1>Pokedex</h1>
    <input type="text" v-model="search">
    <h2 v-if="error"> {{error}}</h2>
    <div v-else>
      <div class="row" v-for="pokemon in filteredPokemons" :key="pokemon.id">
        <PokemonCard :pokemon="pokemon" />
      </div>
    </div>
  </div>
</template>
<script>
import instance from "@/axois";
import PokemonCard from "@/components/PokemonCard.vue";

export default {
  components: {
    PokemonCard: PokemonCard
  },
  data() {
    return {
      error: null,
      pokemons: [],
      search: ''
    }
  },
  computed: {
    filteredPokemons() {
      if (!this.search) {
        return this.pokemons;
      }

      return this.pokemons.filter(pokemon => {
        return pokemon.name.toLowerCase().includes(this.search.toLowerCase());
      });
    }
  },
  async mounted() {
    const pokemon = await instance.get('/pokedex?limit=151')

    pokemon.status !== 200 ?
        this.error = 'Sorry it seems your pokedex is faulty :(' :
        this.error = null
    this.pokemons = pokemon.data;
  }
}
</script>
<style scoped>

</style>