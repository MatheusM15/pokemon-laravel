<template>
   <div  :class="getTipo()" role="alert">
  {{ alert.msg }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
    </div>
</template>

<script>
    export default {
        props: ['alert'],
        mounted() {
            
        },
        methods: {
            getTipo() {
                return 'alert alert-'+ this.alert.tipo
            }
            }
    }
</script>
