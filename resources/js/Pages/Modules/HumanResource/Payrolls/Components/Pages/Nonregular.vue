<template lang="">
    <Head title="PAYROLL"/>
    <div class="auth-page-wrapper d-flex min-vh-100">
        <div class="auth-page-content">
            <div class="chat-wrapper d-lg-flex gap-1 mx-n4 mt-n4 p-1">
                <div class="file-manager-content w-100 p-4 pb-0" ref="box">
                        <table class="table table-bordered table-nowrap align-middle">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th colspan="23" class="text-center align-middle">{{ cutoff.title }}</th>
                                </tr>
                                <tr class="fs-10">
                                    <th class="text-center align-middle" rowspan="3" style="width: 3%;">No.</th>
                                    <th class="text-center align-middle" rowspan="3" style="width: 12%;">Name</th>
                                    <th class="text-center align-middle" rowspan="3" style="width: 6%;">Salary</th>
                                    <th class="text-center align-middle" rowspan="3" style="width: 7%;">1st Quincena</th>
                                    <th class="text-center" colspan="3"  style="width: 17%;">DEDUCTION</th>
                                    <th class="text-center" colspan="6">CONTRIBUTIONS</th>
                                    <th class="text-center align-middle" rowspan="3" style="width: 4%;">Net Amount Received</th>
                                    <th class="text-center align-middle" rowspan="3" style="width: 4%;">Signature</th>
                                </tr>
                                <tr style="font-size: 8px;">
                                    <th class="text-center align-middle" colspan="2" rowspan="2">ABSENT/TARDINESS/UNDERTIME</th>
                                    <th class="text-center align-middle" rowspan="2">Total</th>
                                    <th class="text-center align-middle" rowspan="2" v-for="(list,index) in deductionHeaders" v-bind:key="index">{{list}}</th>
                                    <th class="text-center align-middle" rowspan="2">Total Contribution</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white fs-11">
                                <tr v-for="(list,index) in cutoff.payrolls" v-bind:key="index" @click="selectRow(index)" :class="{ 'bg-info-subtle': selectedRow === index }">
                                    <td class="text-center"> {{ index+1}}</td>
                                    <td class="align-middle">
                                        <h5 class="fs-11 mb-0 fw-semibold text-primary text-uppercase">{{list.name}}.</h5>
                                        <p class="fs-10 text-muted mb-0">{{list.position}}</p>
                                    </td>
                                    <td class="text-center"> {{ list.salary}}</td>
                                    <td class="text-center"> {{ formatMoney(list.first)}}</td>
                                    <td class="text-center">{{list.mins}} mins <br />{{list.days}} days</td>
                                    <td class="text-center">{{formatMoney(list.tardiness.late_deduction)}} <br />{{formatMoney(list.tardiness.absence_deduction)}}</td>
                                    <td class="text-center text-danger">{{formatMoney(list.tardiness.total)}}</td>
                                    <td class="text-center" v-for="(name, i) in deductionHeaders" :key="'deduction-' + i">
                                       {{ (parseFloat(list.deductions[name]) !== 0) ? formatMoney(list.deductions[name]) : '-' }}
                                    </td>
                                    <td class="text-center text-danger"> {{ list.deduction}}</td>
                                    <td class="text-center fw-semibold"> {{ list.netpay}}</td>
                                    <td class="text-center text-primary">{{list.daily}}</td>
                                </tr>
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    layout: null,
    props: ['cutoff','deductionHeaders'],
    data(){
        return {
            selectedRow: null
        }
    },
    methods: {
        formatMoney(value) {
            let val = (value/1).toFixed(2).replace(',', '.')
            return '₱'+val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")
        },
        selectRow(index) {
            this.selectedRow = index;
        }
    }
}
</script>
<style scoped>
.auth-page-wrapper .auth-page-content {
    padding-bottom: 0px;
  width: 100%;
  overflow: hidden;
  background-color: #f3f3f9;
}
.file-manager-sidebar {
  min-width: 24%;
  max-width: 24%;
  height: calc(100vh - 92px);
}
</style>
