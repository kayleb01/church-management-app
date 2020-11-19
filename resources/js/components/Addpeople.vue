<template name="Addpeople">
    <div><h3><i class="fa fa-dashboard mt-3"></i>People</h3>
    <button class="btn btn-secondary rounded-pill py-2 px-4 mb-3 " @click.prevent="showModal">Add <i class="fa fa-plus"></i></button>
    
        <section >		
            <FlashMessage></FlashMessage>
			<div class="card">
              <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th><input type="checkbox" name="" id=""></th>
                      <th>Name</th>
                      <th>Mobile</th>
                      <th>Email</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody v-if="peoples != ''">
                    <tr v-for="people in peoples" :key="people.id" >
                      <td>
						  <form action="">
							  <input type="checkbox" name="" id="">
						  </form>
					  </td>
                      <td><a :href="'people/'+people.id">{{people.first_name}} {{people.last_name}}</a>  </td>
                      <td>{{people.mobile_number}} </td>
                        <td>{{people.email}}</td>
                      <td>
					<button class="btn btn-flat" @click.prevent="editModal(people)"> <i class="fa fa-edit"></i></button> | <button class="btn btn-flat" @click.prevent="destroy(people.id)"><i class="fa fa-trash"></i></button>
						</ul>
						
					  </td>
                    </tr>
                    <paginator :dataSet="dataSet"  @changed="fetch"></paginator>

                  </tbody>
                  <tbody v-else><tr><td><h3>NO DATA</h3></td></tr></tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
		</section>
        <div class="modal fade" id="add-people">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="modal-title">Add People</div>
                            <button type="button" class="close float-right" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        
                    </div>
                <div class="modal-body">
                    <section class="content">
                        <div class="box">
                            <div class="box-body padding">
                            <form class="form-horizontal" @submit.prevent="editmode ? updatePeople() : addPeople()" enctype="multipart/form-data">
                                <input name="_method" value="PUT" type="hidden">
                                <div class="form-group">
                                    <label class="col-sm-6 control-label" for="fname">First name</label>
                                    <div class="">
                                    <input name="first_name" id="first_name" placeholder="First name" class="form-control mb-3" type="text"  v-model="form.first_name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-6 control-label" for="lname">Last name</label>
                                    <div class="">
                                        <input name="last_name" id="last_name" placeholder="Last name" class="form-control mb-3" type="text"  v-model="form.last_name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-6 control-label" for="mname">Middle name</label>
                                    <div class="">
                                        <input name="middle_name" id="middle_name" placeholder="Middle name" class="form-control mb-3" type="text"  v-model="form.middle_name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-6 control-label" for="email">Email</label>
                                    <div class="">
                                        <input  name="email" id="email" placeholder="Enter email address" class="form-control" type="email" v-model="form.email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-6 control-label" for="note_on_user">Date of Birth</label>
                                    <div class="">
                                        <input type="date" name="date_of_birth" class="form-control" v-model="form.date_of_birth">
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label class="col-sm-6 control-label" for="address">Address Line</label>
                                    <div class="">
                                        <input name="address" id="address" placeholder="Your Location" class="form-control mb-2" type="text" v-model="form.address">
                                    </div>
                                    <label class="col-sm-6 control-label" for="state">State </label>
                                    <div class="">
                                        <input name="state" type="text" id="state" class="form-control mb-2" v-model="form.state">
                                    </div>
                                    <label class="col-sm-2 control-label" for="city">City</label>
                                    <div class="">
                                        <input name="city" id="city" placeholder="City" class="form-control mb-2" type="text" v-model="form.city">
                                    </div>
                                        <label class="col-sm-6 control-label" for="zipcode">Zip Code</label>
                                    <div class="">
                                        <input type="number" name="zipcode" id="zipcode" class="form-control " placeholder="Zip Code" v-model="form.zipcode">
                                    </div>
                                </div>
                                <hr>
                                <div class="form-check form-group">
                                    <label class="m-3"> Gender</label>
                                    <input type="radio" name="gender" id="sex" value="1" v-model="form.gender">
                                    <label class="col-sm-2 control-label" for="sex">Male</label>
                                    <input type="radio" name="gender" id="sex1" value="2" v-model="form.gender">
                                    <label class="col-sm-2 control-label" for="sex1">Female</label>
                                </div>
                                <hr>
                                <div class="form-group">
                                        <label class="col-sm-6 control-label" for="phonenum">Mobile Phone</label>
                                    <div class="">
                                        <input name="mobile_number" type="tel" class="form-control" maxlength="15" placeholder="080 234 5678" v-model="form.mobile_number">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="facebook">Facebook</label>
                                    <div class="">
                                        <input name="facebook" type="url" class="form-control"  placeholder="Facebook Profile" v-model="form.facebook">
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label for="group">Groups</label>
                                    <div class="">
                                      <select name="group_id" id="group_id" class="select2" multiple='multiple' data-placeholder="Select a Group">
                                            <option>Alabama</option>
                                            <option>Alaska</option>
                                            <option>California</option>
                                            <option>Delaware</option>
                                            <option>Tennessee</option>
                                            <option>Texas</option>
                                            <option>Washington</option>
                                      </select>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group mb-3">
                                    <label class="col-sm-6 control-label" for="jt">Job Title</label>
                                    <div class="">
                                        <input type="text" name="job_title" class="form-control" placeholder="Job Title"  v-model="form.job_title">
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="col-sm-6 control-label" for="employer">Employer</label>
                                    <div class="">
                                        <input type="text" name="employer" class="form-control" placeholder="Employer"  v-model="form.employer">
                                    </div>
                                </div>
                                <div class="form-group mb-2">
                                    <label class="col-sm-10 control-label" for="pass">Talents and Hobbies</label>
                                    <div class="">
                                        <input type="text" name="talent" class="form-control" placeholder="Talent and Hobbies"  v-model="form.talent">
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label for="school">School</label>
                                    <input type="text" name="school" id="school" class="form-control" placeholder="School" v-model="form.school">
                                </div>
                                <div class="form-group">
                                    <label for="school">Grade</label>
                                    <select name="grade" id="grade" class="form-control" v-model="form.grade">
                                        <option value="Pre-Kindergaten">Pre-Kindergaten</option>
                                        <option value="Kindergaten">Kindergaten</option>
                                        <option value="1st">1st</option>
                                        <option value="2nd">2nd</option>
                                        <option value="3rd">3rd</option>
                                        <option value="4th">4th</option>
                                        <option value="5th">5th</option>
                                        <option value="6th">6th</option>
                                        <option value="7th">7th</option>
                                        <option value="8th">8th</option>
                                        <option value="9th">9th</option>
                                        <option value="10th">10th</option>
                                        <option value="11th">11th</option>
                                        <option value="12th">12th</option>
                                        <option value="Graduated">Graduated</option>
                                    </select>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label class="col-sm-10 control-label" for="Mstatus">Marital Status</label>
                                    <div class="">
                                        <select name="marital_status" id="Mstatus" class="form-control" v-model="form.marital_status">
                                            <option value="">Unknown</option>
                                            <option value="Single">Single</option>
                                            <option value="Married">Married</option>
                                            <option value="Widowed">Widowed</option>
                                            <option value="Engaged">Engaged</option>
                                            <option value="Divorced">Divorced</option>
                                        </select>
                                    </div>  
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label class="col-sm-10 control-label" for="joindate">Join Date</label>
                                    <input type="date" name="join_date" class="form-control" v-model="form.join_date">
                                </div>                   
                                <div class="clearfix"></div>
                                <div class="form-group" style="padding: 10px;">
                                    <button type="submit" class="btn btn-secondary rounded-pill btn-block">Add</button>
                                </div>
                                </form>
                    
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div> <!-- </ modal class> -->
        </div>
 </div>
  
