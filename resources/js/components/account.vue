<template name="Userprofile">
    <div>
        <div class="col-md-12 col-sm-12 mb-5"  >
            <section class="content-header">
			    <FlashMessage></FlashMessage>
                <form @submit.prevent="update(user)">
                <div class="row no-gutter">
                    <div class="col-md-6">
                        <div class="d-flex justify-content-center">
                            
                            <img src="/storage/face-1.jpg'" alt="User Image" class="image-user">
                        </div>
                        <div class="card mt-2 p-0">
                            <div class="card-body p-2">
                                <table class="table table-borderless">
                                    <tr>
                                        <td><b>Ministry</b><i class="text-danger">*</i><br>
                                           <input type="text" name="ministry" id="ministry" readonly="readonly" class="form-control" v-model="form.ministry">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="card p-0 mt-4">
                        <div class="card-body ">
                            <table class="table table-borderless">
                                <tr>
                                    <td><b>Country</b><br>
                                        <input type="text" name="country" id="country" class="form-control" v-model="form.country">
                                    </td>
                                </tr>
                            </table>
                        </div>
                        </div>
                        <div class="card mt-2">
                                <div class="card-body">
                                    <table class="table table-borderless">
                                        <tr>	
                                            <td>
                                                <b>First Name</b><br>
                                                 <input type="text" name="firstname" id="firstname" class="form-control" v-model="form.firstname">
                                            </td>
                                            <td>
                                                <b>Last Name</b><br>
                                                 <input type="text" name="lastName" id="lastName" class="form-control" v-model="form.lastName">
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
					<div class="col-lg-6 col-md-6 col-sm-8">
						<div class="card p-0 mt-4">
						<div class="card-body p-2">
							<table class="table table-borderless">
								<tr>
									<td>
										<b>Mobile Phone</b><br>
                                        <input type="tel" name="mobile_number" id="mobile_number" v-model="form.mobile_number" class="form-control">
									</td>	
								</tr>
								<tr>
									<td>
										<b>Email</b><br>
                                        <input type="email" name="email" id="email" v-model="form.email" class="form-control">	
									</td>
									
								</tr>
							</table>
						</div>
					</div>
						<div class="card mt-2">
							<div class="card-body">
								<table class="table table-borderless">
									<tr>	
										<td>
											<b>Gender</b><br><br>
                                            <select name="gender" id="gender" v-model="form.gender" class="form-control">
                                                <option value="1">Male</option>
                                                <option value="2">Female</option>
                                            </select>
										</td>
									</tr>
								</table>
							</div>
						</div> 
					</div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-block btn-outline-secondary rounded-pill">Save</button>
                </div>
            </form>
        </section>     
    </div>
</div>
</template>
<script>
export default{
	props: ['user'],

    data() {
		return{
			form: new Form({
				id: this.user.id,
				ministry: this.user.ministry,
				country: this.user.country,
				firstname: this.user.firstname,
				lastName: this.user.lastName,
				mobile_number:this.user.mobile_number,
				email: this.user.email,
				gender: this.gender,
				
			}),
			loading:false,
		};

			},
			
    methods:{
		 update(user){
            this.loading = true;
            this.form.patch(`/account/${this.form.id}/edit`)
            .then(() => {
                this.flashMessage.info({
                message: 'Account updated successfully!'
                });
				 this.loading = false;
            })
            .catch(error => {
                        this.flashMessage.error({error:"An Internal Error occured, please try again later"});
                    });
           
		},
		 
       
    }

}
</script>