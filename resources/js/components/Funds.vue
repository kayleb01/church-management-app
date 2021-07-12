 <template>
 <div>
 <h1><i class="fa fa-dashboard"></i> Funds</h1>
        <a href="#" class="btn btn-outline-secondary rounded py-2 mt-2 mb-2 px-4" @click.prevent="showModal">Add Funds <i class="fa fa-plus"></i></a> <FlashMessage></FlashMessage>
    <section class="content">
        <div class="card">
              <!-- /.card-header -->
              <div class="card-body p-0">
                   <table v-if="user.confirmed !== 1" class="table table-striped">
                       <tbody class="text-center"> <tr><td> <h3> You've not been confirmed by the Admin yet!</h3> </td></tr></tbody>
                  </table>
                <table class="table" v-else>
                  <thead>
                    <tr>
                      <th>NAME</th>
                      <th>TAX DEDUCTABLE</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody v-if="funds">
                    <tr v-for="fund in funds" :key="fund.id">
                      <td >
                       {{fund.title}}
                      </td>
                      <td>
                        {{fund.tax}}
                      </td>
                      <td>
                        <div class="dropdown">
                            <button class="btn btn-flat float-right dropdown-toggle mb-2" type="button" id="bulk" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            </button>
                            <div class="dropdown-menu" aria-labelledby="bulk"> 
                                <button class="dropdown-item" @click="editModal(fund)">Edit</button>
                                <button class="dropdown-item text-danger" @click.prevent="destroy(fund.id)">Delete</button>
                            </div>
                        </div>
                      </td>
                    </tr>
                    </tbody>
                    <tbody v-if="funds ==''"> 
                        <tr>
                            <td class="text-center"> <h3>NO DATA</h3></td>
                        </tr>
                    </tbody>
                </table>
              </div>
              <!-- /.card-body -->
        </div>
    </section>
    <div class="modal" id="add-funds">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">
                        <span v-if="!editmode">Add Funds</span>
                        <span v-if="editmode">Update Funds</span>
                     </h3>
                    <button type="button" class="close fload-right" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                </div>
                <div class="modal-body">
                    <form @submit.prevent="editmode ? updateFund() : AddFunds()">
                        <div class="form-group">
                            <input type="text" name="title" id="title" class="form-control" placeholder="Name" v-model="form.title">
                        </div>
                        <div class="form-group">
                            <label for="tax">Tax deductable<span class="text-muted"> Yes|No</span></label>
                            <input type="text" name="tax" id="tax" class="form-control" v-model="form.tax">
                        </div>
                        <button type="submit" :class="loading ? 'loader' : ''" :disabled="loading" class="btn btn-outline-secondary btn-block rounded">SAVE</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
export default {
    data(){
        return{
            form: new Form({
                id:'',
                title:'',
                tax:''
            }),
            editmode:false,
            loading:false,
            funds:''
        };
    },
    created(){
        this.getfund();
    },
    methods:{
        showModal(){
            $('#add-funds').modal('show');
        },
         editModal(data){
            this.editmode = true;
            this.form.reset();
            $('#add-funds').modal('show');
            this.form.fill(data);
        },
        
        AddFunds(){
            this.loading = true;
            this.form.post('/fund/add')
            .then(({data}) =>{
                this.flashMessage.info({
                    message: "Funds added"
                });

                this.loading = false
                $('#add-funds').modal('hide')
                this.getfund()
               
            })
            .catch((errors) => {
                 this.flashMessage.error({
                    message: "An error was encountered, please contact the admin "+errors.message,
                });
                this.loading = false
                 $('#add-funds').modal('hide')
            }) 
        },
        getfund(){
            axios.get('/fund').then(({data}) => this.funds = data).catch(error => {
                this.flashMessage.error ({
                       message: "An Unexpected error occured. Please try again."+ error,
                       });
                  
            });
        },

         updateFund(){
            this.loading = true;
            this.form.patch(`/fund/${this.form.id}/edit`)
            .then(() => {
                    this.flashMessage.info({
                    message: 'updated successfully!'
                    });
                    this.loading = false;
                    this.gefund();
            })
            .catch(error => {
                        this.flashMessage.error({
                            title:'Error',
                            message:"An Internal Error occured, please try again later"
                            });
                            this.loading = false;
                              $('#add-funds').modal('hide');
                    });
        },

         destroy(id){
         if(confirm("Are you sure?, this cannot be undone")){
                axios
                    .delete("/fund/" + id);
                    this.$emit("destroyed", id); 
                        this.flashMessage.info({
                        
                            message: 'Funds deleted successfully!'
                        });
                
                this.getfund();
               }
        },
        
    }
}
</script>