</template>
<script>
import Select2MultipleControl from 'v-select2-multiple-component';

export default{
    components: {Select2MultipleControl},
    props:['groups'],
    data(){
        return {
            form: new Form({
                first_name:'',
                last_name:'',
                middle_name:'',
                email:'',
                date_of_birth:'',
                address:'',
                state:'',
                city:'',
                zipcode:'',
                gender:'',
                mobile_number:'',
                facebook:'',
                group_id: [],
                job_title:'',
                employer:'',
                talent:'',
                school:'',
                grade:'',
                marital_status:'',
                join_date:''

            }),
            editmode: false,
            peoples:'',
            feedback: "",
            dataSet:'',
            loading: false
        };
    },
    created(){
        this.fetch();
    }, 
    methods: {
        updatePeople(){
            this.loading = true;
            this.form.patch(`/people/${this.form.id}/edit`)
            .then(() => {
                this.flashMessage.info({
                title: 'People Info',
                message: 'Person updated successfully!'
                });

                 $('#add-people').modal('hide');
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
            $('#add-people').modal('show');
            this.form.fill(data);
        },


        showModal () {
            this.form.reset();
            $('#add-people').modal('show');
        },

       addPeople() {
           //start the spinner and disable the button
            this.loading = true;
             this.form.post("/people/add")
                .then(() => {
                    //if successful, hide the modal and fetch the new data
                $('#add-people').modal('hide');
                this.fetch();

                this.flashMessage.info({
                message: 'Person created successfully!'
                    });
                    this.loading = false;

                })

                .catch(error => {
                    this.flashMessage.error ({
                       message: "An Unexpected error occured. Please try again."
                       });
                    $('#add-people').modal('hide');
                    this.loading = false;
                });
             
        },
    fetch() {
            axios.get(this.url()).then(({data}) => {this.peoples = data.data; this.dataSet = data;});
        },

        url() {
            return `/peoples`;
        },
         destroy(id){
              if (confirm("Are you sure? cannot be undone")) {
            axios
                .delete("/people/" + id);
                this.$emit("destroyed", id); 
                    this.flashMessage.info({
                        message: 'Person deleted successfully!'
                    });
              
               this.fetch();
              }
        },

    }
}

</script>