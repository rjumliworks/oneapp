<template>
    <!-- style="--vz-modal-width: 600px;" -->
    <b-modal v-model="showModal" style="--vz-modal-width: 700px;" header-class="p-3 bg-light" title="Add Employee" class="v-modal-custom" modal-class="zoomIn" centered no-close-on-backdrop>
        <form class="customform">
            <BRow class="g-3">
                <BCol lg="12" class="mt-3">
                    <div class="d-flex">
                        <div style="width: 100%;">
                            <InputLabel for="name" value="Employee Selection Mode" :message="form.errors.year"/>
                            <Multiselect :options="['All Regular Employees','Custom Employees','Except Employees']" v-model="form.type" label="name" :allow-empty="false" :searchable="true" placeholder="Select Month" />
                        </div>
                        <div class="flex-shrink-0" v-if="form.type != 'All Regular Employees'">
                            <b-button @click="openAdd()" style="margin-top: 20px;" variant="light" class="waves-effect waves-light ms-1"><i class="ri-add-circle-fill"></i></b-button>
                        </div>
                    </div>
                </BCol>
                <BCol lg="12" class="mt-0" v-if="form.type">
                    <hr class="text-muted"/>
                </BCol>
                <BCol lg="12" class="mt-0" v-if="form.type == 'All Regular Employees'">
                    <div class="alert alert-primary alert-dismissible alert-label-icon rounded-label fade show material-shadow" role="alert">
                        <i class="ri-user-smile-line label-icon"></i>All <b>regular employees</b> will be automatically included in this payroll cutoff.
                    </div>
                </BCol>
                <BCol lg="12" class="mt-0" v-if="form.type == 'Custom Employees'">
                    <div class="alert alert-warning alert-dismissible alert-label-icon rounded-label fade show material-shadow" role="alert">
                        <i class="ri-user-smile-line label-icon"></i>Select <b>specific employees</b> to include in this payroll cutoff.
                    </div>
                </BCol>
                <BCol lg="12" class="mt-0" v-if="form.type == 'Except Employees'">
                    <div class="alert alert-danger alert-dismissible alert-label-icon rounded-label fade show material-shadow" role="alert">
                        <i class="ri-user-smile-line label-icon"></i>All regular employees will be included <b>except</b> those you manually exclude.
                    </div>
                </BCol>
                 <BCol lg="12" class="mt-n1">
                    <div class="col-sm-auto">
                        <div class="avatar-group">
                            <div class="avatar-group-item material-shadow"  v-for="(list, index) of employees" :key="index">
                                <a href="javascript: void(0);" class="d-inline-block" v-b-tooltip.hover :title="list.name">
                                    <img :src="list.avatar" alt="" class="rounded-circle avatar-xs">
                                </a>
                            </div>
                        </div>
                    </div>
                </BCol>
            </BRow>
        </form>

        <template v-slot:footer>
            <b-button @click="hide()" variant="light" block>Close</b-button>
            <b-button @click="submit('ok')" variant="primary" :disabled="form.processing" block>Submit</b-button>
        </template>
    </b-modal>
    <Add :is_regular="is_regular" @users="updateUsers" ref="add"/>
</template>

<script>
import _ from 'lodash';
import Add from './Add.vue';
import { useForm } from '@inertiajs/vue3';
import Multiselect from "@vueform/multiselect";
import InputLabel from '@/Shared/Components/Forms/InputLabel.vue';
import TextInput from '@/Shared/Components/Forms/TextInput.vue';
export default {
    components: { Multiselect, TextInput, InputLabel, Add },
    props: ['is_regular','id'],
    data(){
        return {
            currentUrl: window.location.origin,
            form: useForm({
                id: this.id,
                type: null,
                users: [],
                option: 'users'
            }),
            employees: [],
            keyword: null,
            showModal: false
        }
    },
    watch: {
        "form.type"(newVal){
            this.form.users = [];
        }
    },
    methods: { 
        show(){
            this.showModal = true;
        },
        openAdd(){
            this.$refs.add.show();
        },
        updateUsers(data){
            data.forEach(user => {
                if (!this.form.users.some(u => u === user.value)) {
                    this.form.users.unshift(user.value);
                    this.employees.unshift(user);
                }
            });
        },
        submit(){
            this.form.post('/payrolls',{
                preserveScroll: true,
                onSuccess: (response) => {
                    this.$emit('update',response.props.flash.data.data)
                    this.hide();
                },
            });
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