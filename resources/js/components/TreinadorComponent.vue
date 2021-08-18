<template>
    <div class="container">
        <img v-if="load" :src="loading">
        <div class="d-flex justify-content-center">
            <table-component v-if="!load" :pokebola="pokebola" :head="head()" :pok="true" :obj="treinadores">
                
            </table-component>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['pokebola','loading'],
        data(){
            return {
                url: 'http://127.0.0.1:8000/api/treinador',
                treinadores: {},
                load: false
            }
        },
        mounted() {
            this.load = true;
            this.getTreinadores()
        },
        methods: {
            getTreinadores(){
                axios.get(this.url)
                .then(res =>{
                    this.treinadores = res.data
                    this.load = false
                })
            },
            head(){
                return [
                    'id','name','pokemons','editar'
                ]
            }
        }
    }
</script>
