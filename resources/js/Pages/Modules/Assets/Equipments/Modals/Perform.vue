<template>
    <b-modal v-model="showModal" header-class="p-3 bg-light" :title="'Equipment '+type" class="v-modal-custom" modal-class="zoomIn" centered no-close-on-backdrop>
        <div class="customform">
            <BRow>
                <BCol lg="12" class="mt-2">
                    <InputLabel value="Date" :message="form.errors.date"/>
                    <TextInput v-model="form.date" type="date" class="form-control" @input="handleInput('date')" :light="true"/>
                </BCol>
                <BCol lg="12" class="mt-1 mb-n2" v-if="form.date">
                    <div class="alert alert-warning alert-dismissible alert-label-icon label-arrow" role="alert">
                        <i class="ri-calendar-line label-icon"></i>Duration : <strong>{{duration}}</strong> - next due date is {{ form.next_date }}
                    </div>
                </BCol>
                 <BCol lg="12" class="mt-n1">
                    <hr class="text-muted"/>
                 </BCol>
                <BCol lg="12" class="mt-0">
                    <textarea v-model="form.note" rows="2" class="form-control" placeholder="Add notes here.." @input="handleInput('note')" :light="true"></textarea>
                </BCol>
            </BRow>
        </div>
        <template v-slot:footer>
            <b-button @click="hide()" variant="light" block>Close</b-button>
            <b-button @click="submit('ok')" variant="primary" :disabled="form.processing" block>Submit</b-button>
        </template>
    </b-modal>
</template>
<script>
import { useForm } from '@inertiajs/vue3';
import InputLabel from '@/Shared/Components/Forms/InputLabel.vue';
import TextInput from '@/Shared/Components/Forms/TextInput.vue';
export default {
    components: { InputLabel, TextInput },
    data(){
        return {
            currentUrl: window.location.origin,
            form: useForm({
                equipment_id: null,
                note: null,
                next_date: null,
                date: null,
                option: 'perform'
            }),
            type: null,
            date: null,
            duration: null,
            showModal: false,
        }
    },
    watch: {
        "form.date"(newVal){
            if(newVal){
                const date = new Date(newVal); 
                switch(this.duration){
                    case '6 months':
                        date.setMonth(date.getMonth() + 6);
                    break;
                    case '1 year':
                        date.setFullYear(date.getFullYear() + 1);
                    break;
                    case '2 years':
                        date.setFullYear(date.getFullYear() + 2);
                    break;
                }
                this.form.next_date = date.toISOString().split('T')[0];
            }else{
                this.form.next_date = null;
            }
        }
    },
    methods: { 
        show(id,duration,date,type){
            this.type = type;
            this.date = date;
            this.duration = duration;
            this.form.equipment_id = id;
            this.showModal = true;
        },
        submit(){
            this.form.post('/equipments',{
                preserveScroll: true,
                onSuccess: (response) => {
                    this.form.reset();
                    this.$emit('update',this.$page.props.flash.data.data);
                    this.hide();
                },
            });
        },
        hide(){
            this.showModal = false;
        }
    }
}
</script>