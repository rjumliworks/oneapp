<template>
    <!-- style="--vz-modal-width: 600px;" -->
    <b-modal v-model="showModal" header-class="p-3 bg-light" title="Add Deduction" class="v-modal-custom" modal-class="zoomIn" centered no-close-on-backdrop>
        <form class="customform">
            <BRow class="g-3">
                <BCol lg="12" class="mt-3">
                    <InputLabel for="name" value="Employee" :message="form.errors.payroll_id"/>
                    <Multiselect :options="users" v-model="form.payroll_id" label="name" :allow-empty="false" :searchable="true" placeholder="Select User" />
                </BCol>
                <BCol lg="12" class="mt-0">
                    <hr class="text-muted"/>
                </BCol>
                <BCol lg="12" class="mt-n2">
                    <InputLabel for="name" value="Deduction" :message="form.errors.deduction_id"/>
                    <Multiselect :options="filteredDeductions" v-model="form.deduction_id" label="name" :allow-empty="false" :searchable="true" placeholder="Select Month" />
                </BCol>
                <BCol lg="12" class="mt-1">
                    <InputLabel value="Amount" :message="form.errors.amount"/>
                    <Amount @amount="amount" ref="testing" :readonly="false" @input="handleInput('amount')"/>
                </BCol>
            </BRow>
        </form>
          <template v-slot:footer>
            <b-button @click="hide()" variant="light" block>Close</b-button>
            <b-button @click="submit('ok')" variant="primary" :disabled="form.processing" block>Generate</b-button>
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
    components: { Multiselect, TextInput, InputLabel, Amount },
    props: ['users','deductions'],
    data(){
        return {
            currentUrl: window.location.origin,
            form: useForm({
                amount: null,
                payroll_id: null,
                deduction_id: null,
                option: 'deduction'
            }),
            names: [],
            selected: null,
            keyword: null,
            showModal: false
        }
    },
    computed: {
        filteredDeductions() {
            return this.deductions.filter(item =>
                item.is_contribution === 0 &&
                item.is_loan === 0 &&
                item.is_enrollable === 0
            );
        }
    },
    methods: { 
        show(){
            this.selected = null;
            this.showModal = true;
        },
        amount(val){
            this.form.amount = val;
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