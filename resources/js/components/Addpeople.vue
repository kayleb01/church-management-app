<template name="Addpeople">
    <div>
    <a href="#" class="btn btn-secondary rounded-pill py-2 px-4 pull-right mb-3 " @click.prevent="$modal.show('addPeople')">Add <i class="fa fa-plus"></i></a>
    <h3><i class="fa fa-dashboard mt-3"></i>People</h3>
        <modal name="addPeople" height="auto" :adaptive="true"  scrollable="true" >
            <div class=""><button class="btn btn-flat" @click="$modal.hide('addPeople')"> <i class="fa fa-arrow-left"></i></button></div>
            <section class="content">
                <div class="box">
                    <div class="box-body padding">
                       <form method="POST" class="form-horizontal" @submit.prevent="addPeople()" enctype="multipart/form-data">
                        <input name="_method" value="PUT" type="hidden">
                        <div class="form-group">
                            <label class="col-sm-6 control-label" for="fname">First name</label>
                            <div class="">
                            <input name="fname" id="fname" placeholder="First name" class="form-control mb-3" type="text" required v-model="form.fname">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-6 control-label" for="lname">Last name</label>
                            <div class="">
                                <input name="lname" id="lname" placeholder="Last name" class="form-control mb-3" type="text" required v-model="form.lname">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-6 control-label" for="mname">Middle name</label>
                            <div class="">
                                <input name="mname" id="fname" placeholder="Middle name" class="form-control mb-3" type="text" required v-model="form.mname">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-6 control-label" for="email">Email</label>
                            <div class="">
                                <input  name="email" id="email" placeholder="Enter email address" class="form-control" type="email" required v-model="form.email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-6 control-label" for="note_on_user">Date of Birth</label>
                            <div class="">
                                <input type="date" name="dob" class="form-control" placeholder="Year/Month/Day" required v-model="form.dob">
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label class="col-sm-6 control-label" for="address">Address Line</label>
                            <div class="">
                                <input name="address" id="address" placeholder="Your Location" class="form-control mb-2" type="text" required v-model="form.address">
                            </div>
                            <label class="col-sm-6 control-label" for="state">State </label>
                            <div class="">
                                <select name="state" id="state" class="form-control mb-2" v-model="form.state">
                                    <option value="">select</option>
                                </select>
                            </div>
                            <label class="col-sm-2 control-label" for="city">City</label>
                            <div class="">
                                <input name="city" id="city" placeholder="City" class="form-control mb-2" type="text" required v-model="form.city">
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
                                <input name="phonenum" type="tel" class="form-control" maxlength="15" placeholder="080 234 5678" required v-model="form.phonenum">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="facebook">Facebook</label>
                            <div class="">
                                <input name="facebook" type="url" class="form-control"  placeholder="Facebook Profile" required v-model="form.facebook">
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label for="group">Groups</label>
                            <div class="">
                                <select name="groups[]" id="group" class="form-control" multiple v-model="form.groups">
                                    <option value="">Special Cases</option>
                                    <option value="">Sunday School</option>
                                    <option value="">Youth Group</option>
                                </select>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group mb-3">
                            <label class="col-sm-6 control-label" for="jt">Job Title</label>
                            <div class="">
                                <input type="text" name="jt" class="form-control" placeholder="Job Title" required v-model="form.jt">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label class="col-sm-6 control-label" for="employer">Employer</label>
                            <div class="">
                                <input type="text" name="employer" class="form-control" placeholder="Employer" required v-model="form.employer">
                            </div>
                        </div>
                        <div class="form-group mb-2">
                            <label class="col-sm-10 control-label" for="pass">Talents and Hobbies</label>
                            <div class="">
                                <input type="text" name="th" class="form-control" placeholder="Talent and Hobbies" required v-model="form.th">
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
                                <option value="1">Pre-Kindergaten</option>
                                <option value="2">Kindergaten</option>
                                <option value="3">1st</option>
                                <option value="4">2nd</option>
                                <option value="5">3rd</option>
                                <option value="6">4th</option>
                                <option value="7">5th</option>
                                <option value="8">6th</option>
                                <option value="9">7th</option>
                                <option value="10">8th</option>
                                <option value="11">9th</option>
                                <option value="12">10th</option>
                                <option value="13">11th</option>
                                <option value="14">12th</option>
                                <option value="15">Graduated</option>
                            </select>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label class="col-sm-10 control-label" for="Mstatus">Marital Status</label>
                            <div class="">
                                <select name="Mstatus" id="Mstatus" class="form-control" v-model="form.Mstatus">
                                    <option value="">Unknown</option>
                                    <option value="1">Single</option>
                                    <option value="2">Married</option>
                                    <option value="3">Widowed</option>
                                    <option value="4">Engaged</option>
                                    <option value="5">Divorced</option>
                                </select>
                            </div>  
                        </div>
                        <hr>
                        <div class="form-group">
                            <label for="Bdate">Baptism Date</label>
                            <input type="date" name="Bdate" id="Bdate" class="form-control" v-model="form.Bdate">
                        </div>
                        <div class="form-group">
                            <label for="Blocation">Baptism Location</label>
                            <input type="text" name="blocation" id="Blocation" class="form-control " v-model="form.blocation">
                        </div>
                        <hr>
                        <div class="form-group">
                            <label class="col-sm-10 control-label" for="joindate">Join Date</label>
                            <input type="date" name="joindate" class="form-control" required v-model="form.joindate">
                        </div>                   
                        <div class="clearfix"></div>
                        <div class="form-group" style="padding: 10px;">
                            <button type="submit" class="btn btn-secondary rounded-pill btn-block">Add</button>
                        </div>
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
    methods: {
        show () {
            this.$modal.show('addPeople');
        },
        hide () {
            this.$modal.hide('addPeople');
        },
        addPeople() {
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