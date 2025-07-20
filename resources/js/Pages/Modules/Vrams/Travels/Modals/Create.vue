<template>
     <!-- style="--vz-modal-width: 750px;" -->
    <b-modal v-model="showModal" style="--vz-modal-width: 750px;" header-class="p-3 bg-light" title="File Travel Order" class="v-modal-custom" modal-class="zoomIn" centered no-close-on-backdrop>
        <form class="customform">
            <BRow class="g-3">
                <BCol lg="12" class="mt-2">
                    <InputLabel for="name" value="Purpose" :message="form.errors.purpose"/>
                    <TextInput id="name" v-model="form.purpose" type="text" class="form-control" placeholder="Please enter purpose" @input="handleInput('purpose')" :light="true"/>
                </BCol>
                <BCol lg="6" class="mt-0">
                    <InputLabel for="name" value="Destination" :message="form.errors.destination"/>
                    <TextInput id="name" v-model="form.destination" type="text" class="form-control" placeholder="Please enter destination" @input="handleInput('destination')" :light="true"/>
                </BCol>
                <BCol lg="6" class="mt-0">
                    <InputLabel for="name" value="Remarks" :message="form.errors.remarks"/>
                    <TextInput id="name" v-model="form.remarks" type="text" class="form-control" placeholder="Please enter remarks" @input="handleInput('remarks')" :light="true"/>
                </BCol>

                <BCol lg="12">
                    <hr class="text-muted mt-n1"/>
                </BCol>

                <BCol lg="6" class="mt-n2">
                    <InputLabel for="name" value="Mode of Travel" :message="form.errors.type_id"/>
                    <Multiselect
                        v-model="form.mode_id" 
                        :options="dropdowns.modes"
                        label="name"
                        placeholder="Select type"
                    />
                </BCol>
                <BCol lg="4" class="mt-n2"> 
                    <label>Travel Date <span v-if="form.errors.date" class="text-danger" style="font-size: 9px;">({{ form.errors.date }})</span></label>
                    <div>
                        <flat-pickr ref="datepicker" 
                        placeholder="Select date" 
                        v-model="form.date" 
                        :config="config"
                        class="form-control flatpickr-input" id="calendar">
                        </flat-pickr>
                    </div>
                </BCol>
                <BCol lg="2" class="mt-n2">
                    <InputLabel for="name" value="Time"/>
                    <TextInput id="name" v-model="form.time" type="time" class="form-control" placeholder="Please enter time" @input="handleInput('time')" :light="true"/>
                </BCol>
                <BCol lg="6" class="mt-0">
                    <InputLabel for="name" value="Travel Expense" :message="form.errors.expense_id"/>
                    <Multiselect
                        v-model="form.expense_id" 
                        :options="dropdowns.expenses"
                        label="name"
                        placeholder="Select type"
                    />
                </BCol>
                <BCol lg="6" class="mt-0">
                    <InputLabel for="name" value="Travel Document" />
                    <TextInput id="name" v-model="form.document" type="file" class="form-control" placeholder="Please enter time" @input="handleInput('document')" :light="true"/>
                </BCol>

                <BCol lg="12">
                    <hr class="text-muted mt-n1 mb-3"/>
                </BCol>

                <BCol lg="12" style="margin-top: 0px; margin-bottom: -5px;">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="custom-control custom-radio mb-1">
                                <input type="checkbox" id="customRadio1" class="form-check-input me-2" value="1" v-model="form.expenses">
                                <label class="custom-control-label fw-normal fs-12" for="customRadio1">Accommodation <span class="text-muted">(Actual)</span></label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="custom-control custom-radio mb-1">
                                <input type="checkbox" id="customRadio2" class="form-check-input me-2" value="2" v-model="form.expenses">
                                <label class="custom-control-label fw-normal fs-12" for="customRadio2">Accommodation <span class="text-muted">(Per Diem)</span></label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="custom-control custom-radio">
                                <input type="checkbox" id="customRadio3" class="form-check-input me-2" value="3" v-model="form.expenses">
                                <label class="custom-control-label fw-normal fs-12" for="customRadio3">Incidental Expenses</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="custom-control custom-radio">
                                <input type="checkbox" id="customRadio4" class="form-check-input me-2" value="4" v-model="form.expenses">
                                <label class="custom-control-label fw-normal fs-12" for="customRadio4">Meals</label>
                            </div>
                        </div>
                    </div>
                </BCol>
            </BRow>
        </form> 
        
   
        <template v-slot:footer>
            <b-button @click="hide()" variant="light" block>Cancel</b-button>
            <b-button @click="submit('ok')" variant="primary" :disabled="form.processing" block>Submit</b-button>
        </template>
    </b-modal>
</template>
<script>
import { useForm } from '@inertiajs/vue3';
import flatPickr from "vue-flatpickr-component";
import Multiselect from "@vueform/multiselect";
import InputLabel from '@/Shared/Components/Forms/InputLabel.vue';
import TextInput from '@/Shared/Components/Forms/TextInput.vue';
import Textarea from '@/Shared/Components/Forms/Textarea.vue';
export default {
    components: { Multiselect, InputLabel, TextInput, Textarea, flatPickr },
    props: ['dropdowns'],
    data(){
        return {
            currentUrl: window.location.origin,
            form: useForm({
                destination: null,
                purpose: null,
                remarks: null,
                date: null,
                time: null,
                mode_id: null,                
                expense_id: null,
                expenses: []
            }),
            config: {
                enableTime: false,
                altInput: true,
                dateFormat: "Y-m-d H:i:S",
                altFormat: "M d, Y",
                mode: "range"
            },
            showModal: false
        }
    },
    methods: { 
        show(data){
            this.selected = data;
            this.showModal = true;
        },
        submit(){
            this.form.post('/travels',{
                preserveScroll: true,
                onSuccess: (response) => {
                    this.form.clearErrors();
                    this.form.reset();
                    this.hide();
                },
            });
        },
        formatDate(date) {
            const d = new Date(date);
            const year = d.getFullYear();
            const month = String(d.getMonth() + 1).padStart(2, '0');
            const day = String(d.getDate()).padStart(2, '0');
            return `${year}-${month}-${day}`;
        },
        handleInput(field) {
            this.form.errors[field] = false;
        },
        hide(){
            this.showModal = false;
        }
    }
}
</script>