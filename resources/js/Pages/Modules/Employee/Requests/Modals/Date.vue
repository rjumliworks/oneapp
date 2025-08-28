<template>
    <b-modal v-model="showModal" style="--vz-modal-width: 550px;" header-class="p-3 bg-light" title="Request Date" class="v-modal-custom" modal-class="zoomIn" centered no-close-on-backdrop>
        <form>
            <BRow>
                <BCol lg="12" style="max-height: 250px; overflow: auto;"  id="my-modal-content2"> 
                    <div v-if="check" class="mt-3">
                        <div v-for="(date, index) in form.dates" :key="index" class="mb-2">
                            <div class="input-group mb-1">
                                <span class="input-group-text"> <i class="ri-calendar-line search-icon"></i></span>
                                <input type="text" :value="formatDateWithWeekday(date.date)" placeholder="Search Employee" class="form-control" readonly>
                                <Multiselect class="white" style="width: 40%;" :options="['Whole Day','AM','PM']" v-model="date.timeOfDay" 
                                :searchable="true" 
                                :allow-empty="false"  
                                :can-clear="false"
                                :append-to-body="true"
                                 append-to="#my-modal-content2"
                                placeholder="Select Status" />
                            </div>
                        </div>
                    </div>
                </BCol>
            </BRow>
        </form>
        <template v-slot:footer>
            <b-button @click="hide()" variant="light" block>Cancel</b-button>
            <b-button @click="submit('ok')" variant="primary" :disabled="form.processing" block>Update</b-button>
        </template>
    </b-modal>
</template>
<script>
import { useForm } from '@inertiajs/vue3';
import Multiselect from "@vueform/multiselect";
export default {
    components: { Multiselect },
    data(){
        return {
            currentUrl: window.location.origin,
            form: useForm({
                dates: [],
                option: 'leave'
            }),
            check: false,
            showModal: false
        }
    },
    methods: { 
        show(data){
            this.form.dates = data;
            this.check = true;
            this.showModal = true;
        },
        submit(){
            this.$emit('update',this.form.dates);
            this.hide();
        },
        formatDateWithWeekday(dateString) {
            const date = new Date(dateString);
            const day = date.getDate();
            const month = date.toLocaleString('en-US', { month: 'short' });
            const year = date.getFullYear();
            const weekday = date.toLocaleString('en-US', { weekday: 'long' });
            return `${month} ${day}, ${year} (${weekday})`;
        },
        hide(){
            this.showModal = false;
        }
    }
}
</script>