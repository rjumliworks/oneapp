<template>
    <Head title="Employee Profile" />
    <div class="chat-wrapper d-lg-flex gap-1 mx-n4 mt-n4 p-1">
        <div class="w-100 p-4 pb-0" ref="box">
            <BRow>
                <BCol lg="12">
                    <BCard no-body class="mt-n4 mx-n4">
                        <div class="bg-success-subtle">
                            <BCardBody class="pb-0 px-4">
                                <BRow class="mb-3">
                                    <BCol md>
                                        <BRow class="align-items-center g-3">
                                         
                                            <BCol md>
                                                <div class="ms-2">
                                                    <h4 class="fw-bold">{{ payroll.cycle.month }} {{ payroll.cycle.year }}</h4>
                                                    <div class="hstack gap-3 flex-wrap">
                                                        <div><i class="ri-qr-code-fill align-bottom me-1"></i> {{payroll.cycle.is_regular}}</div>
                                                        <div class="vr" style="width: 1px;"></div>
                                                        <div><span class="text-muted">Type :</span> <span class="fw-medium">{{(payroll.cycle.is_regular) ? 'Regular Employees' : 'Contractual'}}</span></div>
                                                        <div class="vr" style="width: 1px;"></div>
                                                        <div><span class="text-muted">Year :</span> <span class="fw-medium">{{payroll.cycle.year}}</span></div>
                                                        <div class="vr" style="width: 1px;"></div>
                                                        <div><span class="text-muted">Start Date :</span> <span class="fw-medium">{{payroll.start}}</span></div>
                                                        <div class="vr" style="width: 1px;"></div>
                                                        <div><span class="text-muted">End Date :</span> <span class="fw-medium">{{payroll.end}}</span></div>
                                                        <div class="vr" style="width: 1px;"></div>
                                                         <div><span class="text-muted">Date Created :</span> <span class="fw-medium">{{payroll.created_at}}</span></div>
                                                        <div class="vr" style="width: 1px;"></div>
                                                    </div>
                                                </div>
                                            </BCol>
                                        </BRow>
                                    </BCol>
                                    <BCol md="auto">
                                        <div class="hstack gap-4 flex-wrap mt-2">
                                            <div class="text-muted" @click="back()" >  
                                                <i class="ri-close-circle-fill fs-16"></i> Close
                                            </div>
                                            <a :href="`/payrolls?option=print&code=${payroll.code}`" target="_blank">
                                                <div class="text-muted" style="cursor: pointer;">  
                                                    <i class="ri-printer-fill fs-16"></i> Print Preview
                                                </div>
                                            </a>
                                            <div class="vr" style="width: 1px;"></div>
                                            <div >  
                                                <b-button @click="openSave(selected.id)" variant="success" block><i class="ri-save-fill me-1"></i> Save</b-button>
                                            </div>
                                            <!-- <div v-if="selected.status.name !== 'Pending'" @click="openPrint(selected.qr)">  
                                                <b-button variant="primary" block><i class="ri-printer-fill me-1"></i> Print</b-button>
                                            </div> -->
                                        </div>
                                    </BCol>
                                </BRow>
                            </BCardBody>
                        </div>
                    </BCard>
                </BCol>
                <BCol lg="12">
                    <Main :dropdowns="dropdowns" :is_regular="payroll.cycle.is_regular" :payroll="payroll_data.data" ref="main"/>
                </BCol>
            </BRow>
        </div>
    </div>
</template>
<script>
import Main from './Components/Pages/Main.vue';
export default {
    props:['payroll_data','dropdowns'],
    components: { Main },
    data(){
        return {
            currentUrl: window.location.origin,
            payroll: this.payroll_data.data
        }
    },
    methods: {
        back(){
            this.$inertia.visit('/payrolls');
        },
        openPrint(){
            window.open('/print/'+id);
        }
    }
}
</script>