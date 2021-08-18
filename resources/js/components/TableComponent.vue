<template>
    <table class="table table-hover table-dark">
  <thead>
    <tr>
      <th v-for="h in head" :key="h">{{h}}</th>
    </tr>
  </thead>
  <tbody>
    <tr v-for="marca in obj" :key="marca.id">
      <td>{{marca.id}}</td>
      <td>{{marca.name}}</td>
      <div v-if="pok == true">
          <td>
              <span v-for="pok in marca.pokemon" :key="pok.id">
                  <img style="border-radius: 50%" height="50" width="50" :src="pok.img_pok">
              </span>
          </td>
          
      </div>
      <td><a :href="getPerfil(marca.id)"><button class="btn btn-primary"><img height="25" width="25" :src="pokebola">  Perfil</button></a></td>
    </tr>
  </tbody>
</table>
</template>

<script>
    export default {
      props: ['pokebola','head','obj','pok'],
        mounted() {
          axios.get()
        },
        methods: {
          getPerfil(id){
            return 'http://127.0.0.1:8000/perfil/' + id;
          }
        }
    }
</script>
