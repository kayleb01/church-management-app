<template name="Userprofile">
    <div>
        <div class="col-md-12 col-sm-12 mb-5"  >
        <section class="content-header">
			<FlashMessage></FlashMessage>
    		<div class="col-12 col-sm-12 col-md-12">
            <div class="card card-tabs">
              <div class="card-header p-0 pt-1 border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-three-events-tab" data-toggle="pill" href="#details" role="tab" aria-controls="details" aria-selected="true"> <i class="fa fa-user"> Details</i></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-three-events-tab" data-toggle="pill" href="#custom-tabs-three-events" role="tab" aria-controls="custom-tabs-three-events" aria-selected="false"><i class="fa fa-calendar-check-o"></i> Events</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-three-notes-tab" data-toggle="pill" href="#custom-tabs-three-notes" role="tab" aria-controls="custom-tabs-three-notes" aria-selected="false"  @click="fetch(person.id)"><i class="fa fa-file"></i> Notes</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link " id="custom-tabs-three-settings-tab" data-toggle="pill" href="#custom-tabs-three-settings" role="tab" aria-controls="custom-tabs-three-settings" aria-selected="false"><i class="fa fa-address-card"></i> Forms</a>
                  </li>
				   <li class="nav-item">
                    <a class="nav-link " id="custom-tabs-three-settings-tab" data-toggle="pill" href="#custom-tabs-three-settings" role="tab" aria-controls="custom-tabs-three-settings" aria-selected="false"><i class="fa fa-money"></i> Giving</a>
                  </li>
				   <li class="nav-item">
                    <a class="nav-link " id="custom-tabs-three-followup-tab" data-toggle="pill" href="#custom-tabs-three-followup" role="tab" aria-controls="custom-tabs-three-followup" aria-selected="false"><i class="fa fa-handshake-o"></i> Follow Up</a>
                  </li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-three-tabContent">
                  <div class="tab-pane fade active show" id="details" role="tabpanel" aria-labelledby="details">
                    <div class="row no-gutter">
                <div class="col-md-6">
					<div class="d-flex justify-content-center">
						<img src="/storage/face-1.jpg'" alt="User Image" class="image-user">
					</div>
					<div class="d-flex justify-content-center mt-2">
						<button class="btn btn-default rounded-circle m-1" id="btn-bell"><i class="fa fa-bell"></i></button>
						<button class="btn btn-default rounded-circle m-1" id="btn-bell"><i class="fa fa-qrcode"></i></button>
					</div>
					<div class="card p-0">
						<div class="card-body p-2">
							<table class="table table-borderless text-center">
								<tr>
									<td><b>Birthday</b><br>
										<span>{{person.date_of_birth}}</span>
									</td>
									<td><b>Gender</b> <br>
									<span v-if="person.gender === 1">Male</span>
									<span v-else-if="person.gender === 2">Female</span>
									<span v-else> Unknown</span>
									</td>
								</tr>
							</table>
						</div>
					</div>
					<div class="card p-0 mt-4">
					<div class="card-body ">
						<table class="table table-borderless  text-center">
							<tr>
								<td><b>School</b><br>
									<span>{{person.school}} </span>
								</td>
								<td><b>Grade</b> <br>
								<span>{{person.grade}}</span></td>
							</tr>
						</table>
					</div>
					</div>
					<div class="card mt-2">
                        <div class="card-body">
                            <table class="table table-borderless text-center">
                                <tr>
                                    <td>
                                        <b>Ministry</b><br>
                                        <span>{{person.ministri.name}}</span>
                                    </td>
                                </tr>
                            </table>
                        </div>
					</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-8">
						<div class="card p-0 mt-4">
						<div class="card-body p-2">
							<table class="table table-borderless">
								<tr>
									<td>
										<b>Mobile Phone</b><br>
										<span>{{person.mobile_number}}</span>
									</td>
									<!-- <td>
										<b>Home Phone</b>
										<br>
										<span>____</span>
									</td> -->

								</tr>
								<tr>
									<td>
										<b>Email</b> <br>
										<span>{{person.email}}</span>
									</td>
									<td>
										<b>Facebook</b> <br>
										<span>{{person.facebook}}</span>
									</td>
								</tr>
							</table>
						</div>
					</div>
						<div class="card mt-2">
							<div class="card-body">
								<table class="table table-borderless">
									<tr>
										<td>
											<b>Groups</b><br><br>
											<span style="background-color:#ccc" class="rounded-pill px-2 py-1 mt-3" v-if="!person.group">Not in group</span>
											<span style="background-color:#ccc" class="rounded-pill px-2 py-1 mt-3" v-else>{{person.group.name}}</span>
										</td>
									</tr>
								</table>
							</div>
						</div>
						<div class="card mt-2">
							<div class="card-body">
								<table class="table table-borderless">
									<tr>
										<td>
											<b>Job Title</b><br>
											<span v-if="person.job_title">{{person.job_title}}</span>
										</td>
										<td>
											<b>Employer</b><br>
										<span>{{person.employer}}</span>
										</td>
										<td>
											<b>Talents and Hobbies</b><br>
											<span>{{person.talent}}</span>
										</td>
									</tr>
								</table>
							</div>
						</div>
						<div class="card mt-2">
							<div class="card-body">
								<table class="table table-borderless text-center">
									<tr>
										<td>
											<b>Marital Status</b><br>
											<span>{{person.marital_status}}</span>
										</td>
									</tr>
								</table>
							</div>
						</div>
						<div class="card mt-2">
							<div class="card-body">
								<table class="table table-borderless text-center">
									<tr>
										<td>
											<b>Join Date</b><br>
											<span>{{humanTime(person.created_at)}}</span>
										</td>
									</tr>
								</table>
							</div>
						</div>
				</div>
            </div>
                  </div>
                  <div class="tab-pane slide" id="custom-tabs-three-events" role="tabpanel" aria-labelledby="custom-tabs-three-profile-tab">
                    <div class="col-12">
            <div class="card">
              <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap">
                  <tbody>
                    <tr>
                      <td>
						  <span class="font-weight-bold">
							  11/12/2020
						  </span>
						  <p>
							  Elementary
						  </p>
						  <p>Ministry</p>
					  </td>
                      <td>John Doe</td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-three-events" role="tabpanel" aria-labelledby="custom-tabs-three-events-tab">
                   'ministri'</div>
                  <div class="tab-pane fade " id="custom-tabs-three-notes" role="tabpanel" aria-labelledby="custom-tabs-three-notes-tab">
                     <div class="card">
						 <div class="card-header"><h1 class="card-title">Note </h1> </div>
						 <div class="card-body">
							<button type="button" class="btn btn-outline-secondary py-1 px-2 rounded" @click="showNotes"><i class="fa fa-plus"></i> Add Notes</button>
							<table class="table table-sm mt-2">
								<tbody v-if="notes != '' ">
									<tr  v-for="note in notes" :key="note.id">
										<td>
											<div class="dropdown">
												<button class="btn btn-flat float-right dropdown-toggle mb-2" type="button" id="bulk" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												</button>
												<div class="dropdown-menu" aria-labelledby="bulk">
													<button class="dropdown-item" @click="editModal(note)">Edit</button>
													<button class="dropdown-item text-danger" @click.prevent="destroy(note.id)">Delete</button>

												</div>
											</div>
											<span class="text-muted">Created by <a href="#">{{note.user.firstname}} {{note.user.lastName}}</a> {{humanTime(note.created_at)	}}</span><br>
											<span>{{note.note}}</span><br>
											<small class="text-muted">{{note.user.ministry}}</small>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					 </div>
                  </div>
				  <div class="tab-pane fade " id="custom-tabs-three-settings" role="tabpanel" aria-labelledby="custom-tabs-three-settings-tab">

                  </div>
				  <div class="tab-pane fade " id="custom-tabs-three-followup" role="tabpanel" aria-labelledby="custom-tabs-three-followup-tab">
                    <div class="card">
						 <div class="card-header"><h1 class="card-title">Followup</h1> </div>
						 <div class="card-body">
							<button type="button" class="btn btn-outline-secondary py-1 px-2 rounded" @click="showfollow"><i class="fa fa-plus"></i> Add Followup</button>
							<table class="table table-sm mt-2">
								<tbody v-if="follow != '' ">
									<tr  v-for="followup in follow" :key="followup.id">
										<td>
											<div class="dropdown">
												<button class="btn btn-flat float-right dropdown-toggle mb-2" type="button" id="bulk" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												</button>
												<div class="dropdown-menu" aria-labelledby="bulk">
													<button class="dropdown-item" @click="editModal(followup)">Edit</button>
													<button class="dropdown-item text-danger" @click.prevent="destroy(followup.id)">Delete</button>
												</div>
											</div>
											<span class="font-weight-bold">{{followup.date}}</span><br>
											<span v-if="followup.note"></span><br>
											<span class="link"><a :href="'/u/'+followup.user.id">{{followup.user.firstname}} {{followup.user.lastName}}</a> </span><br>
											<span v-if="followup.status == 1">Done</span>
                          					<span v-else >Pending</span>
											  <br>
											  <span>{{followup.ministry}}</span>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					 </div>
                  </div>
                </div>
              </div>
              <!-- /.card -->
            </div>
          </div>
  		</section>
  	</div>
	  <div class="modal" id="add-note">
		  <div class="modal-dialog">
			  <div class="modal-content">
				  <div class="modal-header">
					  <h4 class="fint-weight-bold">
						  <span v-if="editmode === false "> Add Note</span>
                            <span v-else>Update Note</span>
					  </h4>
						<button type="button" class="close float-right" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
				  </div>
				    <div class="card">
						<div class="card-body">
							<form @submit.prevent="editmode ? updatenote(person.id) : addNote(person.id) ">
								<div class="form-group">
									<input type="hidden" name="note_peep_id">
									<textarea name="note" id="note" cols="20" rows="10" class="form-control" required v-model="form.note"></textarea>
								</div>
								<div class="form-group">
									<button type="submit" class="btn btn-outline-secondary btn-block rounded-pill" :class="loading ? 'loader' : ''" :disabled="loading">Save</button>
								</div>
							</form>
						</div>
					</div>

			  </div>
		  </div>
	  </div>
	   <div class="modal" id="actions">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <span class="modal-title">Add action</span>
                         <button type="button" class="close float-right" @click.prevent="showNot">
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
  		<div class="modal slide" id="add-follow">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Follow up</h4>
                            <button type="button" class="close float-right" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <section class="content">
                            <div class="panel">
                                <div class="panel-body padding">
                                    <form class="form-horizontal" @submit.prevent="addfollow()">
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="people">People<i class="text-danger">*</i></label>
                                        <div class="">

                                        <select name="person_id" class="form-control" v-model="form.person_id">
                                            <option  v-for="persons in peoples" :key="persons.id" :value="persons.id">{{persons.first_name}} {{persons.last_name}}</option>
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
                                                <a href="#" @click.prevent="showIt" class="btn btn-flat"><i class="fa fa-cog"></i></a>
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
    </div>
