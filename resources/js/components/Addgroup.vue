<template name="Addgroup">
    <div>
    <a href="#" class="btn btn-secondary rounded-pill py-2 px-4 pull-right mb-3 " @click.prevent="$modal.show('addGroup')">Add <i class="fa fa-plus"></i></a>
    <h1><i class="fa fa-dashboard"></i> Groups</h1>
        <modal name="addGroup" height="auto" :adaptive="true" transition="slide">
            <div class=""><button class="btn btn-flat" @click="$modal.hide('addGroup')"> <i class="fa fa-arrow-left"></i></button></div>
            <section class="content">
                <div class="box">
                    <div class="box-body padding">
                        <form method="POST" class="form-horizontal" @submit.prevent="addGroup" @keydown="feedback =''">
                            <input name="_method" value="PUT" type="hidden">
                            <div class="form-group">
                                <label class="col-sm-6" for="gname">Group Name</label>
                                <div class="">
                                    <input name="gname" id="gname" placeholder="Group name" class="form-control mb-3" type="text" required  v-model="form.gname" autofocus>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2" for="leader">Leader</label>
                                <div class="">
                                    <input name="leader" id="leader" placeholder="Leader" class="form-control mb-3" type="text" required  v-model="form.leader"> 
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
            this.$modal.show('addGroup');
        },
        hide () {
            this.$modal.hide('addGroup');
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