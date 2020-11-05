<template  name="Login">
    <div class="mb-5">
        <div class="container px-10 py-8 mt-5 ">
            <div class="lead text-center m-3">COMPANY NAME</div>
         <h2 class="lead align-text-center font-weight-bold">Login</h2>
            <form class="px-10 py-8" @submit.prevent="login" @keydown="feedback = ''">
                <div class=" form-group mb-6">
                    <label for="username" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2 "></label>
                    <input type="text" class="w-full p-2 leading-normal form-control" style="border-radius: 15px;" id="username" placeholder="Username" name="username" autocomplete="username" autofocus required v-model="form.username">
                </div>

                <div class="form-group mb-6">
                    <label for="password" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2 "></label>
                    <input type="password" class="w-full p-2 leading-normal form-control" style="border-radius: 15px;" id="password" placeholder="Password" name="password" autocomplete="current-password" required v-model="form.password">
                </div>

                 <div class="form-group mb-6">
                    <input type="checkbox" class="" style="border-radius: 15px;" id="remember" name="remember" required v-model="form.remember">
                    <label for="remember" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2 ">Remember</label>
                    <a href="/forgot" class="link font-weight-bold float-right">Fogot Password?</a>
                </div>

                <div class="flex justify-end items-center form-group">
                    <button type="submit" class="btn btn-outline-secondary btn-block border-secondary rounded-pill" :class="loading ? 'loader' : ''" :disabled="loading">Log In</button>
                </div>
                 <div class="form-group mb-6  text-center">
                   <span class="">New Church?</span> 
                    <a href="#" class="btn btn-outline-primary btn-block border-primary rounded-pill mt-2">Sign Up Now</a>
                </div>
                <div class="mt-6  p-2" v-if="feedback">
                    <span class="text-xs text-danger" v-text="feedback"></span>
                </div>
            </form>
        </div>
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