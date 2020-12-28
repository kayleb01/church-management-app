<template>
  <div>
     <table v-if="user.confirmed != 1" class="table table-striped">
        <tbody class="text-center"> <tr><td> <h3> You've not been confirmed by the Admin yet!</h3> </td></tr></tbody>
      </table>
      <span v-else>
        <FullCalendar :events="events"/>
      </span>
        
  </div>

</template>


<script>
import FullCalendar from 'vue-fullcalendar';

export default{
    components: {
    FullCalendar // make the <FullCalendar> tag available
  },
    data(){
        return{
        events: [],
      };
    },
    created(){
      this.fetch()
    },
    methods:{
      fetch() {
        axios.get(this.url()).then(({data}) => this.events = data);
            },

      url() {
          return `/calendars`;
    } 
    
  }
} 

</script>
