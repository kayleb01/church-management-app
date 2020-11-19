<template name="Addevent">
    <div>
        <h1><i class="fa fa-dashboard"></i> Events</h1>
    		<button class="btn btn-secondary rounded-pill py-2 px-4 m-3" @click.prevent="showModal">Add Event</button>
            <section class="content">
                <div class="card">
              <div class="card-header">
                <h3 class="card-title">Events</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-sm">
                  <tbody>
                    <tr>
                      <td>1.</td>
                      <td>Update software</td>
                      <td>
                        <div class="progress progress-xs">
                          <div class="progress-bar progress-bar-danger" style="width: 65%"></div>
                        </div>
                      </td>
                      <td><span class="badge bg-danger">55%</span></td>
                    </tr>
                   
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>


            </section>
            
        <div class="modal" id="add-event">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                         <h4 class="modal-title">
                            <span v-if="editmode === false "> Add Event</span>
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
                                        	<div class="panel">
                                            <div class="panel-head">
                                                
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input" id="reg" @click="toggleReg()" >
                                                        <label class="custom-control-label" for="reg">Registration</label>
                                                    </div>
                                               
                                            </div><hr>
                                            <div class="panel-body" v-show="check">
                                                <div class=" form-group">
                                                    <label for="ticket">Available Ticket Count</label>
                                                    <input type="number" name="ticket" class="form-control" value="100" v-model="form.ticket">
                                                </div>
                                                <div class="form-group">
                                                    <input type="checkbox" name="perfamily" v-model="form.perfamily">
                                                    <label for="perfamily">Per Family</label>
                                                </div>
                                                <div class="form-group">
                                                    <input class="" type="checkbox" name="unlimited" v-model="form.unlimited">
                                                    <label for="unlimited">Unlimited</label>
                                                </div>
                                            </div>
                                        </div>
                                            <div class="form-group">
                                                <label for="calendar">Calendar <i class="text-danger">*</i></label>
                                                <select name="calendar" id="calendar" class="form-control" v-model="form.calendar">
                                                    <option value="meeting">Meeting</option>
                                                </select>
                                            </div>
                                    </div>
                                    <div class="row col-md-12">
                                        <div class="col-md-3">
                                            <label for="attend">Attendance</label>
                                            <select name="attendance" class="form-control p-1" v-model="form.attendance">
                                                <option value="1">Groups</option>
                                                <option value="2">Individuals</option>
                                                <option value="3">No One</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="visibility">Visibility</label>
                                            <select name="visibility" class="form-control" v-model="form.visibility">
                                                <option value="1">Users</option>
                                                <option value="2">Public</option>
                                                <option value="3">Members</option>
                                            </select>
                                        </div>
                                    </div> <!-- End of rowcol-md-12 -->
                                    <hr>
                                    <div class=" col-md-12 m-3">
                                            <div class="custom-control custom-switch mt-3">
                                                <input type="checkbox" class="custom-control-input" id="eve" @click="showEve()">
                                                <label class="custom-control-label" for="eve"> <h5> Event Repeat</h5></label>
                                            </div>
                                            <span v-show="eve">
                                            <div class="col-md-6 mb-2">
                                                <select class="form-control" name="repeat" v-model="form.repeat">
                                                    <option value="1">Daily</option>
                                                    <option value="2">Weekly</option>
                                                </select>
                                            </div>
                                            <h5>Every <i class="text-danger">*</i></h5>
                                            <div class="col-md-3">
                                                <input class="" type="checkbox" name="monday" v-model="form.monday">
                                                <label for="monday">Monday</label>
                                            </div>
                                            <div class="col-md-3">
                                                <input class="" type="checkbox" name="tuesday" v-model="form.tuesday">
                                                <label for="tuesday">Tuesday</label>
                                            </div>
                                            <div class="col-md-5">
                                                <input class="" type="checkbox" name="wednesday" v-model="form.wednesday">
                                                <label for="wednesday">Wednesday</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input class="" type="checkbox" name="thursday" v-model="form.thursday">
                                                <label for="thursday">Thursday</label>
                                            </div>
                                            <div class="col-md-3">
                                                <input class="" type="checkbox" name="friday" v-model="form.friday">
                                                <label for="friday">Friday</label>
                                            </div>
                                            <div class="col-md-3">
                                                <input class="" type="checkbox" name="saturday" v-model="form.saturday">
                                                <label for="saturday">Saturday</label>
                                            </div>
                                            <div class="col-md-3">
                                                <input class="" type="checkbox" name="sunday" v-model="form.sunday">
                                                <label for="sunday">Sunday</label>
                                            </div>
                                            <div class="col-md-6 mt-2">
                                                <input class="" type="checkbox" name="end">
                                                <label for="end">The end date of the repeat</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input class="form-control" type="date" name="end_date" v-model="form.end_date">
                                            </div>
                                            </span>
                                        </div>
                                        <div class="col-md-12">
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
export default{
    data(){
        return {
            form: new Form({
                title:'',
                event_date:'',
                from:'',
                to:'',
                event_image:'',
                description:'',
                tickets:'',
                perfamily:'',
                unlimited:'',
                attendance:'',
                visibility:'',
                eventrepeat:'',
                monday:'',
                tuestday:'',
                wednesday:'',
                thursday:'',
                friday:'',
                saturday:'',
                sunday:'',
                end:'',
                enddate:'',
            }),
            check: false,
            checkImg:false,
            eve:true,
            feedback: "",
            loading: false,
            editmode:false
        };
    },
    methods:{
        updateEvent(){
            this.loading = true;
            this.form.patch(`/event/${this.form.id}/edit`)
            .then(() => {
                this.flashMessage.info({
                title: 'Event Info',
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
                axios.get(this.url()).then(({data}) => this.peoples = data.data);
             },

        url() {
            return `/events`;
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