<template>
    <form @submit.prevent="add">
            <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body padding p-3">
                                <div class="form-group">
                                    <div class="custom-control custom-switch mt-3">
                                        <input type="checkbox" class="custom-control-input" id="eve" @click="showEve()">
                                        <label class="custom-control-label" for="eve"> <h5> Anonymous</h5></label>
                                    </div>
                                    <select name="people_id" id="people_id" class="form-control" v-model="form.people_id" required>
                                        <option value="" disabled>Select</option>
                                        <option :value="people.id" v-for="people in peoples" :key="people.id">{{people.first_name}} {{people.last_name}}</option>
                                    </select>
                                </div>
                            
                            </div>
                        </div>
                        <!-- <div class="card">
                            <div class="card-body padding">
                                <div class="form-group">
                                <label for="batch_id">Batch</label>
                                    <select class="form-control" name="batch_id" id="batch_id" v-model="form.batch_id">
                                    <option value="" disabled>Select</option>
                                    </select>
                                </div>
                            
                            </div>
                        </div>-->
                    </div> 
                    <div class="col-md-8 col-sm-8 col-lg-8">
                        <div class="card">
                                <div class="card-body padding">
                                    <div class="form-group">
                                        <div class="custom-control custom-switch ">
                                            <input type="checkbox" class="custom-control-input" id="funds" @click="showEve()">
                                            <label class="custom-control-label" for="mfunds"> <h5> Add Multiple funds</h5></label>
                                        </div>
                                        <div class="row no-gutter">
                                            <div class="col-md-3 col-3">
                                                <label for="amount">Amount<i class="text-danger">*</i></label>
                                                <input type="number" class="form-control" name="amount" id="amount" v-model="form.amount" required>
                                            </div>
                                            
                                            <div class="col-md-5 col-5">
                                            <label for="funds">Funds<i class="text-danger">*</i></label>
                                                <select name="fund_id" id="funds" class="form-control" v-model="form.fund_id" required>
                                                    <option value="" disabled>Select</option>
                                                    <option :value="fund.id" v-for="fund in funds" :key="fund.id">{{fund.title}}</option>
                                                </select>
                                            </div>
                                        </div>
                                       
                                        
                                    </div>
                                
                                </div>
                            </div> 
                        </div> 
        </div><!-- < / row >  -->
                <div class="container mb-4">
                    <div class="row bg-white shadow-sm mb-2 p-2">
                        <div class="col-md-6 col-6">
                            <div class="form-group">
                                <label for="date">Date</label>
                                <input type="date" name="date" id="date" class="form-control" required v-model="form.date">
                            </div>
                        </div>
                        <div class="col-md-6 col-6 float-right">
                            <div class="form-group">
                                <label for="date">Method</label>
                                <select class="form-control" name="method" v-model="form.method" required>
                                <option value="" disabled>Select</option>
                                <option :value="method.id" v-for="method in methods" :key="method.id">{{method.title}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="note">Note</label>
                            <textarea name="note" id="note" cols="20" rows="6" class="form-control" v-model="form.note"></textarea>
                        </div>
                    </div><!--< / Row >-->
                    <button class="btn btn-outline-secondary btn-block rounded" type="submit" :class="loading ? 'loader' : ''" :disabled="loading">Save</button>
                </div>
        </form>
</template>
<script>
export default {
    data(){
        return{
            form: new Form({
                people_id:'',
                amount:'',
                fund_id:'',
                date:'',
                method:'',
                note:''

            }),
            methods:'',
            funds:'',
            peoples:'',
            loading:false,

        };
    },

    created(){
        this.getfund();
        this.getmethod();
        this.getpeople();
    },
    methods:{
        add(){
            this.loading = true;
            this.form.post('/add/contribution')
            .then(({data}) => {
                    this.flashMessage.info({
                        message: "Contribution added"
                    });
                    this.loading = false;
                     location.assign('/view/contribution');
                 })
            .catch((error) => {
                this.flashMessage.error({
                    message:"An error was encountered"
                });
           this.loading = false;
            })

        },
            getfund(){
            axios.get('/fund').then(({data}) => this.funds = data).catch(error => {
                this.flashMessage.error ({
                       message: "An Unexpected error occured. Please try again."+ error,
                       });
                  
            });
        },

            getmethod(){
            axios.get('/methods').then(({data}) => this.methods = data).catch(error => {
                this.flashMessage.error ({
                       message: "An Unexpected error occured. Please try again."+ error,
                       });
                  
            })
        },
         getpeople(){
            axios.get('/peoples').then(({data}) => this.peoples = data.data).catch(error => {
                this.flashMessage.error ({
                       message: "An Unexpected error occured. Please try again."+ error,
                       });
                  
            })
        },
    }
}
</script>