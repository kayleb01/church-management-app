<template name="Addevent">
    <div>
        <h1><i class="fa fa-dashboard"></i> Events</h1>
    		<button href="#" class="btn btn-secondary rounded-pill py-2 px-4 pull-right" @click="$modal.show('Addevent')">Add Event</button>
        <modal  :adaptive="true" height="auto" transition="slide" name="Addevent" scrollable="true" :draggable="true">
             <div class=""><button class="btn btn-flat" @click="$modal.hide('Addevent')"> <i class="fa fa-arrow-left"></i></button></div>
                <section class="content">
                    <div class="box">
                        <div class="box-body">
                            <form accept="" method="" class="col-md-12 p-2">
                                <div class="row bg-light">
                                    <div class="col-md-3">
                                        <div class="">
                                            <label for="title">Title <i class="text-danger">*</i></label>
                                            <input type="text" name="title" class="form-control" placeholder="Title" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="panel panel-body">
                                            <label for="date">Date <i class="text-danger">*</i></label>
                                            <input type="date" name="date" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="panel panel-body">
                                            <label for="from">From <i class="text-danger">*</i></label>
                                            <input type="time" name="from" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="panel panel-body">
                                            <label for="to">To <i class="text-danger">*</i></label>
                                            <input type="time" name="to" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="panel panel-body bg-light mt-3">
                                            <h5>Image & Description</h5><hr>
                                            <label for="image">Image</label>
                                            <input type="file" name="image" class="form-control">
                                        </div>
                                        <div class=" mt-2">
                                            <label for="description">Description</label>
                                            <textarea class="form-control" name="description"></textarea>
                                        </div>	
                                    </div>
                                    <div class="row col-md-12 m-3">
                                        <div class="panel">
                                            <div class="panel-head"><h5> Registration</h5></div><hr>
                                            <div class="panel-body">
                                                <div class=" form-group">
                                                    <label for="ticket">Available Ticket Count</label>
                                                    <input type="number" name="ticket" class="form-control" value="100">
                                                </div>
                                                <div class="form-group">
                                                    <input type="checkbox" name="perfamily">
                                                    <label for="perfamily">Per Family</label>
                                                </div>
                                                <div class="form-group">
                                                    <input class="" type="checkbox" name="Unlimited">
                                                    <label for="unlimited">Unlimited</label>
                                                </div>
                                            </div>
                                            </div>
                                    </div>
                                    <div class="row col-md-12">
                                        <div class="col-md-3">
                                            <label for="attend">Attendance</label>
                                            <select name="attend" class="form-control">
                                                <option value="1">Groups</option>
                                                <option value="2">Individuals</option>
                                                <option value="3">no One</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="visibility">Visibility</label>
                                            <select name="visibility" class="form-control">
                                                <option value="1">Users</option>
                                                <option value="2">Public</option>
                                                <option value="3">Members</option>
                                            </select>
                                        </div>
                                    </div> <!-- End of rowcol-md-12 -->
                                    <hr>
                                    <div class=" col-md-12 m-3">
                                        <h5>Event Repeat</h5><hr>
                                            <div class="col-md-3">
                                                <label for="ticket">Event Repeat</label>
                                                <select class="form-control" name="eventRepeat">
                                                    <option value="1">Weekly</option>
                                                    <option></option>
                                                    <option></option>
                                                </select>
                                            </div>
                                            <h5>Every <i class="text-danger">*</i></h5>
                                            <div class="col-md-3">
                                                <input class="" type="checkbox" name="monday">
                                                <label for="monday">Monday</label>
                                            </div>
                                            <div class="col-md-3">
                                                <input class="" type="checkbox" name="tuesday">
                                                <label for="tuesday">Tuesday</label>
                                            </div>
                                            <div class="col-md-3">
                                                <input class="" type="checkbox" name="wednesday">
                                                <label for="wednesday">Wednesday</label>
                                            </div>
                                            <div class="col-md-3">
                                                <input class="" type="checkbox" name="thursday">
                                                <label for="thursday">Thursday</label>
                                            </div>
                                            <div class="col-md-3">
                                                <input class="" type="checkbox" name="friday">
                                                <label for="friday">Friday</label>
                                            </div>
                                            <div class="col-md-3">
                                                <input class="" type="checkbox" name="saturday">
                                                <label for="saturday">Saturday</label>
                                            </div>
                                            <div class="col-md-3">
                                                <input class="" type="checkbox" name="sunday">
                                                <label for="sunday">Sunday</label>
                                            </div>
                                            <div class="col-md-6 mt-2">
                                                <input class="" type="checkbox" name="end">
                                                <label for="end">The end date of the repeat</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input class="form-control" type="date" name="enddate">
                                            </div>
                                        </div>
                                        <sessions></sessions>
                                    </div> <!-- End of ROW -->
			                </form>        
                        </div>
                    </div>
                </section>
        </modal>
    </div>
</template>
<script>
export default{
    data(){
        return {
            form: {},
            feedback: "",
            loading: false
        };
    },
    methods:{
        show () {
            this.$modal.show('Addevent');
        },
        hide () {
            this.$modal.hide('Addevent');
        },
        Addevent() {
            this.loading = true;

            axios
                .post("/", this.form, {
                    headers:{
                        'Content-Type':'application/json',
                        'Accept':'application/json'
                    }
                })
                .then(({data: { redirect }}) => {
                    location.assign(redirect);
                })
                .catch(error => {
                    this.feedback =
                        "The given credentials are incorrect. Please try again.";
                    this.loading = false;
                });
        },
    }
}
</script>