    
<template>
    <BModal v-model="showModal" style="--vz-modal-width: 1000px;" hide-footer body-class="p-0" header-class="p-0"
        class="v-modal-custom" content-class="border-0" centered hide-header-close>
        <div class="modal-body login-modal p-5">
            <h5 class="text-white fs-18 mb-1 mt-n4">Employee Form</h5>
            <p class="text-white-50 fs-12 mb-4">Please fill out the form carefully to ensure all information is accurate.</p>
            <div class="vstack gap-2 justify-content-center">
               <form class="customform mb-n5">
                    <BRow class="g-3 mb-4"> 
                        <BCol lg="12" class="mt-n2 mb-0">
                            <hr class="text-muted"/>
                        </BCol>
                        <BCol lg="12" class="mt-n1">
                            <InputLabel for="name" value="Fullname" :color="'white'" :message="form.errors.firstname"/>
                              <b-row class="g-3 mt-n3">
                                <b-col lg>
                                    <div class="input-group mb-0">
                                        <input type="text" v-model="form.firstname" placeholder="Firstname" class="form-control" style="width: 25%;">
                                        <input type="text" v-model="form.middlename" placeholder="Middlename" class="form-control" style="width: 25%;">
                                        <input type="text" v-model="form.lastname" placeholder="Lastname" class="form-control" style="width: 25%;">
                                        <input type="text" v-model="form.suffix" placeholder="Suffix" class="form-control" style="width: 25%;">
                                    </div>
                                </b-col>
                            </b-row>
                        </BCol>
                        <BCol lg="3" class="mt-0">
                            <InputLabel for="name" value="Username" :color="'white'" :message="form.errors.email"/>
                            <TextInput id="name" v-model="form.username" type="text" class="form-control" placeholder="Please enter username" @input="handleInput('email')" :light="true"/>
                        </BCol>
                        <BCol lg="3" class="mt-0">
                            <InputLabel for="name" value="Email Address" :color="'white'" :message="form.errors.email"/>
                            <TextInput id="name" v-model="form.email" type="email" class="form-control" placeholder="Please enter email" @input="handleInput('email')" :light="true"/>
                        </BCol>
                        <BCol lg="3" class="mt-0">
                            <InputLabel for="name" value="Contact no." :color="'white'" :message="form.errors.contact_no"/>
                            <TextInput id="name" v-model="form.contact_no" type="text" class="form-control" placeholder="Please enter contact no." @input="handleInput('contact_no')" :light="true"/>
                        </BCol>
                        <BCol lg="3" class="mt-0">
                            <InputLabel for="name" value="Birthdate" :color="'white'" :message="form.errors.email"/>
                            <TextInput id="name" v-model="form.birthdate" type="date" class="form-control" placeholder="Please enter birthdate" @input="handleInput('birthdate')" :light="true"/>
                        </BCol>
                        <BCol lg="3" class="mt-0">
                            <InputLabel for="name" value="Sex" :color="'white'" :message="form.errors.sex"/>
                            <Multiselect :options="['Male','Female']" :searchable="true" label="name" v-model="form.sex" placeholder="Select Sex" @input="handleInput('sex')"/>
                        </BCol>
                        <BCol lg="3" class="mt-0">
                            <InputLabel for="name" value="Marital Status" :color="'white'" :message="form.errors.marital_id"/>
                            <Multiselect :options="dropdowns.maritals" :searchable="true" label="name" v-model="form.marital_id" placeholder="Select Marital Status" @input="handleInput('marital_id')"/>
                        </BCol>
                        <BCol lg="3" class="mt-0">
                            <InputLabel for="name" value="Religion" :color="'white'" :message="form.errors.religion_id"/>
                            <Multiselect :options="dropdowns.religions" :searchable="true" label="name" v-model="form.religion_id" placeholder="Select Religion" @input="handleInput('religion_id')"/>
                        </BCol>
                        <BCol lg="3" class="mt-0">
                            <InputLabel for="name" value="Blood Type" :color="'white'" :message="form.errors.blood_id"/>
                            <Multiselect :options="dropdowns.bloods" :searchable="true" label="name" v-model="form.blood_id" placeholder="Select Blood Type" @input="handleInput('blood_id')"/>
                        </BCol>
                        
                    </BRow>
               </form>
            </div>
        </div>
        
        <div class="modal-body p-5">
            <form class="customform">
                <BRow class="g-3" style="margin-top: -30px;"> 
                    <BCol lg="12" class="mt-n3 mb-n4"><hr class="text-muted"/></BCol><BCol lg="12" style="margin-top: 13px; margin-bottom: -5px;">
                        <div class="d-flex position-relative">
                            <div class="flex-shrink-0 fs-12" :class="(form.errors.status || form.errors.statusothers) ? 'text-danger' : ''" :style="(form.status == 'Others') ? 'margin-top: 6px' : ''">
                                Employment Status :
                            </div>
                            <div class="flex-grow-1 ms-2"></div>
                            <div class="flex-shrink-0">
                                <div class="d-inline-block" v-for="(list,index) in dropdowns.employment_statuses"  v-bind:key="index">
                                    <div class="custom-control custom-radio mb-3 ms-4">
                                        <input type="radio" id="customRadio1" class="custom-control-input me-2" @input="handleInput('type_id')" :value="list.value" v-model="form.type_id">
                                        <label class="custom-control-label fs-12 fw-normal" for="customRadio1">{{list.name}}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </BCol>
                   <BCol lg="12" class="mt-n3 mb-n4"><hr class="text-muted"/></BCol>
                    <BCol lg="6" class="mt-3">
                        <InputLabel for="name" value="Division" :message="form.errors.division_id"/>
                        <Multiselect :options="dropdowns.divisions" :searchable="true" label="name" v-model="form.division_id" placeholder="Select Division" @input="handleInput('division_id')"/>
                    </BCol>
                    <BCol lg="6" class="mt-3">
                        <InputLabel for="name" value="Station" :message="form.errors.station_id"/>
                        <Multiselect :options="dropdowns.stations" :searchable="true" label="name" v-model="form.station_id" placeholder="Select Category" @input="handleInput('station_id')"/>
                    </BCol>
                    <BCol lg="6" class="mt-1">
                        <InputLabel for="name" value="Unit" :message="form.errors.unit_id"/>
                        <Multiselect :options="units" :searchable="true" label="name" v-model="form.unit_id" placeholder="Select Unit" @input="handleInput('unit_id')"/>
                    </BCol>
                    <BCol lg="6" class="mt-1">
                        <InputLabel for="name" value="Position" :message="form.errors.position_id"/>
                        <Multiselect :options="filteredPositions" :searchable="true" label="name" v-model="form.position_id" placeholder="Select Position" @input="handleInput('position_id')"/>
                    </BCol>
                    <BCol lg="12" class="mt-0"><hr class="text-muted"/></BCol>
                    <div class="mt-n1 ms-2 form-check">
                        <input type="checkbox" v-model="form.check" class="form-check-input" id="checkTerms">
                        <label class="form-check-label" for="checkTerms">I agree to the <span class="fw-semibold">Terms of Service</span> and Privacy Policy</label>
                    </div>
                </BRow>
             
                <div class="text-end mt-2">
                    <button @click="submit('ok')" class="btn btn-primary btn-md" type="button" :disabled="!form.check">
                        <div class="btn-content">Submit Now</div>
                    </button>
                </div>
            </form>
        </div>
    </BModal>
