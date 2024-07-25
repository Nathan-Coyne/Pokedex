<template>
  <div>
    <h1>Pokemon</h1>
    <router-link :to="{name:'home'}">Back</router-link>
    <h2 v-if="error"> {{error}}</h2>
    <div v-else>
      <h2>{{ pokemon.name }}</h2>
      <img :src="pokemon.image" :alt="pokemon.name" />
      <p>Species: <span> {{species}}</span></p>
      <p>Height: <span> {{pokemon.height}}</span></p>
      <p>Weight: <span> {{pokemon.weight}}</span></p>
      <p>Abilities: <span> {{abilities}}</span></p>
    </div>
  </div>
</template>
<script>
import instance from "@/axois";

export default {
  data() {
    return {
      error: null,
      pokemon: {}
    }
  },
  props: {
    name: {
      type: String,
      required: true
    }
  },
  async mounted() {
    const pokemon = await instance.get('/pokedex/' + this.name)
    pokemon.status !== 200 ?
        this.error = 'Sorry it seems your pokedex is faulty :(' :
        this.error = null

    this.pokemon = pokemon.data;
  },
  computed: {
    species() {
      if (Object.keys(this.pokemon).length !== 0) {
        return  this.pokemon.types.map(type => type.type.name).join(', ');
      }
      return '';
    },

    abilities() {
      if (Object.keys(this.pokemon).length !== 0) {
        return  this.pokemon.abilities.map(ability => ability.ability.name).join(', ');
      }
      return '';
    },
  }
}
</script>

<style scoped>

</style>