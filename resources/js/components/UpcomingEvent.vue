<template>
<div class="col-md-6">
    <div class="card">
        <div class="card-header with-border">
            <h3 class="card-title">Upcoming events in 30 days</h3> <span><a href="/events" class="pull-right link">View all</a></span>
        </div>
        <div class="card-body">
            <span >
                <div v-if="events !=''">
                    <div class="callout callout-warning" v-for="event in events" :key="event.id">
                        <h5><b><a href="#" class="link text-info">{{createDate(event.event_date)}}</a></b></h5>
                        <p class="font-weight-bold">{{event.title}}.</p>
                    </div>
                </div>
                <div v-else><p class="font-weight-bold text-dark text-center"> NO EVENTS YET</p></div>
            </span>
        </div>
    </div>
</div>
</template>
<script>
import moment from 'moment';
export default{
    data(){
        return{
            events:'',

        };
    },
    created(){
        this.fetch();
    },
    methods:{
        createDate(date){
            return moment(date).format('MMM Do YYYY')
        },

        fetch(){
            axios.get('/upcominget')
                    .then(({data}) => this.events = data)
                    .catch((err) => { console.log(err)})
        }
    }
}
</script>
