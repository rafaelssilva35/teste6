<template>
    <div class="container">
        <search/>
        <select-perPage/>
        <table class="table">
        <thead>
            <tr>
            <th scope="col">quantidade de acessos</th>
            <th scope="col">Nome</th>
            <th scope="col">Email</th>      
            <th scope="col">Status</th>      
            </tr>
        </thead>
        <tbody>
            <tr v-for="user in users">
            <th scope="row">{{user.count}}</th>
            <td>{{user.name}}</td>
            <td>{{user.email}}</td>
            <td>{{user.active ==  1 ?'Ativo' : 'Inativo'}}</td>
            </tr>
        </tbody>
        </table>
        <paginate/>
    </div>
</template>

<script>
import laravelAxiosAuth from 'laravel-axios-auth'
import axios from 'axios'
import {mapState} from "vuex"
import paginate from './Paginate'
import SelectPerPage from './SelectPerPage'
import Search from './Search'

export default {
  components: {
    paginate,
    SelectPerPage,
    Search
  },
  data() {
    return {
    };
  },
  mounted() {
    laravelAxiosAuth(axios);
    this.loadAuthUser();
  },
  computed: {
      ...mapState({
          users: state => state.userPaginate.data
      })
  },

  methods: {
    loadAuthUser() {
      axios
        .get("/api/users")
        .then(data => {
          this.$store.commit("SET_USER_PAGINATE", data.data);
        })
        .catch(error => {
          console.log(error);
        });
    }
  }
};
</script>
