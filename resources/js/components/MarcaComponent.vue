<template>
    <div>
        <div class="container">
            <div class="d-flex justify-content-center">
                <table-component :head="getHead()" :obj="obj">
                    <template v-slot:input>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#edit">Editar</button>
                    </template>
                </table-component>
               <modal-component id="edit" titulo="Editar"></modal-component>
            </div>
            <div class="d-flex justify-content-center">
                <button class="btn btn-success" data-toggle="modal" data-target="#create">Criar Marca</button>
                <modal-component id="create" titulo="Criar">
                    <template v-slot:input>
                        <div class="form-group">
                            <label for="name">Nome:</label>
                            <input name="name" class="form-control" required placeholder="nome" v-model="name">
                        </div>
                    </template>
                        <template v-slot:but>
                            <button  @click="enviar()" class="btn btn-success">Criar</button> 
                        </template>
                </modal-component>
            </div>
    </div>
</div>
</template>

<script>
    export default {
        data(){
            return{
                url: "http://127.0.0.1:8000/api/marca",
                obj: '',
                name: ''
                
            }
        },
        methods:{
            lista(){
                axios.get(this.url)
                .then(res => {
                    console.log(res)
                    this.obj =  res.data
                    console.log(obj)

                })
            },
            getHead(){
                return [
                    'id','nome','editar'
                ]
            },
            enviar(){
                let conf = {
                    headers: {
                        'Accept': 'application/json'  
                    }
                }
                let data = new FormData()
                data.append('name',this.name)
                axios.post(this.url,data,conf)
                .then(response => {
                    console.log(response)
                })
                .catch(err => console.log(err.errors))
               
            }
        },
        mounted() {
            this.lista();
        }
    }
</script>
