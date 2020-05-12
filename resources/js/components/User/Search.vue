<template>    
<!-- Search form -->
<div class="active-purple-3 active-purple-4 mb-4">
    <div class="container">
        <div class="form-group">
            <label for="exampleFormControlSelect2">Selesione um filtro</label>
            <select v-model="serachTipe" class="form-control" id="exampleFormControlSelect2">
                <option selected value="0">-----</option>
                <option value="name">Nome</option>
                <option value="beetwen">Entre datas</option>
                <option value="10maisLogin">10 que mais fizeram login</option>
                <option value="10menosLogin">10 que menos fizeram login</option>
            </select>
        </div>
    </div>
    <search-beetwen v-if="serachTipe == 'beetwen'"/>
    <div class="container" v-if="serachTipe == 'name'">
        <div class="form-group">
          <input @keyup="setData($event)" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        </div>
    </div>
</div>
</template>

<script>
import SearchBeetwen from './SearchBeetwenDateLog'

export default {
    components: {
        SearchBeetwen
    },
    data() {
        return {
            serachTipe:0
        }
    },
    watch:{
        serachTipe(value){
            this.$store.commit("SET_SEARCH_TYPE", value);
            
            if( value == '10maisLogin' || value == '10menosLogin')
            this.$store.commit("SET_UPDATE_PAGINATE");
        }
    },
    methods:{
        setData(event){
            this.$store.commit("SET_SEARCH_KEY", event.target.value);
            this.$store.commit("SET_UPDATE_PAGINATE");

        }
    }
}
</script>
