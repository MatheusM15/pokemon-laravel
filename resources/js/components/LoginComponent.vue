<template>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Login</div>
                <div class="card-body">
                    <form method="POST" action="" @submit.prevent="logar($event)">
                        <input type="hidden" name="_token" :value="csrf_token">
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
                            <div class="col-md-6">
                                <input id="email" type="email" v-model="email" class="form-control " name="email" value="" required autocomplete="email" autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Senha:</label>
                            <div class="col-md-6">
                                <input id="password" v-model="password" type="password" class="form-control " name="password" required autocomplete="current-password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" >

                                    <label class="form-check-label" for="remember">
                                        Lembre-mim
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Logar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
    export default {
        props: ['csrf_token'],
        data(){
            return {
                url: "http://127.0.0.1:8000/api/login",
                email: '',
                password: '',
                error: '',
            }
        },
        methods:{
            logar(e){
                let cof = {
                    method: 'post',
                    body: new URLSearchParams({
                       email: this.email,
                       password: this.password
                    })
                }
                fetch(this.url,cof)
                .then(res => res.json())
                .then(data => {
                    if(data){
                        document.cookie = 'token='+data.token
                        sessionStorage.setItem('idUser',data.user_id)
                        e.target.submit()
                    }
                })
                .catch(error =>{
                    console.log(error)
                })
            }
        },
        mounted() {
            
        }
    }
</script>
