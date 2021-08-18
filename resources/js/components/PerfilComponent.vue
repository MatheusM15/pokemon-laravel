<template>
    <div class="container">
        
        <div class="d-flex justify-content-center">
            <div class="card w-100">
                <div class="card-header text-center">
                    <img style="border-radius: 50%" :src="user">
                    <h3>{{ treinador.name }}</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div v-for="pokemon  in treinador.pokemon" :key="pokemon.id" class="col-2">
                            <div class="card">
                                <div class="text-center">
                                    {{pokemon.name.toUpperCase()}}
                                </div>
                                <img :src="pokemon.img_pok" alt=""> 
                                <strong> Nivel: {{pokemon.nivel}} <button @click="deletarPokemon(pokemon.id)" type="button" class="ml-4 btn btn-danger"><img height="15" width="15" :src="lix"></button></strong>
                                <strong> vida: {{pokemon.vida}}</strong>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-center">
                        <h4>Poder Total: {{total}}</h4>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['lix','user'],
        data(){
            return {
                url: 'http://127.0.0.1:8000/api/treinador/',
                treinador: {},
                total: 0

                }
        },
        mounted() {
            let id =  window.location.pathname
            id = id.substring(8,9)
            let url = this.url + id
            axios.get(url)
            .then(response => {
                this.treinador =  response.data[0]
                for(let pokemon in this.treinador.pokemon){
                     console.log(this.treinador.pokemon[pokemon])
                     this.total += parseInt(this.treinador.pokemon[pokemon].vida)
                }
            })
        },
        methods:{
            deletarPokemon(id){
                let
                axios.post(this)
            }
        }
    }
</script>
