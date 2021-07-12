<template name="Addevent">
    <div>
        <h1><i class="fa fa-dashboard"></i> Events</h1>
    		<button class="btn btn-outline-secondary rounded py-2 px-4 m-3" @click.prevent="showModal">Add Event</button>
            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="callout callout-warning">
                             <table v-if="user.confirmed != 1" class="table table-striped">
                                <tbody class="text-center"> <tr><td> <h3> You've not been confirmed by the Admin yet!</h3> </td></tr></tbody>
                            </table>
                            <table class="table table-bordered" v-else>
                                <tbody>
                                    <tr v-for="event in events" :key="event.id">
                                        <td > <a href="#" class="link"><b>{{event.title}}</b></a> </td>
                                        <td><b>On {{createDate(event.event_date)}}</b><br>  From {{(event.from)}} To {{(event.to)}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        <div class="modal" id="add-event">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                         <h4 class="modal-title">
                            <span v-if="editmode === false"> Add Event</span>
                            <span v-else>Update Event</span>
                        </h4>
                        <button type="button" class="close float-right" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <section class="content">
                    <div class="card">
                        <div class="card-body">
                            <form @submit.prevent="addEvent()" class="p-2">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="">
                                            <label for="title">Title <i class="text-danger">*</i></label>
                                            <input type="text" name="title" class="form-control" placeholder="Title" required v-model="form.title">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="panel panel-body">
                                            <label for="date">Date <i class="text-danger">*</i></label>
                                            <input type="date" name="event_date" class="form-control" required v-model="form.event_date">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="panel panel-body">
                                            <label for="from">From <i class="text-danger">*</i></label>
                                            <input type="time" name="from" class="form-control" required v-model="form.from">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="panel panel-body">
                                            <label for="to">To <i class="text-danger">*</i></label>
                                            <input type="time" name="to" class="form-control" required v-model="form.to">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                       <div class="custom-control custom-switch mt-3">
                                            <input type="checkbox" class="custom-control-input" id="img" @click="showImg()">
                                            <label class="custom-control-label" for="img"> <h5> Image & Description</h5></label>
                                        </div>
                                        <div class="panel panel-body bg-light mt-3" v-show="checkImg">
                                            <label for="image">Image</label>
                                            <input type="file" name="image" class="form-control">
                                            <div class=" mt-2">
                                                <label for="description">Description</label>
                                                <textarea class="form-control" name="description" v-model="form.description"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row col-md-12 mb-4">
                                        <div class="col-md-12">
                                            <label for="attend">Attendance</label>
                                            <select name="attendance" class="form-control p-1" v-model="form.attendance">
                                                <option value="1">Groups</option>
                                                <option value="2">Individuals</option>
                                            </select>
                                        </div>
                                    </div> <!-- End of rowcol-md-12 -->
                                        <div class="col-md-12 mt-2">
                                            <div class="form-group">
                                                <button type="submit" class="rounded-pill btn btn-outline-secondary btn-block">Save</button>
                                            </div>
                                        </div>

                                    </div> <!-- End of ROW -->
			                </form>
                             <sessions></sessions>
                        </div>
                    </div>
                </section>
                </div>
            </div><!--  End of Modal-dialog -->
        </div><!--  End of Modal -->
    </div>
</template>
<script>
 import  moment  from "moment";
export default{

    data(){
        return {
            form: new Form({
                id:'',
                title:'',
                event_date:'',
                from:'',
                to:'',
                event_image:'',
                description:'',
                attendance:'',
                visibility:'',
            }),
            check: false,
            checkImg:false,
            eve:true,
            feedback: "",
            loading: false,
            editmode:false,
            events:'',

        };
    },
    created(){
        this.fetch();
    },
    methods:{
         createDate(date){
            return moment(date).format('MMMM Do YYYY')
        },

        createTime(time){
            return moment(time).format('h m a')
        },
        updateEvent(){
            this.loading = true;
            this.form.patch(`/event/${this.form.id}/edit`)
            .then(() => {
                this.flashMessage.info({
                message: 'Event updated successfully!'
                });
                 $('#add-event').modal('hide');
                this.fetch();
            })
            .catch(error => {
                        this.flashMessage.error({error:"An Internal Error occured, please try again later"});
                    });

        },

        toggleReg(){
            this.check = !this.check;
        },

        showImg(){
            this.checkImg =  !this.checkImg;
        },
        showEve(){
            this.eve = !this.eve;
        },
        editModal(data){
            this.editmode = true;
            this.form.reset();
            $('#add-event').modal('show');
            this.form.fill(data);
        },


        showModal () {
            this.form.reset();
            $('#add-event').modal('show');
        },
       addEvent() {
            this.loading = true;
             this.form.post("/event/add")
                .then(() => {

                $('#add-event').modal('hide');
                this.fetch();
                 this.loading = false;
                this.flashMessage.info({
                title: 'Event Info',
                message: 'Event created successfully!'
                    });
                })
                .catch(error => {
                    this.flashMessage.error ({
                       message: "An Unexpected error occured. Please try again."
                       });
                    this.loading = false;
                });

        },

        fetch() {
                axios.get(this.url()).then(({data}) => this.events = data.data);
             },

        url() {
            return `/event`;
        },

         destroy(id){
             if(confirm("Are you sure you want to delete?, cannot be undone")){
                axios
                  .delete("/event/" + id);
                        this.$emit("destroyed", id);
                            this.flashMessage.success({
                                message: 'Event deleted successfully!'
                            });

                    this.fetch();
             }

        },


    }
}
</script>
