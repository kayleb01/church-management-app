<template name="Addfollowup">
    <div>
        <h3><i class="fa fa-dashboard"></i> Follow up</h3>
    		<button href="#" class="btn btn-secondary rounded-pill py-2 px-4 pull-right mb-2" @click="$modal.show('Addfollowup')">Add follow up</button>
        <modal  :adaptive="true" height="auto" transition="slide" name="Addfollowup" scrollable="true" :draggable="true">
            <section class="content">
             <div class=""><button class="btn btn-flat" @click="$modal.hide('Addfollowup')"> <i class="fa fa-arrow-left"></i></button></div>
                <div class="panel">
                    <div class="panel-body padding">
                        <form method="POST" class="form-horizontal" @submit.prevent="Addfollowup()">
                            <input name="_method" value="PUT" type="hidden">
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="people">People<i class="text-danger">*</i></label>
                            <div class="">
                            <select name="people" class="form-control">
                                <option value="1">Caleb Bala</option>
                                <option value="2">Adisa Babalola</option>
                            </select>
                            </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="user">Responsible<i class="text-danger">*</i></label>
                                <div class="">
                                    <select name="user" class="form-control">
                                    <option value="1">Caleb Bala</option>
                                </select>
                                </div>
                            </div>
                            <div class="form-group">
                                    <label class="col-sm-6 control-label" for="date">Follow up Date<i class="text-danger">*</i></label>
                                <div class="">
                                    <input name="date" id="date" class="form-control mb-3" type="date" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="email">Type</label>
                            <div class="">
                                <select name="people" class="form-control">
                                <option value="1">Visit</option>
                                <option value="2">Phone</option>
                                <option value="3">Message</option>
                            </select>
                            </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="from">From <i class="text-danger"></i></label>
                            <div class="">
                                <input type="time" name="from" class="form-control" required>
                            </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="to">To <i class="text-danger"></i></label>
                            <div class="">
                                <input type="time" name="to" class="form-control" required>
                            </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="address">Action</label>
                                <div class="col-md-8">
                                    <select name="action" id="action" required>
                                        <option>Care</option>
                                        <option>Teach</option>
                                    </select> 
                                    <a href="#"><i class="fa fa-cog"></i></a>
                                </div>
                            </div>
                            <div class="form-group">
                                <input name="done" type="checkbox">
                                <label class="control-label" for="done">Done</label>
                            </div>
                            <div class="form-group">
                            <label class="col-sm-2 control-label" for="zipcode">Notes</label>
                                <div class="">
                                    <input type="text" name="zipcode"  class="form-control">
                                </div>
                            </div>               
                            <div class="clearfix"></div>
                            <div class="form-group" style="padding: 10px;">
                                <button type="submit" class="btn btn-secondary rounded-pill btn-block">Add</button>
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
    methods:{
        show () {
            this.$modal.show('Addfollowup');
        },
        hide () {
            this.$modal.hide('Addfollowup');
        },
        Addfollowup() {
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