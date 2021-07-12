<template name="Addpeople">
    <div><h3><i class="fa fa-dashboard mt-3"></i>People</h3>
    <button class="btn btn-outline-secondary rounded py-2 px-4 mb-3 " @click.prevent="showModal">Add <i class="fa fa-plus"></i></button>

        <section >
            <FlashMessage></FlashMessage>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">List of people</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                   <table v-if="user.confirmed != 1" class="table table-striped">
                       <tbody class="text-center"> <tr><td> <h3> You've not been confirmed by the Admin yet!</h3> </td></tr></tbody>
                  </table>
                <!-- <div id="" class="dataTables_wrapper dt-bootstrap4"> -->
                    <!-- <div class="row" > -->
                        <!-- <div class="col-sm-12"> -->
                <table class="table" v-else>
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Mobile Number</th>
                      <th>email</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody v-if="peoples != ''">
                    <tr v-for="people in peoples" :key="people.id">
                        <td>
                            <a :href="'people/'+people.id">{{people.first_name}} {{people.last_name}}</a>
                        </td>
                        <td>
                          {{people.mobile_number}}
                        </td>
                        <td>
                            {{people.email}}
                        </td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-flat float-right dropdown-toggle mb-2" type="button" id="bulk" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                </button>
                            <div class="dropdown-menu" aria-labelledby="bulk">
                                <button class="dropdown-item" @click="editModal(people)">Edit</button>
                                <button class="dropdown-item text-danger" @click.prevent="destroy(people.id)">Delete</button>
                            </div>
                            </div>
                        </td>
                    </tr>
                  </tbody>
                  <tbody v-else>
                        <tr>
                          <td class="text-center font-weight-bold">
                              <h3>NO DATA</h3>
                        </td>
                        </tr>
                    </tbody>
                </table>

                <div class="card-footer clearfix">
                    <nav v-if="peoples !=''">
                        <ul class="pagination">
                            <li :class="[{disabled: !pagination.prev_page}]" class="page-item">
                                <a href="#" class="page-link" @click="fetchPeople(pagination.prev_page)">&laquo;Previous</a>
                            </li>
                            <li class="page-item disabled">
                                <a href="#" class="page-link text-dark">Page {{pagination.current_page}} of {{pagination.last_page}}</a>
                            </li>
                                <li :class="[{disabled: !pagination.next_page}]" class="page-item">
                                <a href="#" class="page-link" @click="fetchPeople(pagination.next_page)">Next&raquo;</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div> <!-- </End of the card body> -->
        </div><!-- </End of the card div> -->
		</section>
        <div class="modal fade" id="add-people">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="modal-title">
                            <span v-if="editmode == false">Add Person</span>
                            <span v-if="editmode ===true"> Update Person</span>
                            </div>
                            <button type="button" class="close float-right" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                <div class="modal-body">
                    <section class="content">
                        <div class="box">
                            <div class="box-body padding">
                            <form class="form-horizontal" @submit.prevent="editmode ? updatePeople() : addPeople()" enctype="multipart/form-data">
                               <div class="form-group align-center">
                                   <div class="border border-secondary rounded px-2 py-1" style="position:relative; display:inline-block" v-show="!image">
                                        <i class="fa fa-photo"></i> <b>Image</b>
                                        <input type="file" @change="onFileChange" style="opacity:0; left:0; top:0; position:absolute;">
                                   </div>
                                   <div v-if="image" class="justify-content-center">
                                       <center>
                                        <button  @click.prevent="removeImage" class="bg-dark text-white opacity-30 rounded-pill btn btn-flat" style="margin:-50px; z-index:8; position:relative">remove</button>
                                            <img :src="image" class="image-user img-responsive ">
                                       </center>

                                   </div>

                               </div>
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
                                <!-- <div class="form-group">
                                    <label class="col-sm-2 control-label" for="facebook">Facebook</label>
                                    <div class="">
                                        <input name="facebook" type="url" class="form-control"  placeholder="Facebook Profile" v-model="form.facebook">
                                    </div>
                                </div> -->
                                <hr>
                                <div class="form-group">
                                    <label for="group">Groups</label>
                                    <div class="">
                                      <select name="group_id" class="form-control" data-placeholder="Select a Group" v-model="form.group_id">
                                            <option :value="group.id" v-for="group in groups" :key="group.id">{{ group.name }}</option>
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
export default{
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
                gender:'',
                mobile_number:'',
                group_id:'',
                job_title:'',
                employer:'',
                talent:'',
                school:'',
                grade:'',
                marital_status:'',
                join_date:'',
                file:''
            }),
            image:'',
            editmode: false,
            peoples:'',
            feedback: "",
            pagination:'',
            loading: false,
            group_names:'',
            groupee: this.groups

        };
    },
    created(){
        this.fetchPeople();
    },
    mounted(){
        this.grouped()
    },
    methods: {

        onFileChange(e){
            let files = e.target.files || e.dataTransfer.files
            if(!files.length){
                return;
            }else{
                console.log(files[0])
                this.form.file = files[0]
                this.createImage(files[0])

            }
        },

        createImage(file){
            let reader =  new FileReader();
            let vm = this
            reader.onloadend = () => {
                vm.image = reader.result
            }
            reader.readAsDataURL(file)
        },

        removeImage(){
            this.image = '';
        },

        updatePeople(){
            this.loading = true;
            this.form.patch(`/people/${this.form.id}/edit`)

            .then(() => {
                this.flashMessage.info({
                title: 'People Info',
                message: 'Person updated successfully!'
                });

                 $('#add-people').modal('hide');
                this.fetchPeople();
                this.loading = false;
            })
            .catch(error => {
                        this.flashMessage.error({error:"An Internal Error occured, please try again later"});
                        this.loading = false;
                    });

        },

        editModal(data){
            this.editmode = true;
            this.form.reset()
            $('#add-people').modal('show');
            this.form.fill(data);
        },


        showModal () {
           this.form.reset();
            $('#add-people').modal('show');
        },

       addPeople() {
           let formdata = new FormData();
           formdata.append("first_name", this.form.first_name);
           formdata.append("last_name", this.form.last_name);
           formdata.append("middle_name", this.form.middle_name);
           formdata.append("first_name", this.form.first_name);
           formdata.append("email", this.form.email);
           formdata.append("date_of_birth", this.form.date_of_birth);
           formdata.append("address", this.form.address);
           formdata.append("state", this.form.state);
           formdata.append("city", this.form.city);
           formdata.append("gender", this.form.gender);
           formdata.append("mobile_number", this.form.mobile_number);
           formdata.append("group_id", this.form.group_id);
           formdata.append("job_title", this.form.job_title);
           formdata.append("employer", this.form.employer);
           formdata.append("talent", this.form.talent);
           formdata.append("school", this.form.school);
           formdata.append("grade", this.form.grade);
           formdata.append("marital_status", this.form.marital_status);
           formdata.append("join_date", this.form.join_date);
           formdata.append("file", this.form.file);

           //start the spinner and disable the button
            this.loading = true;
             this.form.post("/people/add", this.form)
                .then(() => {
                    //if successful, hide the modal and fetch the new data
                $('#add-people').modal('hide');
                this.fetchPeople();

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
        fetchPeople(page_url){
            let vm = this;
            page_url = page_url || 'peoples';
            fetch(page_url)
            .then(res => res.json())
            .then(res => {
                this.peoples = res.data
                vm.makePagination(res);
            })
            .catch((err) => console.log(err));
        },
        makePagination(res) {
               let pagination = {
                   current_page: res.current_page,
                   last_page:    res.last_page,
                   next_page:    res.next_page_url,
                   prev_page:    res.prev_page_url
               };
               this.pagination = pagination;
            },

        url(page) {

            if (!page) {
                let query = location.search.match(/page=(\d+)/);

                page = query ? query[1] : 1;
            }

            return `${location.pathname}/peoples/?page=${page}`;
        },
         destroy(id){

              if (confirm("Are you sure? cannot be undone")) {

            axios
                .delete("/people/" + id);
                this.$emit("destroyed", id);
                    this.flashMessage.info({
                        message: 'Person deleted successfully!'
                    });

               this.fetchPeople();
              }
        },
        grouped(){
            let arr = []
            this.groupee.forEach(element => {
                arr.push(element.name)
                arr['id'] = element.id
            });
            this.group_names = arr
        }
    }
}

</script>
