<template>
    <div class="card-body bg-white rounded-bottom" style="height: calc(100vh - 592px); overflow: auto;">
        

      
            <div class="d-flex mb-4">
                <div class="flex-shrink-0">
                    <img src="/assets/images/users/avatar-8.jpg" alt="" class="avatar-xs rounded-circle" />
                </div>
                <div class="flex-grow-1 ms-3">
                    <h5 class="fs-13">Joseph Parker <small class="text-muted ms-2">20
                            Dec 2021 - 05:47AM</small></h5>
                    <p class="text-muted">I am getting message from customers that when
                        they place order always get error message .</p>
                    <BLink href="javascript: void(0);" class="badge text-muted bg-light"><i class="mdi mdi-reply"></i>
                        Reply</BLink>
                    <div class="d-flex mt-4">
                        <div class="flex-shrink-0">
                            <img src="/assets/images/users/avatar-10.jpg" alt="" class="avatar-xs rounded-circle" />
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h5 class="fs-13">Alexis Clarke <small class="text-muted ms-2">22 Dec 2021 -
                                    02:32PM</small></h5>
                            <p class="text-muted">Please be sure to check your Spam
                                mailbox to see if your email filters have identified the
                                email from Dell as spam.</p>
                            <BLink href="javascript: void(0);" class="badge text-muted bg-light"><i class="mdi mdi-reply"></i> Reply
                            </BLink>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex mb-4">
                <div class="flex-shrink-0">
                    <img src="/assets/images/users/avatar-6.jpg" alt="" class="avatar-xs rounded-circle" />
                </div>
                <div class="flex-grow-1 ms-3">
                    <h5 class="fs-13">Donald Palmer <small class="text-muted ms-2">24
                            Dec 2021 - 05:20PM</small></h5>
                    <p class="text-muted">If you have further questions, please contact
                        Customer Support from the “Action Menu” on your <BLink href="javascript:void(0);"
                            class="text-decoration-underline">
                            Online Order Support
                        </BLink>.
                    </p>
                    <BLink href="javascript: void(0);" class="badge text-muted bg-light"><i class="mdi mdi-reply"></i>
                        Reply</BLink>
                </div>
            </div>
            <div class="d-flex">
                <div class="flex-shrink-0">
                    <img src="/assets/images/users/avatar-10.jpg" alt="" class="avatar-xs rounded-circle" />
                </div>
                <div class="flex-grow-1 ms-3">
                    <h5 class="fs-13">Alexis Clarke <small class="text-muted ms-2">26
                            min ago</small></h5>
                    <p class="text-muted">Your <BLink href="javascript:void(0)" class="text-decoration-underline">Online Order
                            Support
                        </BLink>
                        provides you with the most current status of your order. To help
                        manage your order refer to the “Action Menu” to initiate return,
                        contact Customer Support and more.</p>
                    <BRow class="g-2 mb-3">
                        <BCol lg="1" sm="2" cols="6">
                            <img src="/assets/images/small/img-4.jpg" alt="" class="img-fluid rounded">
                        </BCol>
                        <BCol lg="1" sm="2" cols="6">
                            <img src="/assets/images/small/img-5.jpg" alt="" class="img-fluid rounded">
                        </BCol>
                    </BRow>
                    <BLink href="javascript: void(0);" class="badge text-muted bg-light"><i class="mdi mdi-reply"></i>
                        Reply</BLink>
                    <div class="d-flex mt-4">
                        <div class="flex-shrink-0">
                            <img src="/assets/images/users/avatar-6.jpg" alt="" class="avatar-xs rounded-circle" />
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h5 class="fs-13">Donald Palmer <small class="text-muted ms-2">8
                                    sec ago</small></h5>
                            <p class="text-muted">Other shipping methods are available
                                at checkout if you want your purchase delivered faster.
                            </p>
                            <BLink href="javascript: void(0);" class="badge text-muted bg-light"><i class="mdi mdi-reply"></i> Reply
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
   data(){
       return {
           filter: {
               keyword: null
           }
       }
   },
   methods: {
       openCreate(){
           this.$refs.create.show(this.id);
       },
       openCertification(data,id,course){
           if(data.length > 0){
               
           }else{
               this.$refs.certification.show(id,course);
           }
       }   
   }
}
</script>