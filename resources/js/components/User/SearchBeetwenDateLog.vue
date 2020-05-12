<template>    
<!-- Search form -->
<functional-calendar :is-separately='true' :is-date-range='true':is-multiple='true' :calendars-count='2' @input="dates"></functional-calendar>
</template>

<script>
// Introduced in vue file
import { FunctionalCalendar } from 'vue-functional-calendar'
export default {
    components: {
        FunctionalCalendar
    },
    data() {
        return {
            calendarData: {}
        }
    },
    methods:{
        dates(dates){
            if(dates.dateRange.end.date) {
                this.$store.commit("SET_SEARCH_KEY", JSON.stringify(dates.dateRange));
                this.$store.commit("SET_UPDATE_PAGINATE");
            }
        }
    }
}
</script>

