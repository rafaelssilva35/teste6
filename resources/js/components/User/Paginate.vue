<template>
    <pagination :limit="8" :data="paginate" @pagination-change-page="getResults"/>
</template>

<script>
import {mapState} from "vuex"

export default {
  computed: {
      ...mapState({
          paginate: state => state.userPaginate
      })
  },
  methods: {
      getResults(page = 1) {
        this.$store.commit("SET_PAGE_SELECTED", page);
        this.$store.commit("SET_UPDATE_PAGINATE");
      }
  }
};
</script>
