<template name="Adduser">
    <div>

          <h3><i class="fa fa-dashboard mt-3"></i>User</h3>
          <div class="dropdown">
				<button class="btn btn-outline-secondary rounded dropdown-toggle mb-2" type="button" id="user" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<i class="fa fa-plus"></i>	Add User
				</button>
				<div class="dropdown-menu" aria-labelledby="user">
					 <a href="#" class="dropdown-item" @click.prevent="newModal">Add </a>
				</div>
		</div>


        <!-- <div class="dropdown">
				<button class="btn btn-outline-secondary dropdown-toggle mb-2" type="button" id="bulk" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Bulk Action
				</button>
				<div class="dropdown-menu" aria-labelledby="bulk">
                    <a class="dropdown-item" href="#">Invite User</a>
					<a class="dropdown-item text-danger" href="#">Delete</a>
				</div>
		</div> -->
			<div class="card">
                <FlashMessage></FlashMessage>
              <div class="card-body table-responsive p-0" style="height: 600px;">
                  <table v-if="user.confirmed != 1" class="table table-striped">
                       <tbody class="text-center"> <tr><td> <h3> You've not been confirmed by the Admin yet!</h3> </td></tr></tbody>
                  </table>
                <table class="table table-head-fixed text-nowrap" v-else>
                  <thead>
                    <tr>
						<th><input type="checkbox" name="check" id="check"></th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Mobile Number</th>
                      <th>Role</th>
					  <th>Status</th>
                      <th></th>
					  <th></th>
                    </tr>
                  </thead>
                  <tbody >

                    <tr v-for="user in users" :key="user.id">
						<td> <input type="checkbox" name="mark" id="mark"></td>
                      <td>
						<a :href="'/u/'+ user.id">  <img src="/storage/img/avatar.png" :alt="user.firstname" class="image-circle">{{user.firstname}} {{user.lastName}}</a>
					  </td>
                      <td>{{user.email}}</td>
                      <td>{{user.mobile_number}}</td>
                      <td>
					    <span v-if="user.role == 1">Admin</span>
                         <span v-else-if="user.ministrys.user_id == user.id">Owner</span>
                        <span  v-else-if="user.role == 2 || user.role == 3">Member</span>
					  </td>
					<td>
                          <span v-if="user.confirmed == 1" class="bg-success px-2 py-1 rounded ">Confirmed</span>
                          <span v-else class="bg-warning px-2 py-1 rounded">Pending</span>
                        </td>
					  <td >
                          <span v-if="user.confirmed == 0"> <button class="border border-secondary " @click="markConfirmed(user.id)"> <i class="fa fa-check"></i></button></span>
                      </td>
					  <td>
                           <div class="dropdown">
                                <button class="btn btn-flat float-right dropdown-toggle mb-2" type="button" id="bulk" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                </button>
                                <div class="dropdown-menu" aria-labelledby="bulk">
                                    <button class="dropdown-item" @click="editModal(user)">Edit</button>
                                    <button class="dropdown-item text-danger" @click.prevent="destroy(user.id)">Delete</button>

                                </div>
                           </div>
                         </td>
					</tr>

                  </tbody>

                </table>
              </div>
			</div>

        <div class="modal slide" id="add-user">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">
                            <span v-if="editmode === false "> Add user</span>
                            <span v-else>Update User</span>
                        </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
            <section class="content">
                <div class="box">
                    <div class="box-body">
                        <form class="form-horizontal" @submit.prevent="editmode ? updateUser(user) : Adduser()">
                                <div class="form-group">
                                    <label class="col-sm-6 control-label" for="role">Role</label>
                                    <div class="">
                                    <select name="role" id="role" class="form-control" v-model="form.role" :class="{ 'is-invalid': form.errors.has('role') }">
                                        <option value="2">Admin</option>
                                    </select>
                                    <has-error :form="form" field="role"></has-error>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-6 control-label" for="email">Email</label>
                                    <div class="">
                                        <input name="email" id="email" placeholder="Mail@mail.com" class="form-control mb-3" type="email" required v-model="form.email" :class="{ 'is-invalid': form.errors.has('email') }">
                                    </div>
                                    <has-error :form="form" field="email"></has-error>
                                </div>
                                <div class="form-group">
                                        <label class="col-sm-6 control-label" for="fname">First name</label>
                                        <div class="">
                                        <input name="firstname" id="fname" placeholder="First name" class="form-control mb-3" type="text" required v-model="form.firstname" :class="{ 'is-invalid': form.errors.has('firstname') }">
                                        </div>
                                        <has-error :form="form" field="firstname"></has-error>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-6 control-label" for="lname">Last name</label>
                                        <div class="">
                                            <input name="lastName" id="lname" placeholder="Last name" class="form-control mb-3" type="text" required v-model="form.lastName" :class="{ 'is-invalid': form.errors.has('lastName') }">
                                        </div>
                                        <has-error :form="form" field="lname"></has-error>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-6 control-label" for="tel">Mobile Phone</label>
                                        <div class="">
                                            <input name="mobile_number" id="tel" placeholder="000 000 0000" class="form-control mb-3" type="tel" required v-model="form.mobile_number" :class="{ 'is-invalid': form.errors.has('mobile_number') }">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-6 control-label" for="password">Password</label>
                                        <div class="">
                                            <input  name="password" id="password" placeholder="password" class="form-control" type="password"  v-model="form.password" :class="{ 'is-invalid': form.errors.has('password') }">
                                        </div>
                                        <has-error :form="form" field="password"></has-error>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-6 control-label" for="password">Re-Password</label>
                                        <div class="">
                                            <input  name="password_confirmation" id="password_confirmation" placeholder="Confirm Password" class="form-control" type="password"  v-model="form.password_confirmation" :class="{ 'is-invalid': form.errors.has('password_confirmation') }">
                                        </div>
                                        <has-error :form="form" field="password_confirmation"></has-error>
                                    </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-secondary border border-secondary rounded-pill btn-block" :class="loading ? 'loader' : ''" :disabled="loading" value="Save">
                                </div>
                                <div class="mt-6  p-2" v-if="feedback">
                                    <span class="text-xs text-danger" v-text="feedback"></span>
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