</template>
<script>
import { useForm } from '@inertiajs/vue3';
import Multiselect from "@vueform/multiselect";
import InputLabel from '@/Shared/Components/Forms/InputLabel.vue';
import TextInput from '@/Shared/Components/Forms/TextInput.vue';
export default { 
    layout: null,
    components: {Multiselect, InputLabel, TextInput },
    props: ['dropdowns'],
    data() {
        return {
            showModal: false,
            form: useForm({
                firstname: null,
                middlename: null,
                lastname: null,
                suffix: null,
                username: null,
                contact_no: null,
                email: null,
                birthdate: null,
                sex: null,
                marital_id: null,
                blood_id: null,
                religion_id: null,
                division_id: null,
                station_id: null,
                position_id: null,
                unit_id: null,
                type_id: null,
                option: 'employee'
            }),
            units: [],
            filteredPositions: []
        };
    },
    watch: {
        "form.division_id"(newVal){
            if(!newVal){
                this.units = [];
                this.form.unit_id = null;
            }
            this.fetchUnits(newVal);
        },
        "form.type_id"(newVal){
            if (newVal === 15) {
                this.filteredPositions = this.dropdowns.positions.map(item => ({
                    value: item.value,
                    name: item.special !== '-' ? item.special : item.administrative
                }));
            } else {
                this.filteredPositions = this.dropdowns.positions.map(item => ({
                    value: item.value,
                    name: item.administrative
                }));
            }
        },
    },
    methods: {
        show(){
            this.showModal = true;
        },
        submit(){
            this.form.post('/employees',{
                preserveScroll: true,
                onSuccess: (response) => {
                    this.form.clearErrors();
                    this.form.reset();
                    this.hide();
                },
            });
        },
        fetchUnits(code){
            axios.get('/search',{
                params: {
                    option: 'units',
                    code: code
                }
            })
            .then(response => {
                this.units = response.data;
            })
            .catch(err => console.log(err));
        },
        handleInput(field) {
            this.form.errors[field] = false;
        },
        hide(){
            this.showModal = false;
        },
    },
};
</script>