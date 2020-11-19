<template  name="Register">
    <div class="mb-5">
        <div class="container px-10 py-8 mt-5 ">
            <div class="lead text-center m-3"><h3>DAIMOND MASJID</h3> </div>
         <h2 class="lead align-text-center font-weight-bold">Register</h2>
            <form class="px-10 py-8" @submit.prevent="register" @keydown="feedback = ''">
                <flashMessage></flashMessage>
                <div class=" form-group mb-6">
                    <!-- <label for="username" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2 "></label> -->
                    <input type="text" class="w-full p-2 leading-normal form-control" id="ministry" placeholder="Ministry Name" name="ministry" autocomplete="ministry" autofocus required v-model="form.ministry">
                </div>

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
        </div>
    </div>

</template>
<script>
export default{
    data(){
        return {
            form: new Form({
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

            this.form.post("/register", this.form, {
                    headers:{
                        'Content-Type':'application/json',
                        'Accept':'application/json'
                    }
                })
                .then(() => {
                    this.flashMessage.info({
                        message: 'Person updated successfully!'
                        });
                    location.assign('/registered');
                })
                .catch(error => {
                    this.feedback =
                        "An error occured. Please fill the form fields and try again."+error.message;
                    this.loading = false;
                });
        },

    }
}
</script>