</template>
<script>
export default{
	props: [ 'person', 'follow'],

    data() {
		return{
			form: new Form({
				id:'',
				note_peep_id:'',
				note:'',
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
			notes:'',
			loading:false,
			editmode:false,
			actons:'',
            peoples:'',
            users:''
		};

			},
			created(){
				this.getaction();
			},
        mounted(){
            this.fetchPeople();
            this.getUsers();
        },

    methods:{
		 updatenote(user){
			 this.form.user_id = user;
            this.loading = true;
            this.form.patch(`/note/${this.form.id}/peep`)
            .then(() => {
                this.flashMessage.info({
                title: 'Note Info',
                message: 'Note updated successfully!'
                });
                 $('#add-note').modal('hide');
				this.fetch(this.form.id);
				this.loading = false;
            })
            .catch(error => {
                        this.flashMessage.error({error:"An Internal Error occured, please try again later"});
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
        getUsers(){
            axios.get('/api/users').then(({data}) => this.users = data).catch(error => {
                this.flashMessage.error ({
                       message: "An Unexpected error occured. Please try again."+ error,
                       });
                    this.loading = false;
            })
        },

		editModal(note){
			this.form.reset()
			this.editmode = true
			$('#add-note').modal('show')
			this.form.fill(note)
		},
			addNote(id) {
			this.form.note_peep_id = id;
            this.loading = true;
            this.form.post("/note/peep")
                .then(() => {

				$('#add-note').modal('hide');
				this.fetch(id);
                this.flashMessage.info({
                title: 'Note Info',
                message: 'Note created successfully!'
					});

					this.loading = false;
				})

                .catch(error => {
                    this.flashMessage.error ({
                       message: "An Unexpected error occured. Please try again."
                       });
                    this.loading = false;
                });

        },

			showNotes(){
				$('#add-note').modal('show');
				this.form.reset();
			},
			showfollow(){
				$('#add-follow').modal('show');
				this.form.reset();
			},
         fetch(id) {
				axios.get(this.url(id))
				.then(({data}) => {
					this.notes = data})
					.catch(error => console.log(errror.message));
             },

        url(id) {
            return "/peep/notes/" + id +"";
		},

		destroy(id){
			if(confirm('Are you sure, this cannot be undone'))
           { axios
                .delete("/peep/note/" + id);
                this.$emit("destroyed", id);
                    this.flashMessage.success({
                        message: 'Note deleted successfully!'
                    });

			   this.fetch();
			   }
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
               $('#actions').modal('hide');
			$('#add-follow').modal('show');
			this.loading = false;
                })

                .catch(error => {
                    this.flashMessage.error ({
                       message: "An Unexpected error occured. Please try again."+ error,
                       });
                    this.loading = false;
                });

		},
		 showIt(){
			  $('#add-follow').modal('hide');
             $('#actions').modal('show');
		},
		 showNot(){
			  $('#add-follow').modal('show');
             $('#actions').modal('hide');
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
				this.loading = false;
                })
                .catch(error => {
                    this.flashMessage.error ({
                       message: "An Unexpected error occured. Please try again."+ error,
                       });
                    this.loading = false;
                });

        },
        fetchPeople(){
            let vm = this;
            let page_url = '/peoples';
            fetch(page_url)
            .then(res => res.json())
            .then(res => {
                this.peoples = res.data
                vm.makePagination(res);
            })
            .catch((err) => console.log(err));
        },
    }

}
</script>
