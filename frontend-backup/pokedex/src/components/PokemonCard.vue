<template>
  <span class="col-3">
    <router-link :to="{name: 'pokemon', params: { name: pokemon.name }}"> {{ pokemon.name }}</router-link>
  </span>
</template>
<script>

export default {
  name: 'PokemonCard',
  data() {
    return {
      error: null
    }
  },
  props: {
    pokemon: {
      type: Object,
      required: true
    }
  },
}
</script>
<style scoped>

</style>