<template>
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"></div>
                <div class="card-body">
                    Voce esta logado
                </div>
                {{ totalPok }}
            </div>
        </div>
    </div>
</div>
</template>

<script>
    export default {
        data(){
            return {
                url: "http://127.0.0.1:8000/api/getpoke/",
                totalPok: ''
            }
        },
        mounted() {
            let urlFinal = this.url  + sessionStorage.getItem('idUser')
            axios.get(urlFinal)
            .then(response => {
                this.totalPok = response.data
            })
        }
    }
</script>
