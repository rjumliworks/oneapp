<template>
    <div class="card-body bg-white rounded-bottom" style="height: calc(100vh - 522px); overflow: auto;">
        
        <div class="table-responsive table-card">
            <table class="table align-middle table-bordered table-striped table-centered mb-0">
                <thead class="table-light thead-fixed">
                    <tr class="fs-11">
                        <th>Recommended By</th>
                        <th style="width: 40%;" class="text-center">Date</th>
                    </tr>
                </thead>
                <tbody class="table-white fs-12" v-if="list.recommended"> 
                    <tr>
                        <td>{{ list.recommended.profile.firstname}} {{ list.recommended.profile.lastname}}</td>
                        <td class="text-center">{{ list.recommended_date }}</td>
                    </tr>
                </tbody>
                <tbody class="table-white fs-12" v-else>
                     <tr>
                        <td class="text-center text-muted" colspan="2">Not yet recommended</td>
                    </tr>
                </tbody> 
            </table>
            <table class="table align-middle table-bordered table-striped table-centered mb-0">
                <thead class="table-light thead-fixed">
                    <tr class="fs-11">
                        <th>Approved By</th>
                        <th style="width: 20%;" class="text-center">Date</th>
                    </tr>
                </thead>
                <tbody class="table-white fs-12" v-if="list.approved"> 
                    <tr>
                        <td>{{ list.approved.profile.firstname}} {{ list.approved.profile.lastname}}</td>
                        <td class="text-center">{{ list.approved_date }}</td>
                    </tr>
                </tbody>
                <tbody class="table-white fs-12" v-else>
                     <tr>
                        <td class="text-center text-muted" colspan="2">Not yet recommended</td>
                    </tr>
                </tbody> 
            </table>
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
            list : this.information.signatories,
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