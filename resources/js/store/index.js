import Vue from 'vue';
import Vuex from 'vuex';
import laravelAxiosAuth from 'laravel-axios-auth'
import axios from 'axios'

laravelAxiosAuth(axios);
Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        userPaginate: [],
        selectedPage: [],
        perpage: [
            {value:10, selected: false},
            {value:20, selected: false},
            {value:30, selected: false},
            {value:100, selected: false},
        ],
        perageSelected: 10,
        pageSelected: 1,
        searchDates: {
            type:null,
            searchKey:null
        }
    },
    actions: {

    },
    getters: {
        userPaginate(state) {
            return state.userPaginate
        },
        perageSelected(state) {
            return state.perageSelected
        },
        searchDates(state) {
            return state.searchDates
        }
    },
    mutations: {        
        SET_SEARCH_TYPE(state, type) {
            state.searchDates.type = type
        },
        SET_SEARCH_KEY(state, searchKey) {
            state.searchDates.searchKey = searchKey
        },
        SET_USER_PAGINATE(state, userPaginate) {
            state.userPaginate = userPaginate
        },
        SET_PERPAGE_SELECTED(state, perageSelected) {
            state.perageSelected = perageSelected
        },
        SET_PAGE_SELECTED(state, pageSelected) {
            state.pageSelected = pageSelected
        },
        SET_SEARCH_DATE(state, searchDates) {
            state.searchDates = searchDates
        },
        SET_UPDATE_PAGINATE(state) {       
            axios
            .get("/api/users?page="+state.pageSelected+"&per_page="+state.perageSelected+"&searchType="+state.searchDates.type+"&searchKey="+state.searchDates.searchKey)
            .then(data => {
                state.userPaginate = data.data;
            })
            .catch(error => {
                console.log(error);
            });
        }
    }
})
