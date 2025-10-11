<template>
    <div class="card-body bg-white rounded-bottom" style="height: calc(100vh - 522px); overflow: auto;">
        <div class="d-flex justify-content-between border border-dashed rounded p-3">
            <div class="text-start">
                <h6 class="text-muted text-uppercase fw-semibold text-truncate fs-11 mb-3">Recommended By</h6>
                <h5 class="mb-0 mt-n2 fs-14">{{(list.recommended) ? list.recommended : '-'}}</h5>
                <p class="mb-0 mt-1 text-muted fs-11"><i class="ri-calendar-2-line align-middle me-2"></i>{{list.recommended_date}}</p>
            </div>
            <div class="text-end">
                <h6 class="text-muted text-uppercase fw-semibold text-truncate fs-11 mb-3">Approved By</h6>
                <h5 class="mb-0 mt-n2 fs-14">{{ (list.approved) ? list.approved : '-' }}</h5>
                <p class="mb-0 mt-1 text-muted fs-11"><i class="ri-calendar-2-line align-middle me-2"></i>{{list.approved_date}}</p>
            </div>
        </div>
        <div class="border border-dashed rounded p-1 mt-2">
            <div class="profile-timeline" v-if="statuses.length > 0">
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <div class="accordion-item border-0" v-for="(list,index) in statuses" v-bind:key="index">
                        <div class="accordion-header" id="headingOne">
                            <BLink class="accordion-button p-2 shadow-none">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0 avatar-xs">
                                        <div class="avatar-title bg-light rounded-circle" :class="list.color">
                                            <i :class="list.icon"></i>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3 fs-12">
                                        <p class="text-muted fw-normal mb-0"><span class="fw-semibold text-dark">{{list.name}}</span> has {{list.status}} the request on <span class="fw-semibold text-dark">{{ list.date }}</span></p>
                                    </div>
                                </div>
                            </BLink>
                        </div>
                    </div>
                </div>
            </div>
            <div v-else>
                <p class="text-muted text-center mt-3 fs-12">No status update available</p>
            </div>
        </div>
            
    </div>
</template>
<script>
import simplebar from "simplebar-vue";
export default {
    components: { simplebar },
    props: ['information','statuses'],
   data(){
       return {
            list : this.information.signatories,
            filter: {
                keyword: null
            }
       }
   },
   methods: {
       openCreate(){
           this.$refs.create.show(this.id);
       }
   }
}
</script>