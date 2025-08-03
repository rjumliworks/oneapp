<template>
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

                <BCol lg="12" class="mt-0 mb-0">
                    <InputLabel for="role" value="Employees" :message="form.errors.tags"/>
                    <Multiselect
                        v-model="form.tags"
                        :options="employees"
                        mode="tags"
                        @search-change="checkSearchStr"
                        :multiple="true"
                        :searchable="true"
                        :loading="isLoading"
                        label="name"
                        :preserve-search="true"
                        :filter-results="false"
                        placeholder="Select Employee"
                        ref="multiselect2"
                        />
                </BCol>

                <BCol lg="12">
                    <hr class="text-muted mt-n1"/>
                </BCol>

                <BCol lg="6" class="mt-n2"> 
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
                <BCol lg="6" class="mt-n2">
                    <InputLabel for="name" value="Time" :message="form.errors.time"/>
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
                    <InputLabel for="name" value="Mode of Travel" :message="form.errors.mode_id"/>
                    <Multiselect
                        v-model="form.mode_id" 
                        :options="dropdowns.modes"
                        label="name"
                        placeholder="Select type"
                    />
                </BCol>

                <BCol lg="12">
                    <hr class="text-muted mt-0 mb-1"/>
                    <span class="fs-11">Please check the expenses that apply to this travel request : <span class="text-danger">{{ form.errors.expenses }}</span></span>
                    <hr class="text-muted mt-1 mb-3"/>
                </BCol>

                <BCol lg="12" style="margin-top: 0px; margin-bottom: -5px;">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="custom-control custom-radio mb-1">
                                <input type="checkbox" id="customRadio1" class="form-check-input me-2" :value="1" v-model="form.expenses" :disabled="form.expenses.includes('2')">
                                <label class="custom-control-label fw-normal fs-12" for="customRadio1">Accommodation <span class="text-muted">(Actual)</span></label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="custom-control custom-radio mb-1">
                                <input type="checkbox" id="customRadio2" class="form-check-input me-2" :value="2" v-model="form.expenses" :disabled="form.expenses.includes('1')">
                                <label class="custom-control-label fw-normal fs-12" for="customRadio2">Accommodation <span class="text-muted">(Per Diem)</span></label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="custom-control custom-radio">
                                <input type="checkbox" id="customRadio3" class="form-check-input me-2" :value="3" v-model="form.expenses">
                                <label class="custom-control-label fw-normal fs-12" for="customRadio3">Incidental Expenses</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="custom-control custom-radio">
                                <input type="checkbox" id="customRadio4" class="form-check-input me-2" :value="4" v-model="form.expenses">
                                <label class="custom-control-label fw-normal fs-12" for="customRadio4">Meals</label>
                            </div>
                        </div>
                    </div>
                </BCol>

                <BCol lg="12">
                    <hr class="text-muted mt-0 mb-0"/>
                </BCol>

                <BCol lg="12">
                    <file-pond name="pdf" ref="pond" allow-multiple="false" max-files="1" accepted-file-types="application/pdf"
                    label-idle='Drag & Drop your PDF or <span class="filepond--label-action">Browse</span>' 
                    :allow-process="false" @addfile="handleAddFile"/>
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
import _ from 'lodash';
import { useForm } from '@inertiajs/vue3';
import flatPickr from "vue-flatpickr-component";
import Multiselect from "@vueform/multiselect";
import vueFilePond from 'vue-filepond';
import 'filepond/dist/filepond.min.css';
import FilePondPluginFileValidateType from 'filepond-plugin-file-validate-type';
const FilePond = vueFilePond(FilePondPluginFileValidateType);
import InputLabel from '@/Shared/Components/Forms/InputLabel.vue';
import TextInput from '@/Shared/Components/Forms/TextInput.vue';
export default {
    components: { Multiselect, InputLabel, TextInput, flatPickr, FilePond },
    props: ['dropdowns'],
    data(){
        return {
            currentUrl: window.location.origin,
            form: useForm({
                destination: null,
                document: null,
                purpose: null,
                remarks: null,
                date: null,
                time: null,
                mode_id: null,                
                expense_id: null,
                expenses: [],
                tags: []
            }),
            config: {
                enableTime: false,
                altInput: true,
                dateFormat: "Y-m-d",
                altFormat: "M d, Y",
                mode: "range"
            },
            employees: [],
            isLoading: false,
            showModal: false
        }
    },
    watch: {
        'form.expenses'(val) {
            if (val.includes('1') && val.includes('2')) {
                const last = val[val.length - 1];
                this.form.expenses = [last];
            }
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
                forceFormData: true, 
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
        checkSearchStr: _.debounce(function(string) {
            (string) ? this.searchUser(string) : '';
        }, 300),
        searchUser(string){
            axios.get('/search',{
                params: {
                    option: 'users',
                    keyword: string
                }
            })
            .then(response => {
                this.employees = response.data;
            })
            .catch(err => console.log(err));
        },      
        handleAddFile(error, fileItem) {
            if (error) return console.error('FilePond error:', error);
            this.form.document = fileItem.file;
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