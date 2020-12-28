<template name="sessions">
<div class="row col-md-12">  
<span class="text-md  font-semibold text-dark">
<div >
    <h5>Sessions</h5>
    <div class="form-group float-right">
        <button class="btn btn-secondary rounded-pill py-2 px-4 " @click.prevent="showModal" type="button" data-item-id="1" id="edit-item" >Add Session <i></i></button>
    </div>
</div>
</span>
    <div class="modal" id="add-session">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                        <div class="modal-title m-2">
                            Add Session
                            <button type="button" class="close float-right" @click="hide">
                                <span>&times;</span>
                            </button>
                        </div>
                    </div>
                <form class="px-10 py-8 col-md-12" @submit.prevent="sessions" @keydown="feedback = ''">
                    <div class=" form-group mb-6">
                        <label for="topic" class="block font-bold mb-2">Topic<i class="text-danger">*</i></label>
                        <input type="text" class="w-full p-2 leading-normal form-control" style="border-radius: 15px;" id="topic" name="topic"  autofocus required v-model="form.topic">
                    </div>
                    <div class="form-group mb-6">
                        <label for="stime" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2 ">Start Time<i class="text-danger">*</i></label>
                        <input type="time" class="w-full p-2 leading-normal form-control" style="border-radius: 15px;" id="stime" name="stime"  required v-model="form.stime">
                    </div>
                    <div class="form-group mb-6">
                        <label for="etime" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2 ">End Time<i class="text-danger">*</i></label>
                        <input type="time" class="w-full p-2 leading-normal form-control" style="border-radius: 15px;" id="etime" name="etime"  required v-model="form.etime">
                    </div>
                    <div class=" form-group mb-6">
                        <label for="speaker" class="block font-bold mb-2">Speaker<i class="text-danger">*</i></label>
                        <input type="text" class="w-full p-2 leading-normal form-control" style="border-radius: 15px;" id="speaker" name="speaker"   required v-model="form.speaker">
                    </div>
                    <div class=" form-group mb-6">
                        <label for="speaker" class="block font-bold mb-2">Notes<i class="text-danger">*</i></label>
                        <input type="text" class="w-full p-2 leading-normal form-control" style="border-radius: 15px;" id="notes" name="notes"   required v-model="form.notes">
                    </div>
                    <div class="flex justify-end items-center form-group">
                        <button type="submit" class="btn btn-outline-secondary btn-block border-secondary rounded-pill" :class="loading ? 'loader' : ''" :disabled="loading">Save</button>
                    </div>

                    <div class="mt-6  p-2" v-if="feedback">
                        <span class="text-xs text-danger" v-text="feedback"></span>
                    </div>
                </form>
        </div>
            </div>
        </div>   
    </div> <!--Endof modal-->

</template>

<script>
export default {
    data() {
        return {
            form: {},
            feedback: "",
            loading: false
        };
    },

    methods: {
        showModal() {
             $('#add-session').modal('show');
            
        },

        hide () {
            $('#add-session').modal('hide');
          },
        sessions() {
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
};
</script>
<style>
login{
    padding:10px;
}
</style>   