import collection from "../mixins/collection";
export default{
 mixins: [collection],

    data(){
        return {
            editmode: false,
            users: {},
             form: new Form({
                 id: '',
                role: '',
                email:'',
                userEmail:'',
                firstName: '',
                lastName: '',
                mobile_number:'',
                password: '',
                password_confirmation:''
      }),
            feedback: "",
            loading: false,
        };
    },
    created() {
       this.fetch();
    },
    methods: {
        markConfirmed(id){
            axios.post("/markconfirmed/"+ id +"")
            .then(() => {
                this.flashMessage.info({
                    message:'User confirmed'
                });
                this.fetch();
            })
            .catch(error => {
                    this.flashMessage.error ({
                       message: "An Unexpected error occured. Please try again."+ error,
                       });
                            });
        },

        invite(){
            this.form.reset();
            $('#invite').modal('show');
        },

        inviteUser(){
            this.loading = true;
            this.form.post('user/invite')

            .then(({data}) => {
                this.flashMessage.info({
                    message:'Invite sent'
                })

                this.loading = false;
                $('invite').modal('hide');
            })

            .catch((err) => {
                this.flashMessage.error({
                    message:"An error encountered"+error
                })
                this.loading = false;
                $('invite').modal('hide');
            })
        },

        newModal(){
            this.form.reset();
            $('#add-user').modal('show');
        },

        editModal(user){
            this.editmode = true;
            this.form.reset();
            $('#add-user').modal('show');
            this.form.fill(user);
        },

        Adduser() {
            this.loading = true;
            this.form.post("/admin/adduser")
            .then(() => {
                this.flashMessage.info({
                title: 'User',
                message: 'User Added successfully!'
                })
            })
            .catch(error => {
                    this.flashMessage.error({error:"An Internal Error occured, please try again later"});
                    this.loading = false;
                });

            $('#add-user').modal('hide');
             this.fetch();

            this.flashMessage.info({
            title: 'User',
            message: 'User added successfully!'
        });
                this.loading = false;
        },

        updateUser(user){
            this.loading = true;
            this.form.patch(`/admin/${this.form.id}/adduser`)
            .then(() => {
                this.flashMessage.info({
                title: 'User',
                message: 'User updated  successfully!'
                })
            })
            .catch(error => {
                        this.flashMessage.error({error:"An Internal Error occured, please try again later"});
                    });
            $('#add-user').modal('hide');
            this.fetch();
        },

        fetch() {
            axios.get(this.url()).then(({data}) => this.users = data.data);
        },

        url() {
            return "/userdata";
        },
         destroy(id){
             if (confirm("Are you sure? cannot be undone")) {
                 axios
                .delete("/user/" + id);
                this.$emit("destroyed", id);
                    this.flashMessage.info({
                        title: 'User Delete',
                        message: 'User deleted successfully!'
                    });

               this.fetch();
             }

        },
    }
}
</script>
