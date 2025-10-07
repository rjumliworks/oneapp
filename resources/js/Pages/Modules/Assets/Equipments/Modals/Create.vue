<template>
    <b-modal v-model="showModal" style="--vz-modal-width: 900px;" header-class="p-3 bg-light" :title="(!editable) ? 'Add Equipment' : 'Edit Equipment'" class="v-modal-custom" modal-class="zoomIn" centered no-close-on-backdrop>
        <form class="customform">
            <BRow class="g-3 mt-1">
                <BCol lg="4" class="mt-1"> 
                    <InputLabel value="Code" :message="form.errors.code"/>
                    <TextInput v-model="form.code" type="text" class="form-control" placeholder="Please enter code" @input="handleInput('code')" :light="true"/>
                </BCol>
                <BCol lg="8" class="mt-1"> 
                    <InputLabel value="Name" :message="form.errors.name"/>
                    <TextInput v-model="form.name" type="text" class="form-control" placeholder="Please enter name" @input="handleInput('name')" :light="true"/>
                </BCol>
                <BCol lg="4" class="mt-0"> 
                    <InputLabel value="Brand" :message="form.errors.brand"/>
                    <TextInput v-model="form.brand" type="text" class="form-control" placeholder="Please enter brand" @input="handleInput('brand')" :light="true"/>
                </BCol>
                <BCol lg="4" class="mt-0"> 
                    <InputLabel value="Model" :message="form.errors.model"/>
                    <TextInput v-model="form.model" type="text" class="form-control" placeholder="Please enter model" @input="handleInput('model')" :light="true"/>
                </BCol>
                <BCol lg="4" class="mt-0"> 
                    <InputLabel value="Price" :message="form.errors.price"/>
                    <Amount @amount="amount" ref="testing" :readonly="false" @input="handleInput('price')"/>
                </BCol>
                <BCol lg="12">
                    <hr class="text-muted mt-0 mb-2"/>
                </BCol>
                
                <BCol lg="4" class="mt-0">
                    <InputLabel value="Acquired Date" :message="form.errors.acquired_at"/>
                    <TextInput v-model="form.acquired_at" type="date" class="form-control" placeholder="Please select date" @input="handleInput('acquired_at')" :light="true"/>
                </BCol>
                <BCol lg="4" class="mt-0"> 
                    <InputLabel value="Station" :message="form.errors.station_id"/>
                    <Multiselect 
                    :options="stations" 
                    v-model="form.station_id" 
                    label="name"
                    @input="handleInput('station_id')"
                    placeholder="Select Station"/>
                </BCol>
                <BCol lg="4" class="mt-0"> 
                    <InputLabel value="Maintenance Plan" :message="form.errors.maintenance_plan"/>
                    <Multiselect 
                    :options="['6 months','1 year','2 years','Not Available']" 
                    v-model="form.maintenance_plan" 
                    label="name"
                    @input="handleInput('maintenance_plan')"
                    placeholder="Select plan"/>
                </BCol>
            </BRow>
        </form>
        <template v-slot:footer>
            <b-button @click="hide()" variant="light" block>Cancel</b-button>
            <b-button v-if="editable" @click="submit('ok')" variant="primary" :disabled="form.processing" block>Update</b-button>
            <b-button v-else @click="submit('ok')" variant="primary" :disabled="form.processing" block>Submit</b-button>
        </template>
    </b-modal>
</template>
<script>
import _ from 'lodash';
import { useForm } from '@inertiajs/vue3';
import Multiselect from "@vueform/multiselect";
import Amount from '@/Shared/Components/Forms/Amount.vue';
import InputLabel from '@/Shared/Components/Forms/InputLabel.vue';
import TextInput from '@/Shared/Components/Forms/TextInput.vue';
export default {
    props: ['stations'],
    components: { InputLabel, TextInput, Multiselect, Amount},
    data(){
        return {
            currentUrl: window.location.origin,
            form: useForm({
                id: null,
                code: null,
                name: null,
                brand: null,
                model: null,
                price: null,
                maintenance_plan: null,
                station_id: null,
                acquired_at: null,
            }),
            showModal: false,
            editable: false
        }
    },
    methods: { 
        show(){
            this.showModal = true;
        },
        edit(data){
            const p = data.price.replace(/[₱,]/g, "");
            this.form.id = data.id;
            this.form.code = data.code;
            this.form.name = data.name;
            this.form.brand = data.brand;
            this.form.model = data.model;
            this.form.price = p;
            this.form.maintenance_plan = data.maintenance_plan;
            this.form.station_id = data.station_id;
            this.form.acquired_at = (data.acquired_at == '-' || data.acquired_at == null) ? null : data.acquired_at;
            this.editable = true;
            this.showModal = true;
            this.$nextTick(() => {
                if (this.$refs.testing) {
                    this.$refs.testing.emitValue(p);
                }
            });
        },
        submit(){
            if(this.editable){
                this.form.put('/equipments/update',{
                    preserveScroll: true,
                    onSuccess: (response) => {
                        this.form.reset();
                        this.$emit('message',true);
                        this.hide();
                    }
                });
            }else{
                this.form.post('/equipments',{
                    preserveScroll: true,
                    onSuccess: (response) => {
                        this.form.reset();
                        this.$emit('message',true);
                        this.hide();
                    },
                });
            }
        },
        handleInput(field) {
            this.form.errors[field] = false;
        },
        amount(val){
            this.form.price = val;
        },
        hide(){
            this.form.reset();
            this.editable = false;
            this.showModal = false;
        }
    }
}
</script>