<template name="Addfollowup">
    <div>
         <FlashMessage></FlashMessage>
        <h3><i class="fa fa-dashboard"></i> Follow up</h3>
    		<button  class="btn btn-secondary rounded-pill py-2 px-4 m-2"  @click.prevent="showModal()">Add follow</button>
            	<section class="content mt-4">
                    <div class="card">
                    <div class="card-body table-responsive p-0" style="height: 300px;">
                        <table v-if="user.confirmed != 1" class="table table-striped">
                            <tbody class="text-center"> <tr><td> <h3> You've not been confirmed by the Admin yet!</h3> </td></tr></tbody>
                        </table>
                        <table class="table table-head-fixed text-nowrap" v-else>
                        <thead>
                            <tr>
                            <th>Name</th>
                            <th>Responsible</th>
                            <th>Date</th>
                            <th>Notes</th>
                            <th>Action</th>
                            <th>Type</th>
                            <th>Status</th>
                            <th></th>
                            <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for=" follow in follows" :key="follow.id">
                            <td><a :href="'/people/'+follow.people.id"> {{follow.people.first_name}} {{follow.people.last_name}}</a></td>
                            <td><a :href="'/u/'+follow.user.id">{{follow.user.firstName}} {{follow.user.lastName}}</a></td>
                            <td>{{follow.date}}</td>
                            <td>{{follow.note}}</td>
                            <td>{{follow.action.action}}</td>
                            <td>{{follow.type}}</td>
                            <td>
                                <span v-if="follow.status == 1" class="bg-success px-2 py-1 rounded">Done</span>
                                <span v-else class="bg-warning px-2 py-1 rounded">Pending</span>
                                </td>
                            <td v-if="follow.status != 1"><button class="border border-secondary" @click="markdone(follow.id)"> <i class="fa fa-check"></i></button></td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-flat float-right dropdown-toggle mb-2" type="button" id="follow-drop" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="follow-drop">
                                        <button class="dropdown-item" @click.prevent="editModal(follow)">Edit</button>
                                        <button class="dropdown-item text-danger" @click.prevent="destroy(follow.id)">Delete</button>
                                    </div>
                                </div>
                            </td>
                            </tr>
                        </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    </div>
	            </section>
        <div class="modal slide" id="add-followup">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" v-if="!editmode">Add Follow up</h4>
                        <h4 class="modal-title" v-if="editmode">Update Follow up</h4>
                        <button type="button" class="close float-right" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <section class="content">
                            <div class="panel">
                                <div class="panel-body padding">
                                    <form class="form-horizontal" @submit.prevent="editmode ? updateFollow() : addfollow()">
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="people">People<i class="text-danger">*</i></label>
                                        <div class="">
                                        <select name="person_id" class="form-control" v-model="form.person_id">
                                            <option :value="person.id" v-for="person in people" :key="person.id">{{person.first_name}} {{person.last_name}}</option>
                                        </select>
                                        </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="user">Responsible<i class="text-danger">*</i></label>
                                            <div class="">
                                                <select name="user_id" class="form-control" v-model="form.user_id">
                                                <option :value="user.id"  v-for="user in users" :key="user.id" >{{user.firstname}} {{user.lastName}}</option>
                                            </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                                <label class="col-sm-6 control-label" for="date">Follow up Date<i class="text-danger">*</i></label>
                                            <div class="">
                                                <input name="date" id="date" class="form-control mb-3" type="date" required v-model="form.date">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="type">Type</label>
                                        <div class="">
                                            <select name="type" class="form-control" v-model="form.type">
                                            <option value="visit">Visit</option>
                                            <option value="phone">Phone</option>
                                            <option value="message">Message</option>
                                        </select>
                                        </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="from">From <i class="text-danger"></i></label>
                                        <div class="">
                                            <input type="time" name="from" class="form-control" required v-model="form.from">
                                        </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="to">To <i class="text-danger"></i></label>
                                        <div class="">
                                            <input type="time" name="to" class="form-control" required v-model="form.to">
                                        </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="address">Action</label>
                                            <div>
                                                <select name="action_id" id="action" required v-model="form.action_id">
                                                    <option :value="action.id" v-for="action in actons" :key="action.id">{{action.action}}</option>
                                                </select>
                                                <a href="#" @click.prevent="actions" class="btn btn-flat"><i class="fa fa-cog"></i></a>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input name="status" type="checkbox" v-model="form.status">
                                            <label class="control-label" for="status">Done</label>
                                        </div>
                                        <div class="form-group">
                                        <label class="col-sm-2 control-label" for="note">Notes</label>
                                            <div class="">
                                                <textarea name="note" id="" cols="20" rows="5" class="form-control"  v-model="form.note"></textarea>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="form-group" style="padding: 10px;">
                                            <button type="submit" class="btn btn-secondary rounded-pill btn-block" :class="loading ? 'loader' : ''" :disabled="loading" >Add</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal" id="actions">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <span class="modal-title">Add action</span>
                         <button type="button" class="close float-right" @click.prevent="showIt">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <section class="content">
                            <form @click.prevent="SendAction">
                                <div class="form-group">
                                    <input type="text" name="title" class="form-control" id="title" v-model="form.title">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-outline-secondary rounded-pill btn-block" :class="loading ? 'loader' : ''" :disabled="loading"> Save</button>
                                </div>
                            </form>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default{
    props:['people', 'users'],
data(){
        return {
            form: new Form({
               id:'',
               person_id:'',
               user_id:'',
               date:'',
               type:'',
               from:'',
               to:'',
               action_id:'',
               status:'',
               note:'',
               title:''
            }),

            editmode: false,
            follows:'',
            feedback: "",
            loading: false,
            actons:''
        };
    },
    created(){
        this.fetch();
        this.getaction();
    },
    methods: {
        markdone(id){
            this.loading = true;
            axios.post("/markdone/"+ id +"")
            .then(() => {
                this.flashMessage.info({
                    message:'marked as done'
                });
                this.fetch();
            })
            .catch(error => {
                    this.flashMessage.error ({
                       message: "An Unexpected error occured. Please try again."+ error,
                       });
                            });
        },
        SendAction(){
            this.loading = true;
             this.form.post("/action/add")
                .then(() => {
                this.flashMessage.info({
                message: 'Action created successfully!'
                    });

            //close the modal and show the addfollow modal
                this.getaction();
                this.showIt();
                })

                .catch(error => {
                    this.flashMessage.error ({
                       message: "An Unexpected error occured. Please try again."+ error,
                       });
                    this.loading = false;
                });

        },

        getaction(){
            axios.get('/actions').then(({data}) => this.actons = data).catch(error => {
                this.flashMessage.error ({
                       message: "An Unexpected error occured. Please try again."+ error,
                       });
                    this.loading = false;
            })
        },
        actions(){
            this.form.reset()
            $('#add-followup').modal('hide');
            $('#actions').modal('show');
        },
        showIt(){
             $('#actions').modal('hide');
            $('#add-followup').modal('show');

        },
        updateFollow(){
            this.loading = true;
            this.form.patch(`/followup/${this.form.id}/edit`)
            .then(() => {
                this.flashMessage.info({
                title: 'Follow up Info',
                message: 'Record updated successfully!'
                });
                 $('#add-followup').modal('hide');
                this.fetch();
                this.loading = false;
            })
            .catch(error => {
                        this.flashMessage.error({error:"An Internal Error occured, please try again later"});
                         this.loading = false;
                    });
        },

        editModal(data){
            this.editmode = true;
            this.form.reset();
            $('#add-followup').modal('show');
            this.form.fill(data);
            this.editmode = false;
        },
        cancelModal(){

        },
        showModal() {
            this.form.reset();
            $('#add-followup').modal('show');
        },

       addfollow() {
            this.loading = true;
             this.form.post("/followup/add")
                .then(() => {

                $('#add-followup').modal('hide');
                this.fetch();
                this.flashMessage.info({
                title: 'Follow up Info',
                message: 'Record created successfully!'
                    });
                })
                .catch(error => {
                    this.flashMessage.error ({
                       message: "An Unexpected error occured. Please try again."+ error,
                       });
                    this.loading = false;
                });

        },

    fetch() {
            axios.get(this.url()).then(({data}) => this.follows = data.data);
        },

        url() {
            return `/followups`;
        },

         destroy(id){
             if (confirm("Are you sure? delete cannot be undone.")) {
                 axios
                .delete("/followup/" + id);
                this.$emit("destroyed", id);
                    this.flashMessage.info({
                        message: 'Record deleted successfully!'
                    });

               this.fetch();
             }

            },

    }
 }

</script>
