 <template>
 <div>
 <h1><i class="fa fa-dashboard"></i> Methods</h1>
        <a href="#" class="btn btn-outline-secondary rounded py-2 mt-2 mb-2 px-4" @click.prevent="showModal">Add Methods <i class="fa fa-plus"></i></a> <FlashMessage></FlashMessage>
    <section class="content">
        <div class="card">
              <!-- /.card-header -->
              <div class="card-body p-0">
                   <table v-if="user.confirmed != 1" class="table table-striped">
                       <tbody class="text-center"> <tr><td> <h3> You've not been confirmed by the Admin yet!</h3> </td></tr></tbody>
                  </table>
                <table class="table" v-else>
                  <thead>
                    <tr>
                      <th>NAME</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="method in med" :key="method.id">
                      <td>
                       {{method.title}}
                      </td>
                      <td>
                        <div class="dropdown">
                            <button class="btn btn-flat float-right dropdown-toggle mb-2" type="button" id="bulk" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            </button>
                            <div class="dropdown-menu" aria-labelledby="bulk"> 
                                <button class="dropdown-item" @click="editModal(method)">Edit</button>
                                <button class="dropdown-item text-danger" @click.prevent="destroy(method.id)">Delete</button>
                            </div>
                        </div>
                      </td>
                    </tr>
                    </tbody>
                </table>
              </div>
              <!-- /.card-body -->
        </div>
    </section>
    <div class="modal" id="add-method">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h3 class="modal-title">
                    <span v-if="!editmode">Add Method</span> 
                    <span v-if="editmode">Update Method</span>
                    </h3>
                    <button type="button" class="close fload-right" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form @submit.prevent="editmode ? updateMethod() : Addmethod()">
                        <div class="form-group">
                            <input type="text" name="title" required id="title" class="form-control" placeholder="Name" v-model="form.title">
                        </div>
                        <button type="submit" class="btn btn-outline-secondary btn-block rounded" :class="loading ? 'loader' : ''" :disabled="loading">SAVE</button>
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
                title:''
            }),
            loading:false,
            med:'',
            editmode:false,
        };
    },

    created(){
        this.getmethods();
    },

    methods:{
        showModal(){
            this.form.reset();
            $('#add-method').modal('show')
        },

          editModal(data){
            this.editmode = true;
            this.form.reset();
            $('#add-method').modal('show');
            this.form.fill(data);
        },
        
        Addmethod(){
            this.loading = true;
            this.form.post('/payment/add')
            .then(({data}) =>{
                this.flashMessage.info({
                    message: "Method added"
                });

                this.loading = false

                this.getmethods()
                $('#add-method').modal('hide')
            })
            .catch((errors) => {
                 this.flashMessage.error({
                    message: "An error was encountered, please contact the admin "+errors.message,
                });
                this.loading = false
                 $('#add-method').modal('hide')
            }) 
        },
        getmethods(){
            axios.get('/methods').then(({data}) => this.med = data).catch(error => {
                this.flashMessage.error ({
                       message: "An Unexpected error occured. Please try again."+ error,
                       });
                  
            });
        },

         updateMethod(){
            this.loading = true;
            this.form.patch(`/method/${this.form.id}/edit`)
            .then(() => {
                    this.flashMessage.info({
                    message: 'Payment Method updated successfully!'
                    });
                    this.loading = false;
            })
            .catch(error => {
                        this.flashMessage.error({
                            title:'Error',
                            message:"An Internal Error occured, please try again later"
                            });
                            this.loading = false;
                    });
            $('#add-method').modal('hide');
            this.getmethods();
            this.loading = false;
        },

         destroy(id){
         if(confirm("Are you sure?, this cannot be undone")){
                axios
                    .delete("/method/" + id);
                    this.$emit("destroyed", id); 
                        this.flashMessage.info({
                        
                            message: 'Method deleted successfully!'
                        });
                
                this.getmethods();
               }
        },
    }
}
</script>