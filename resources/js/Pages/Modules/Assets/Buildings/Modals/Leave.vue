<template>
     <!-- style="--vz-modal-width: 750px;" -->
    <b-modal v-model="showModal" style="--vz-modal-width: 700px;" header-class="p-3 bg-light" title="Application for Leave" class="v-modal-custom" modal-class="zoomIn" centered no-close-on-backdrop>
            
        <form class="customform">
            <BRow class="g-3 mdiv">
                <!-- <BCol lg="12" class="mt-3">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="d-flex border border-dashed rounded p-3">
                                <div class="flex-shrink-0 avatar-xs align-self-center me-3">
                                    <div class="avatar-title bg-light rounded-circle fs-16 text-primary">
                                        <i class="ri-calendar-todo-fill"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 overflow-hidden">
                                    <p class="mb-1 text-muted fs-12">Inclusives Dates :</p>
                                    <h6 class="text-truncate fw-semibold fs-13 mb-0">{{formattedDate}}</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex border border-dashed rounded p-3">
                                <div class="flex-shrink-0 avatar-xs align-self-center me-3">
                                    <div class="avatar-title bg-light rounded-circle fs-16 text-primary">
                                        <i class="ri-calendar-2-fill"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 overflow-hidden">
                                    <p class="mb-1 text-muted fs-12">No. of working days applied for :</p>
                                    <h6 class="text-truncate fw-semibold fs-13 mb-0">{{totalDays}} <span>{{ form.dates.length > 1 ? 'days' : 'day' }}</span></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </BCol>
                <BCol lg="12" class="mt-0"><hr class="text-muted"/></BCol> mt-n1 -->
                <BCol :lg="!form.type?.required_document ? 6 : 12" class="mt-3"> 
                    <InputLabel for="name" value="Type of Leave" :message="form.errors.type_id"/>
                    <Multiselect
                        v-model="form.type" :groups="true"
                        :options="dropdowns.options"
                        label="label"
                        object
                        placeholder="Select type"
                    />
                </BCol>
                <BCol lg="6" :class="!form.type?.required_document ? 'mt-3' : 'mt-2'">
                    <InputLabel for="name" value="Details of Leave" :message="form.errors.detail_id"/>
                    <Multiselect :options="filteredDetails" :searchable="true" label="name" object v-model="form.detail" placeholder="Select Detail" @input="handleInput('detail_id')"/>
                </BCol>
                <BCol v-if="!!form.type?.required_document" lg="6" class="mt-2">
                    <InputLabel for="name" value="Document" :message="form.errors.document"/>
                    <input
                        id="document"
                        type="file"
                        class="form-control"
                        @change="form.document = $event.target.files[0]"
                    />
                </BCol>
                <BCol lg="12" v-if="form.detail?.others === 'specify' || form.detail?.others === 'specify illness' || form.detail?.others === 'specify reason'" class="mt-1 mb-n1">
                    <InputLabel for="name" value="Details" :message="form.errors.details"/>
                    <TextInput id="name" v-model="form.details" type="text" class="form-control" :placeholder="form.detail.others" @input="handleInput('details')" :light="true"/>
                </BCol>
                <BCol lg="12" class="mt-0"><hr class="text-muted"/></BCol>
                <BCol lg="12" class="mt-0">
                    <Multiselect :options="['Single Day','Range','Multiple Dates (non-continuous)']" v-model="dateType" placeholder="Select Date type"/>
                </BCol>
                <template v-if="dateType == 'Single Day'">
                    <BCol lg="6" class="mt-1">
                        <InputLabel for="name" value="Inclusive Dates"  :message="form.errors.dates"/>
                        <flat-pickr v-model="date" :config="single" placeholder="Select date" class="form-control flatpickr-input" style="min-height: 38.4px !important; border-color: #e9ebec; background-color: #f5f6f7;"></flat-pickr>
                    </BCol>
                    <BCol lg="6" class="mt-1">
                        <InputLabel for="name" value="Time of Day"  :message="form.errors.date"/>
                        <Multiselect :options="['Whole Day','AM','PM']" label="name" v-model="form.timeOfDay" placeholder="Select Date type"/>
                    </BCol>
                </template>
                <template v-if="dateType == 'Range'">
                    <BCol lg="12" class="mt-1">
                        <div class="d-flex">
                            <div style="width: 100%;">
                                <InputLabel for="name" value="Inclusive Dates"  :message="form.errors.dates"/>
                                <flat-pickr v-model="date" :config="range" placeholder="Select date" class="form-control flatpickr-input" style="min-height: 38.4px !important; border-color: #e9ebec; background-color: #f5f6f7;" @input="handleInput('dates')"></flat-pickr>
                            </div>
                            <div class="flex-shrink-0">
                                <b-button @click="openDates()" style="margin-top: 20px;" variant="light" class="waves-effect waves-light ms-1"><i class="ri-calendar-fill"></i></b-button>
                            </div>
                        </div>
                    </BCol>
                </template>
                <template v-if="dateType == 'Multiple Dates (non-continuous)'">
                    <BCol lg="12" class="mt-1">
                        <div class="d-flex">
                            <div style="width: 100%;">
                                <InputLabel for="name" value="Inclusive Dates"  :message="form.errors.dates"/>
                                <flat-pickr v-model="date" :config="multiple" placeholder="Select dates" class="form-control flatpickr-input" style="min-height: 38.4px !important; border-color: #e9ebec; background-color: #f5f6f7;"></flat-pickr>
                            </div>
                            <div class="flex-shrink-0">
                                <b-button @click="openDates()" style="margin-top: 20px;" variant="light" class="waves-effect waves-light ms-1"><i class="ri-calendar-fill"></i></b-button>
                            </div>
                        </div>
                    </BCol>
                </template>
            </BRow>
        </form>
        <template v-if="form.type && form.dates && form.dates.length > 0">
            <form>
                <BRow>
                    <BCol lg="12" class="mt-0"><hr class="text-muted"/></BCol>
                    <BCol lg="12">
                        <!-- <div v-for="(type, index) in form.types" :key="index" >
                            <div class="input-group mb-1">
                                <span @click="openTypes" class="input-group-text" style="cursor: pointer;"><i class="ri-add-circle-fill search-icon"></i></span>
                                <input type="text" :value="type.name" class="form-control" style="width: 40%;" readonly>
                                <input type="text" :value="type.balance"  class="text-center form-control" style="width: 10%;" readonly>
                            </div>
                        </div> -->
                         <div v-if="(totalBalance+totalBorrowed) < totalDays" class="alert alert-warning alert-dismissible alert-label-icon label-arrow" role="alert">
                            <i @click="openTypes" class="ri-add-circle-fill label-icon" style="cursor: pointer;"></i>Please borrow from another leave type to proceed.
                        </div>
                        <div v-else-if="(totalBalance+totalBorrowed) >= totalDays" class="alert alert-success alert-dismissible alert-label-icon label-arrow" role="alert">
                            <i @click="openTypes" class="ri-add-circle-fill label-icon" style="cursor: pointer;"></i>You have enough leave credits to file this leave.
                        </div>
                        <div class="table-responsive bg-white">
                            <table class="table align-middle table-bordered table-centered mb-0">
                                
                                <thead class="table-light thead-fixed">
                                    <tr class="fs-11">
                                        <th style="width: 40%;" class="text-center">Leave Type</th>
                                        <th style="width: 20%;" class="text-center">Earned</th>
                                        <th style="width: 20%;" class="text-center">Deducted</th>
                                        <th style="width: 20%;" class="text-center">Balance</th>
                                    </tr>
                                </thead>
                                <tbody class="table-white fs-12">
                                    <tr>
                                        <td class="text-center">{{ form.types[0].name }}</td>
                                        <td class="text-center">{{ form.types[0].balance }}</td>
                                        <td class="text-center">{{ Math.min(totalDays, form.types[0].balance) }}</td>
                                        <td class="text-center">{{ Math.max(form.types[0].balance - totalDays, 0) }}</td>
                                    </tr>
                                    <tr v-for="(list,index) in form.borrowers" v-bind:key="index" class="text-dark">
                                        <td class="text-center">{{ list.name }}</td>
                                        <td class="text-center">{{ list.balance }}</td>
                                        <td class="text-center">{{ list.borrow }}</td>
                                        <td class="text-center">{{ list.available }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        
                        <!-- <div class="alert alert-dismissible alert-additional mb-xl-0" :class="((totalBalance+totalBorrowed) >= totalDays) ? 'alert-success' : 'alert-warning'" role="alert">
                            <div class="alert-body">
                                <div v-for="(type, index) in form.types" :key="index" >
                                    <div class="input-group mb-1">
                                        <span @click="openTypes" class="input-group-text" style="cursor: pointer;"><i class="ri-add-circle-fill search-icon"></i></span>
                                        <input type="text" :value="type.name" class="form-control" style="width: 40%;" readonly>
                                        <input type="text" :value="type.balance"  class="text-center form-control" style="width: 10%;" readonly>
                                    </div>
                                </div>
                      
                                <div class="table-responsive bg-white" v-if="form.borrowers.length > 0">
                                    <table class="table align-middle table-bordered table-centered mb-0">
                                        
                                        <thead class="table-light thead-fixed">
                                            <tr class="fs-11">
                                                <th style="width: 40%;" class="text-center">Leave Type</th>
                                                <th style="width: 20%;" class="text-center">Earned</th>
                                                <th style="width: 20%;" class="text-center">Deducted</th>
                                                <th style="width: 20%;" class="text-center">Balance</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-white fs-12">
                                            <tr v-for="(list,index) in form.borrowers" v-bind:key="index" class="text-dark">
                                                <td class="text-center">{{ list.name }}</td>
                                                <td class="text-center">{{ list.balance }}</td>
                                                <td class="text-center">{{ list.available }}</td>
                                                <td class="text-center">{{ list.borrow }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="alert-content" v-if="(totalBalance+totalBorrowed) < totalDays">
                                <p class="mb-0 fs-12">
                                    Your selected leave type does not have enough balance to cover the requested days. <br/>
                                    Please borrow from another leave type to proceed.
                                </p>
                            </div>
                            <div class="alert-content" v-else-if="(totalBalance+totalBorrowed) >= totalDays">
                                <p class="mb-0 fs-12">
                                    You have enough leave credits to file this leave. <br/>
                                    Total available credits: {{ totalBalance + totalBorrowed }}, Total requested days: {{ totalDays }}.
                                </p>
                            </div>
                        </div> -->
                    </BCol>
                </BRow>
            </form>
        </template>
        <template v-slot:footer>
            <b-button @click="hide()" variant="light" block>Cancel</b-button>
            <b-button v-if="(totalBalance+totalBorrowed) >= totalDays" @click="submit('ok')" variant="primary" :disabled="form.processing" block>Submit</b-button>
        </template>
    </b-modal>
    <ViewDate @update="updateDates" ref="dates"/>
    <ViewType :options="dropdowns.options" @update="updateTypes" ref="types"/>
</template>
<script>
import ViewDate from './Date.vue';
import ViewType from './Type.vue';
import { useForm } from '@inertiajs/vue3';
import flatPickr from "vue-flatpickr-component";
import Multiselect from "@vueform/multiselect";
import InputLabel from '@/Shared/Components/Forms/InputLabel.vue';
import TextInput from '@/Shared/Components/Forms/TextInput.vue';
export default {
    components: { Multiselect, InputLabel, TextInput, flatPickr, ViewDate, ViewType },
    props: ['dropdowns'],
    data(){
        return {
            currentUrl: window.location.origin,
            form: useForm({
                user_id: null,
                type: null,
                type_id: null,
                detail: null,
                detail_id: null,
                details: null,
                timeOfDay: 'Whole Day',
                dates: [],
                document: null,
                date_type: null,
                types: [],
                borrowers: [],
                my_credits: 0,
                need_credits: 0,
                option: 'leave'
            }),
            date: null,
            single:{
                mode: "single",
                dateFormat: 'Y-m-d',
                altInput: true,
                altFormat: 'F j, Y',
                minDate: new Date().setDate(new Date().getDate() + 1),
                disable: [
                    function(date) {
                        return (date.getDay() === 0 || date.getDay() === 6);
                    }
                ]
            },
            range: {
                mode: "range",
                dateFormat: 'Y-m-d',
                altInput: true,
                altFormat: 'F j, Y',
                minDate:'',
            },
            multiple: {
                mode: "multiple",
                dateFormat: 'Y-m-d',
                altInput: true,
                altFormat: 'F j, Y',
                minDate: new Date().setDate(new Date().getDate() + 1),
                disable: [
                    function(date) {
                        return (date.getDay() === 0 || date.getDay() === 6);
                    }
                ]
            },
            dateType: null,
            showModal: false
        }
    },
    computed: {
        filteredDetails() {
            if (!this.form.type || !this.form.type.name) {
                return [];
            }
            const selectedTypeName = this.form.type.name;
            const matches = this.dropdowns.details.filter(detail => {
                if (!detail.type) return false;
                const typeArray = detail.type.split(',').map(val => val.trim());
                return typeArray.includes(selectedTypeName);
            });
            if (matches.length === 0) {
                const others = this.dropdowns.details.find(detail => detail.id === 24 || detail.value === 24);
                return others ? [others] : [];
            }
            if (matches.length == 1) {
                const others = this.dropdowns.details.find(detail => detail.type == this.form.type.name);
                if(others){
                    [others];
                    this.form.detail = others;
                }else{
                    [];
                }
            }
            return matches;
        },
        formattedDate() {
            if (!this.date) return '';
            
            // If it's a range or multiple dates, handle array
            if (Array.isArray(this.date)) {
                return this.date
                    .map(d => new Date(d).toLocaleDateString('en-US', {
                        year: 'numeric',
                        month: 'long',
                        day: 'numeric'
                    }))
                    .join(' to '); // or ', ' for multiple
            }

            // Single date
            return new Date(this.date).toLocaleDateString('en-US', {
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            });
        },
        totalBalance() {
            return this.form.types.reduce((sum, t) => sum + Number(t.balance || 0), 0)
        },
        totalBorrowed() {
            return (this.form.borrowers.length > 0) ? this.form.borrowers.reduce((sum, b) => sum + Number(b.borrow || 0), 0) : 0
        },
        totalDays() {
            return this.form.dates.reduce((sum, d) => {
            if (d.timeOfDay === 'AM' || d.timeOfDay === 'PM') {
                return sum + 0.5
            }
            if (d.timeOfDay === 'Whole Day') {
                return sum + 1
            }
            return sum
            }, 0)
        }
    },
    watch: {
        'form.detail': {
            immediate: true,
            handler(newVal) {
                if(newVal){
                    this.form.detail_id = newVal.value;
                }else{
                    this.form.detail_id = null;
                }
            }
        },
        'form.type': {
            immediate: true,
            handler(newVal) {
                this.form.dates = [];
                this.form.types = [];
                this.date = null;
                this.dateType = null;
                this.form.detail_id = null;
                this.form.details = null;
                this.form.errors.details = null;
                this.form.borrowers = [];
                if (!newVal || !newVal.name) {
                    this.form.detail = null;
                    this.form.document = null;
                    return;
                }
                if (!newVal.required_document) {
                    this.form.document = null; // 🔹 Clear previous file if new type doesn't need it
                }

                const selectedTypeName = newVal.name;
                const matches = this.dropdowns.details.filter(detail => {
                    if (!detail.type) return false;
                    const typeArray = detail.type.split(',').map(val => val.trim());
                    return typeArray.includes(selectedTypeName);
                });
                if (matches.length === 0) {
                    const others = this.dropdowns.details.find(
                        detail => detail.id === 24 || detail.value === 24
                    );
                    (others) ? this.form.detail = others : this.form.detail = null;
                } else {
                    const validIds = matches.map(d => d.id || d.value);
                    if (!validIds.includes(this.form.detail?.id || this.form.detail?.value)) {
                        this.form.detail = null; 
                    }
                }

                if (this.form.type && !this.form.type.is_after) {
                    this.single.minDate = new Date().setDate(new Date().getDate() + 1);
                    this.range.minDate = new Date().setDate(new Date().getDate() + 1);
                    this.multiple.minDate = new Date().setDate(new Date().getDate() + 1);
                }else{
                    this.single.minDate = null;
                    this.range.minDate = null;
                    this.multiple.minDate = null;
                }

                if(newVal){
                    this.form.type_id = newVal.type_id;
                    this.form.types.push({
                        ...newVal,
                        borrow: Math.min(this.totalDays, newVal.balance)
                    });
                }else{
                    this.form.type_id = null;
                }
            }
        },
        dateType(newVal){
            this.date = null;
            this.form.dates = [];
            this.form.borrowers = [];
        },
        check(newVal){
            (newVal) ? this.openDates() : '';
        },
        date(newVal) {
            if (!newVal) return;
            this.form.borrowers = [];
            
            if (this.dateType === 'Single Day') {
                this.form.dates = [{
                    date: this.formatDate(newVal),
                    timeOfDay: this.form.timeOfDay || 'Whole Day'
                }];
            }else if (this.dateType === 'Range') {
                const parts = newVal.split(' to ');
                if (parts.length === 2) {
                    const start = new Date(parts[0]);
                    const end = new Date(parts[1]);
                    const datesInRange = [];
                    for (let d = new Date(start); d <= end; d.setDate(d.getDate() + 1)) {
                        if (d.getDay() !== 0 && d.getDay() !== 6) {
                            datesInRange.push({
                                date: this.formatDate(new Date(d)),
                                timeOfDay: 'Whole Day'
                            });
                        }
                    }
                    this.form.dates = datesInRange;
                }
            }else if (this.dateType === 'Multiple Dates (non-continuous)') {
                const dateStrings = newVal.split(',').map(str => str.trim());
                this.form.dates = dateStrings.map(d => ({
                    date: this.formatDate(new Date(d)),
                    timeOfDay: 'Whole Day'
                }));
            }
            this.form.types[0].borrow = Math.min(this.totalDays, this.form.types[0].balance);
        },
        'form.timeOfDay'(val) {
            if (this.dateType === 'Single Day' && this.form.dates?.length === 1) {
                this.form.dates[0].timeOfDay = val;
            }
        }
    },
    methods: { 
        show(data){
            this.selected = data;
            this.showModal = true;
        },
        submit(){
            this.form.need_credits = this.totalDays;
            this.form.my_credits = this.totalBalance + this.totalBorrowed;
            this.form.date_type = this.dateType;
            this.form.post('/leaves',{
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
        formatDateWithWeekday(dateString) {
            const date = new Date(dateString);
            const day = date.getDate();
            const month = date.toLocaleString('en-US', { month: 'short' });
            const year = date.getFullYear();
            const weekday = date.toLocaleString('en-US', { weekday: 'long' });
            return `${month} ${day}, ${year} (${weekday})`;
        },
        openDates(){
            this.$refs.dates.show(this.form.dates);
        },
        openTypes(){
            this.$refs.types.show(this.form.types,this.totalDays);
        },
        updateDates(data){
            this.form.dates = data;
        },
        updateTypes(data){
            this.form.borrowers = data.borrowed || [];
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
<style scoped>
.multiselect__option--disabled {
    opacity: 0.5;
    cursor: not-allowed;
}
</style>