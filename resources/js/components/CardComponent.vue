<template>
    <div class="card">
    <div class="card-header text-center">
        <img width="150" height="150" :src="getImage()">
        <h2>{{ pok.name.toUpperCase() }}</h2>
    </div>
    <div class="card-body">
        <h3>Total de vida: {{ pok.base_experience }}</h3>
        <div class="progress">
            <div id="pogre" class="progress-bar b-danger" role="progressbar" :aria-valuenow="pok.base_experience" aria-valuemin="0" :aria-valuemax="pok.base_experience">{{ porcentagem }}%</div>
            
        </div>
        <h3>Ablilidades:</h3>
        <h5 v-for="abl in pok.abilities" :key="abl.name">{{ abl.ability.name }}</h5>
        <div class="text-center">
            <slot name="input"></slot>
        </div>
    </div>
    </div>
</template>

<script>
    export default {
        props: ['pok'],
        mounted() {
            this.setPogress()
        },
        data(){
            return{
                porcentagem: ''
            }
        },
    methods: {
        setPogress(){
             this.porcentagem =  (this.pok.base_experience * 100) / this.pok.base_experience  ;
            document.getElementById('pogre').style =  'width:' + this.porcentagem + '%'
        },
        getImage(){
           return this.pok.sprites.front_default
        }
    }       
    }   
</script>
