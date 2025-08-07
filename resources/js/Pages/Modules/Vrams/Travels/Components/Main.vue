<template>
    <div class="card bg-light-subtle shadow-none border">
        <div class="card-header bg-light-subtle">
            <div class="d-flex mb-n3">
                <div class="flex-shrink-0 me-3">
                    <div style="height:2.5rem;width:2.5rem;">
                        <span class="avatar-title bg-primary-subtle rounded p-2 mt-n1">
                            <i class="ri-chat-history-fill text-primary fs-24"></i>
                        </span>
                    </div>
                </div>
                <div class="flex-grow-1">
                    <h5 class="mb-0 fs-14"><span class="text-body">Travel Order Activity</span></h5>
                    <p class="text-muted text-truncate-two-lines fs-12">Includes official comments, document references, and chronological status updates</p>
                </div>
            </div>
        </div>
        <div class="card-body bg-white border-bottom border-bottom">
            <div class="row g-3 p-0">
                <div class="col-md-4">
                    <div class="d-flex border border-dashed rounded p-3">
                        <div class="flex-shrink-0 avatar-xs align-self-center me-3">
                            <div v-if="information.status.name == 'Pending'" class="avatar-title bg-light rounded-circle fs-16 text-warning">
                                <i class="ri-record-circle-fill"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1 overflow-hidden">
                            <p class="mb-0 text-muted fs-12">Status :</p>
                            <h6 class="text-truncate fw-semibold fs-12 mb-0"> {{information.status.name}} </h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="d-flex border border-dashed rounded p-3">
                        <div class="flex-shrink-0 avatar-xs align-self-center me-3">
                            <div v-if="information.status.name == 'Pending'" class="avatar-title bg-light rounded-circle fs-16" :class="crc === rc ? 'text-success' : 'text-warning'">
                                <i class="ri-emotion-happy-fill"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1 overflow-hidden">
                            <p class="mb-0 text-muted fs-12">Recommending :</p>
                            <h6  class="text-truncate fw-semibold fs-12 mb-0">{{crc}} of {{ rc }} signed</h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="d-flex border border-dashed rounded p-3">
                        <div class="flex-shrink-0 avatar-xs align-self-center me-3">
                            <div v-if="information.status.name == 'Pending'" class="avatar-title bg-light rounded-circle fs-16" :class="approvalStatus ? 'text-success' : 'text-warning'">
                                <i class="ri-emotion-fill"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1 overflow-hidden">
                            <p class="mb-0 text-muted fs-12">Approval :</p>
                            <h6 v-if="!approvalStatus" class="text-truncate fw-semibold fs-12 mb-0">Pending</h6>
                            <h6 v-else class="text-truncate fw-semibold fs-12 mb-0">Completed</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         <div class="card bg-white rounded-bottom shadow-none mb-0">
            <div class="step-arrow-nav mt-0">
                <ul class="nav nav-pills nav-justified custom-nav" role="tablist">
                    <li @click="openMenu(menu)" class="nav-item" role="presentation" v-for="(menu, index) in menus" v-bind:key="index">
                        <button class="nav-link fs-12 p-3" :class="(index == 0) ? 'active' : ''" 
                            :id="menu+'-tab'" data-bs-toggle="pill" :data-bs-target="'#'+menu" 
                            type="button" role="tab" :aria-controls="menu" aria-selected="true">
                            {{menu}}
                        </button>
                    </li>
                </ul>
            </div>
        </div>
        
        <div class="card-body bg-white rounded-bottom">
            <div class="tab-content">
                <div class="tab-pane" :class="(index == 0) ? 'show active' : ''" :id="menu" role="tabpanel" :aria-labelledby="menu+'-tab'" v-for="(menu, index) in menus" v-bind:key="index">
                    
                    <div class="carousel-container">
                        <div class="carousel-content">
                            <transition mode="out-in">
                                <div :key="index" class="tab-content">
                                    <Home :information="information" v-if="menu == 'Home'" />
                                    <Signatories :information="information" v-if="menu == 'Signatories'" />
                                    <Attachment :information="information" v-if="menu == 'Attachment'" />
                                    <Status :information="information" v-if="menu == 'Statuses'" />
                                    <Detail :information="information" v-if="menu == 'Details'" />
                                </div>
                            </transition>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="card-footer" v-if="menu == 'Home'">
            <form>
                <BRow class="g-0 align-items-center">
                    <BCol cols="auto">
                        <div class="chat-input-links me-2">
                            <div class="links-list-item">
                                <BButton type="button" variant="link" class="text-decoration-none emoji-btn" id="emoji-btn">
                                    <i class="bx bx-smile align-middle"></i>
                                </BButton>
                            </div>
                        </div>
                    </BCol>
                    <BCol>
                        <input type="text" class="form-control chat-input bg-light border-light" placeholder="Add Comment.." >
                    </BCol>
                    <BCol cols="auto">
                        <div class="chat-input-links ms-2">
                            <div class="links-list-item">
                                <BButton variant="success" type="submit" class="chat-send">
                                    <i class="ri-send-plane-2-fill align-bottom"></i>
                                </BButton>
                            </div>
                        </div>
                    </BCol>
                </BRow>
            </form>
       </div>
        
    </div>
</template>
<script>
import Home from './Pages/Home.vue';
import Status from './Pages/Status.vue';
import Detail from './Pages/Detail.vue';
import Attachment from './Pages/Attachment.vue';
import Signatories from './Pages/Signatories.vue';
import simplebar from "simplebar-vue";
import Multiselect from "@vueform/multiselect";
export default {
    components: { simplebar, Multiselect, Home, Signatories, Attachment, Status, Detail },
    props: ['information'],
    data(){
        return {
            menus: [
                'Home','Signatories','Details','Attachment','Statuses'
            ],
            menu: 'Home'
        }
    },
    computed: {
        r() {
            return this.information.signatories.filter(s => s.is_approval_only === 0);
        },
        rc() {
            return this.r.length;
        },
        crc() {
            return this.r.filter(s => s.recommended_id !== null).length;
        },
        approvalStatus() {
            const allApproved = this.information.signatories.every(s => s.approved_id !== null);
            return allApproved ? 1 : 0;
        }
    },
    methods: { 
        openMenu(menu){
            this.menu = menu;
        }
    }
}
</script>