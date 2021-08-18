<template>
    <div class="container">
       
        <div v-if="!pesquisar" class="d-flex justify-content-center mb-4">
             <input type="text" class="form-control" v-model="searchPokemon" placeholder="Ex: Pikachu">
            <button @click="getPokemon()" type="button mr-4" class="btn btn-success">Pokemon</button>
        </div>
        <div class="d-flex justify-content-center">
        </div>
        <card-component v-if="pesquisar" :pok="pokemon" >
            <template  v-slot:input>
                 <button @click="adicionar()" class="btn btn-success">Adcionar</button>
                 <button @click="back()" class="btn btn-danger">Pesquisar</button>
            </template>
        </card-component>
        <alert-component :alert="alert" v-if="alert.view"></alert-component>
        <div class="d-flex justify-content-center">
            <img v-if="loading" src="https://i.pinimg.com/originals/4e/a2/3e/4ea23e6339937b95a8aa5cd08eeb3266.gif">
        </div>
    </div>
</template>
<script>
    export default {
        data(){
            return {
                searchPokemon: '',
                pokemon: {
                },
               pesquisar: false,
                url : "https://pokeapi.co/api/v2/pokemon/",
                urlPok: '',
                alert: {
                    view: false,
                    msg: '',
                    tipo: ''
                },
                loading: false,
                totalpok: ''
            }
        },
        mounted() {
            
            this.totalPok();
        },
        methods: {
            getPokemon(){
                let urlUpper = this.searchPokemon.toLowerCase();  
                 let url =  this.url + urlUpper;
                 this.loading = !this.loading;
                 axios.get(url)
                 .then(res => {
                this.pokemon =  res.data
                console.log(this.pokemon)
                this.pesquisar = !this.pesquisar
                this.alert.view = false
                this.loading = !this.loading
            })
            .catch(err => {
                console.log(err.response.data)
                this.alert.view = true
                this.alert.msg = err.response.data
                this.alert.tipo = 'danger'
                this.loading = !this.loading
                })
            },
            getUrl(url){
                
                axios.get(url)
                .then(res => this.urlPok = res.data.sprites.back_default)
                
            },
            adicionar(){
                if(this.totalPok >= 6){
                    this.alert.view = true;
                    this.alert.msg = 'O treinador possui mais que 6 pokemon'
                    this.alert.tipo = 'danger';
                }else{
                    let url = "http://127.0.0.1:8000/api/pokemon"
                    let form = {
                    dono: sessionStorage.getItem('idUser'),
                    img_pok: this.pokemon.sprites.front_default,
                    name: this.pokemon.name,
                    ability: this.pokemon.abilities[0].ability.name,
                    nivel: 1,
                    vida: this.pokemon.base_experience
                }
                axios.post(url,form)
                .then(res => {
                    this.alert.view = true;
                    this.alert.msg = res.data.msg
                    this.alert.tipo = 'success'
                    this.pesquisar = !this.pesquisar
                    this.searchPokemon =  ''
                })
                .catch(err => console.error(err.response))
                }
                
            },
            back(){
                this.pesquisar = !this.pesquisar
                this.alert.view = false;
            },
            totalPok(){
                let url = "http://127.0.0.1:8000/api/getpoke/" + sessionStorage.getItem('idUser');
                axios.get(url)
                .then(response => {
                    this.totalPok = response.data
                })
                
            }
        }
    }
</script>
