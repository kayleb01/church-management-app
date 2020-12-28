<template>
<div>
     <h1><i class="fa fa-dashboard"></i> Change Password</h1>
    <section class="content">
        <div class="card mt-2">
            <div class="card-body">
                <form @submit.prevent="change(user.id)">
                   
                    <div class="form-group">
                        <label for="current">Current Password <i class="text-danger">*</i></label>
                        <input type="password" name="current" id="current" class="form-control" minlength="8" v-model="form.current" placeholder="Current Password" required>
                    </div>

                    <div class="form-group">
                        <label for="new">New Password<i class="text-danger">*</i></label>
                        <input type="password" name="new" id="new"  class="form-control" minlength="8" v-model="form.new" placeholder="New Password" required>
                    </div>

                    <div class="form-group">
                        <label for="confirm">Confirm Password<i class="text-danger">*</i></label>
                        <input type="password" name="confirm" id="confirm" class="form-control" minlength="8" v-model="form.confirm" placeholder="Confirm Password" required>
                    </div>

                    <div class="form-group">
                        <button type="submit" :class="loading ? 'loader' : ''" :disabled="loading" class="btn btn-outline-secondary btn-block rounded-pill">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
</template>

<script>
export default{
    data(){
        return{
            form: new Form({
                current:'',
                new:'',
                confirm:''
            }),
            loading: false,

        };
    }, 
    methods:{
        change(user){
            loading: true
            this.form.put('/account/'+ user +'/changepassword')
             .then(({data: { redirect }}) => {
                    location.assign(redirect);
                    this.flashMessage.info({
                        message:"Password changed successfully"
                    })
                    loading: false
                })
            .catch(() =>{
                this.flashMessage.error({
                        message:"An error was encountered, please try again later"
                    })
                    loading: false
            });

        },
    }
}
</script>