import { createMemoryHistory, createRouter } from 'vue-router'

import index from './pages/HomeView.vue'
import pokemonView from './pages/PokemonView.vue'


const routes = [
    { path: '', name: 'home', component: index },
    { path: '/pokemon/:name', name: 'pokemon', component: pokemonView, props: true},
]

const router = createRouter({
    history: createMemoryHistory(),
    routes,
})

export default router