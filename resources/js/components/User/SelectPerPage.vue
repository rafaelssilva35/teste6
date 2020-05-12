<template>
    <div class="container">
        <div class="form-group">
            <label for="exampleFormControlSelect2">Example multiple select</label>
            <select @change="changePerPage($event)" value="20" class="form-control" id="exampleFormControlSelect2">
              <option v-for="page in perpage" :value="page.value">{{page.value}}</option>
            </select>
        </div>
    </div>
</template>

<script>
import laravelAxiosAuth from 'laravel-axios-auth'
import axios from 'axios'
import {mapState} from "vuex"
import paginate from './Paginate'

export default {
  components: {
    paginate
  },
  data() {
    return {
    };
  },
  computed: {
      ...mapState({
          perpage: state => state.perpage
      })
  },
  methods: {
    changePerPage(event) {
      this.$store.commit("SET_PERPAGE_SELECTED", event.target.value);
      this.$store.commit("SET_UPDATE_PAGINATE");
    }
  }
};
</script>
