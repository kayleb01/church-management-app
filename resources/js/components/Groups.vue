<template>
     <div>
        <div class="panel">
            <h1><i class="fa fa-dashboard mb-3"></i> Groups</h1>
			   <a href="#" class="btn btn-secondary rounded-pill py-2  px-4" @click.prevent="showModal">Add <i class="fa fa-plus"></i></a> <FlashMessage></FlashMessage>
        </div>
        <div class="card mt-3">
              <div class="card-header">
                <h3 class="card-title">Groups</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                   <table v-if="user.confirmed != 1" class="table table-striped">
                       <tbody class="text-center"> <tr><td> <h3> You've not been confirmed by the Admin yet!</h3> </td></tr></tbody>
                  </table>
                <table class="table table-sm" v-else>
                  <tbody v-if="groups.length > 0 || items.length > 0">
                    <tr v-for="group in groups" :key="group.id">
                        <td class="leading">
                            <div class="dropdown">
                                <button class="btn btn-flat float-right dropdown-toggle mb-2" type="button" id="bulk" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                </button>
                                <div class="dropdown-menu" aria-labelledby="bulk">
                                    <button class="dropdown-item" @click="editModal(group)">Edit</button>
                                    <button class="dropdown-item text-danger" @click.prevent="destroy(group.id)">Delete</button>
                                </div>
                            </div>
                            <a href="#" @click.prevent="group_modal(group.id)">{{group.name}}</a><br>
                            <span class="font-weight-bold">Number of People in the group:- {{group.people_count}}</span>
                        </td>
                    </tr>
                  </tbody>
                  <tbody v-else><tr class="text-center"><td><h4 class="font-weight-bold">No Data</h4></td></tr></tbody>
                </table>
              </div>
              <!-- /.card-body -->
        </div>
        <!-- ---------------------------------------- -Modal ------------------------------------------------------------- -->
         <div class="modal fade" id="add-group">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                         <h4 class="modal-title">
                            <span v-if="editmode === false  "> Add Group</span>
                            <span v-else>Update Group</span>
                        </h4>
                        <button type="button" class="close fload-right" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                    <div class="modal-body">
                <section class="content">
                    <div class="box">
                        <div class="box-body padding">
                            <form class="form-horizontal" @submit.prevent="editmode ? updateGroup() : addGroup() " @keydown="feedback =''">
                                <div class="form-group">
                                <label class="col-sm-6" for="gname">Group Name</label>
                                    <div class="">
                                        <input name="name" id="name" placeholder="Group name" class="form-control mb-3" type="text" required  v-model="form.name" autofocus>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2" for="leader">Leader</label>
                                    <div class="">
                                        <select name="user_id" id="user_id"  class="form-control mb-3" required  v-model="form.user_id">
                                            <option v-for="user in users" :key="user.id" :value="user.id">{{user.firstname}} {{user.lastName}}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="mname">Description</label>
                                    <div class="">
                                        <textarea class="form-control" name="description"  v-model="form.description"></textarea>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="form-group" style="padding: 10px;">
                                    <button type="submit" class="btn btn-secondary rounded-pill btn-block">Save</button>
                                </div>
                                <div class="mt-6  p-2" v-if="feedback">
                                    <span class="text-xs text-danger" v-text="feedback"></span>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="group" v-if="groupee.length != ''">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                        <h4 class="modal-title">
                        <span>Group -  {{groupee.name}}</span>
                    </h4>
                    <button type="button" class="close fload-right" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <section class="content">
                        <div class="">
                            <div class="mx-auto">
                                <div class="font-weight-bold m-2 p-2"> Group name:- {{groupee.name}}</div>
                                 <div class="d-block font-weight-bold m-2 border border  bg-light shadow-xs p-2"> Group Leader:- {{groupee.leader.firstName}} {{groupee.leader.lastName}}</div>
                                 <div class="d-block font-weight-bold m-2 p-2"> No. people in group:- {{groupee.people_count}}</div>
                                 <div class="d-block font-weight-bold m-2 p-2 shadow-sm bg-light border"> Description:- {{groupee.description}}</div>
                           </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
</template>
<script>
 import collection from "../mixins/collection";
export default {
    mixins: [collection],
    name:"groups",
    props: ['users'],
    data(){
        return {
            form: new Form({
                id: '',
                name:'',
                user_id:'',
                description:''
            }),
            editmode: false,
            groups:'',
            feedback: "",
            loading: false,
            groupee:''
        };
    },

    mounted() {
        // this.group();
        this.fetch();
    },

    methods: {

        updateGroup(){
            this.loading = true;
            this.form.patch(`/group/${this.form.id}/edit`)
            .then(() => {
                this.flashMessage.info({
                title: 'Group Info',
                message: 'Group updated successfully!'
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
            $('#add-group').modal('hide');
            this.fetch();
            this.loading = false;
        },

        editModal(data){
            this.editmode = true;
            this.form.reset();
            this.form.fill(data);
            $('#add-group').modal('show');

        },
        showModal () {
            this.form.reset();
            $('#add-group').modal('show');
        },
       addGroup() {
            this.loading = true;
             this.form.post("/group/add")
                .then(() => {
                $('#add-group').modal('hide');
                this.fetch();

                this.flashMessage.info({
                title: 'Group Info',
                message: 'Group created successfully!'
                    });
                })
                .catch(error => {
                    this.flashMessage.error({
                    title:'Error ',
                    message: "An Unexpected error occured." + error,
                    })

                    this.loading = false;
                });

        },
    fetch() {
            axios.get(this.url()).then(({data}) => this.groups = data.data);
        },

        url() {
            return `/groups`;
        },
         destroy(id){
            if(confirm("Are you sure?, this cannot be undone")){

                axios
                    .delete("/group/" + id);
                    this.$emit("destroyed", id);
                        this.flashMessage.info({
                            title: 'Group Delete',
                            message: 'Group deleted successfully!'
                        });

                this.fetch();

            }
        },
       async group_modal(group){

        await axios
                .get('/group/'+group)
                .then((res) => {
                    $('#group').modal('show');
                    this.groupee = res.data;
                })
                .catch((error) => console.log(error))

        }
    }

}
</script>
