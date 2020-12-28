<template  name="Register">
<div class="mb-5">
<div class="-box">
  <div class="register-logo">
    DAIMOND MASJID
  </div>

  <div class="card">
    <div class="card-body ">
        <p class="login-box-msg">Register</p>
        <flashMessage></flashMessage>
                <form  @submit.prevent="register" @keydown="feedback = ''">
                    <div class="form-group">
                        
                        <label for="min_ex" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2 ">  Choose an existing Ministries/Organizations</label>
                        <select name="ministry" id="min" class="form-control" v-model="form.ministry">
                            <option :value="ministry.id" v-for="ministry in ministries" :key="ministry.id">{{ministry.name}}</option>
                        </select>
                    </div>
                    <!-- <div class=" form-group mb-6">
                      <label for="ministry" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2 ">Or create new Ministry/Organization</label>
                        <input type="text" class="w-full p-2 leading-normal form-control" id="ministry" placeholder="Ministry Name" name="ministry" autocomplete="ministry" autofocus v-model="form.ministry">
                    </div> -->

                    <div class="form-group mb-6 row">
                        <div class="col-md-6"> 
                            <!-- <label for="password" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2 "></label> -->
                            <input type="text" class="w-full p-2 leading-normal form-control"  id="fname" placeholder="First Name" name="fname" autocomplete="fname" required v-model="form.fname">
                        </div>
                        <div class="col-md-6"> 
                            <!-- <label for="lname" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2 "></label> -->
                            <input type="text" class="w-full p-2 leading-normal form-control" id="lname" placeholder="Last Name" name="lname" autocomplete="lname" required v-model="form.lname">
                        </div>
                    </div>

                    <div class="form-group mb-6">
                        <input type="tel" maxlength="15" class="form-control w-full leading-normal " id="phonenum" name="phonenum" required v-model="form.phonenum" placeholder="Mobile Number">
                        <!-- <label for="remember" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2 "></label> -->
                    </div>
                    
                    <div class="form-group mb-6">
                        <input type="email" class="form-control w-full leading-normal " id="email" name="email" required v-model="form.email" placeholder="Email">
                        <!-- <label for="remember" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2 ">   </label> -->
                    </div>
                    
                    <div class="form-group mb-6">
                        <input type="password" class="form-control w-full leading-normal " id="password" name="password" required v-model="form.password" placeholder="Password">
                        <!-- <label for="remember" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2 "></label> -->
                    </div>
                    <div class="form-group mb-6">
                        <input type="password" class="form-control w-full leading-normal " id="password-confirm" name="password_confirmation" required v-model="form.password_confirmation" placeholder="Comfirm Password">
                        <!-- <label for="remember" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2 "></label> -->
                    </div>
                    <div class="flex justify-end items-center form-group">
                        <button type="submit" class="btn btn-outline-secondary btn-block border-secondary rounded-pill" :class="loading ? 'loader' : ''" :disabled="loading">Sign Up</button>
                    </div>
                    <div class="form-group mb-6  text-center">
                    <span class="">Do you have an account? <a href="/login" class="link font-weight-bold"> Log In</a></span>
                    </div>
                    <div class="mt-6  p-2" v-if="feedback">
                        <span class="text-xs text-danger font-weight-bold" v-text="feedback"></span>
                    </div>
                </form>
            </div><!-- /.card -->
        </div>
    </div>
</div>
</template>
<script>
export default{
    props: ['ministries'],

        data(){
        return {
            form: new Form({
                min_ex:'',
                ministry:'',
                fname:'',
                lname:'',
                email:'',
                password:'',
                password_confirmation:'',
            }),
            feedback: "",
            loading: false
        };
    },
    methods: {
        register() {
            this.loading = true;

            this.form.post("/register")
                .then(() => {
                    this.flashMessage.info({
                        message: 'Person updated successfully!'
                        });
                    location.assign('/registered');
                })
                .catch(error => {
                    this.feedback =
                        "An error occured. Please fill the form fields and try again."+ error.message;
                    this.loading = false;
                });
        },

    }
}
</script>