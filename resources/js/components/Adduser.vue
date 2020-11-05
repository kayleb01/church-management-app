<template name="Adduser">
    <div>
        <a href="#" class="btn btn-secondary rounded-pill py-2 px-4 pull-right mb-3 " @click.prevent="$modal.show('Adduser')">Add <i class="fa fa-plus"></i></a>
        <h3><i class="fa fa-dashboard mt-3"></i>User</h3>
        <modal :adaptive="true" height="auto" transition="slide" name="Adduser" scrollable="true">
            
            <div class=""><button class="btn btn-flat" @click="$modal.hide('Adduser')"> <i class="fa fa-arrow-left"></i></button></div>
            <section class="content">
                <div class="box">
                    <div class="box-body">
                        <form method="POST" class="form-horizontal" @submit.prevent="Adduser()">
                                <input name="_method" value="PUT" type="hidden">
                                <div class="form-group">
                                    <label class="col-sm-6 control-label" for="role">Role</label>
                                    <div class="">
                                    <select name="role" id="role" class="form-control" v-model="form.role">
                                        <option value="1">Member</option>
                                        <option value="2">Admin</option>
                                        <option value="3">Owner</option>
                                    </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-6 control-label" for="email">Email</label>
                                    <div class="">
                                        <input name="email" id="email" placeholder="Mail@mail.com" class="form-control mb-3" type="email" required v-model="form.email">
                                    </div>
                                </div>
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
                                        <label class="col-sm-6 control-label" for="tel">Mobile Phone</label>
                                        <div class="">
                                            <input name="tel" id="tel" placeholder="000 000 0000" class="form-control mb-3" type="tel" required v-model="form.tel">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-6 control-label" for="password">Password</label>
                                        <div class="">
                                            <input  name="password" id="password" placeholder="*********" class="form-control" type="password" required v-model="form.password">
                                        </div>
                                    </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-secondary border border-secondary rounded-pill btn-block" value="Save">
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
            this.$modal.show('Adduser');
        },
        hide () {
            this.$modal.hide('Adduser');
        },
        addGroup() {
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