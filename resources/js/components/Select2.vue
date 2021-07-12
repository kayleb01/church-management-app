<template>
    <div>
        <select multiple class="input-sm" :name="name">
        <slot></slot>
    </select>
    </div>
</template>
<style src="select2/dist/css/select2.min.css"></style>
<style src="select2-bootstrap-theme/dist/select2-bootstrap.min.css"></style>

<script>
import Select2 from 'select2';
export default{
twoWay: true,
        priority: 1000,
        props: ['options', 'value', 'name'],
        data(){
            return{
                msg: 'hello'
            }
        },
        mounted(){
            var self = this;
            $(this.$el)
                .select2({theme: "bootstrap", data: this.options})
                .val(this.value)
                .trigger('change')
                .on('change', function () {
                    //self.$emit('input', this.value) //single select worked good
                    self.$emit('input',  $(this).val()) // multiple select
                })
        },
        watch: {
            value: function (value) {
            // check to see if the arrays contain the same values
            if ([...value].sort().join(",") !== [...$(this.$el).val()].sort().join(","))
                $(this.$el).val(value).trigger('change');
            },
            options: function (options) {
                $(this.$el).select2({ data: options })
            }
        },
        destroyed: function () {
            $(this.$el).off().select2('destroy')
        }
}
</script>