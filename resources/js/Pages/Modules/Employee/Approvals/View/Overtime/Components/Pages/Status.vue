<template>
    <div class="card-body bg-white rounded-bottom" style="height: calc(100vh - 522px); overflow: auto;">


        <div class="profile-timeline">
            <div class="accordion accordion-flush" id="accordionFlushExample">
                <div class="accordion-item border-0" v-for="(list,index) in information.statuses" v-bind:key="index">
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
    </div>
</template>
<script>
import simplebar from "simplebar-vue";
export default { 
    components: { simplebar },
    props: ['information'],
}
</script>
