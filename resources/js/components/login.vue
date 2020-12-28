<template  name="Login">
    <div class="mb-5">
        <div class="login-box">
            <div class="login-logo">
                <a href="../../index2.html"><b>DAIMOND MASJID</b></a>
            </div>
            <!-- /.login-logo -->
            <div class="card">
                <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>

                <form @submit.prevent="login" @keydown="feedback = ''">
                    <div class="input-group mb-3">
                    <input type="email" class="form-control" placeholder="Email" autofocus required v-model="form.email">
                    <div class="input-group-append">
                        <div class="input-group-text" style="border-top: 0 !important;  border-left: 0 !important;  border-right: 0 !important; border-bottom: #999 1px solid !important;  border-radius: 0 !important;">
                        <span class="fa fa-envelope"></span>
                        </div>
                    </div>
                    </div>
                    <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Password"  autocomplete="current-password" required v-model="form.password">
                    <div class="input-group-append" style="border-top: 0 !important;  border-left: 0 !important;  border-right: 0 !important;">
                        <div class="input-group-text"  style="border-top: 0 !important;  border-left: 0 !important;  border-right: 0 !important; border-bottom: #999 1px solid !important;  border-radius: 0 !important;">
                        <span class="fa fa-lock"></span>
                        </div>
                    </div>
                    </div>
                   <div class="form-group mb-6">
                    <input type="checkbox" class="" style="border-radius: 15px;" id="remember" name="remember"  v-model="form.remember">
                    <label for="remember" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2 ">Remember</label>
                    <a href="/password/reset" class="link font-weight-bold float-right">Fogot Password?</a>
                </div>

                <div class="flex justify-end items-center form-group mb-3">
                    <button type="submit" class="btn btn-danger btn-block border-secondary rounded" :class="loading ? 'loader' : ''" :disabled="loading">Log In</button>
                </div>
                 <div class="form-group mb-5  text-center">
            
                    <a href="/register" class="btn btn-primary btn-block border-primary rounded mt-2">Sign Up Now</a>

                    <span>Don't have an acscount yet? <a href="/register">Register</a></span>
                </div>
                <div class="mt-6  p-2" v-if="feedback">
                    <span class="text-xs text-danger" v-text="feedback"></span>
                </div>
                        
                   
                    
                </form>

                </div>
                <!-- /.login-card-body -->
            </div>
        </div>
            <!-- /.login-box -->
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
        login() {
            this.loading = true;

            axios
                .post("/login", this.form, {
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