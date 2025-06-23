<template>
    <div class="col-md-12">
        <div class="card bg-light-subtle shadow-none border">
            <div class="card-header bg-light-subtle">
                <div class="d-flex mb-n3">
                    <div class="flex-shrink-0 me-3">
                        <div style="height:2.5rem;width:2.5rem;">
                            <span class="avatar-title bg-primary-subtle rounded p-2 mt-n1">
                                <i class="ri-team-fill text-primary fs-24"></i>
                            </span>
                        </div>
                    </div>
                    <div class="flex-grow-1">
                        <h5 class="mb-0 fs-14"><span class="text-body">List of Employees</span></h5>
                        <p class="text-muted text-truncate-two-lines fs-12">A comprehensive list of campuses from various schools, providing location and institutional details</p>
                    </div>
                    <div class="flex-shrink-0" style="width: 45%;">
                        <!-- <b-button class="float-end" @click="openDeduction()" variant="light" block><i class="ri-add-circle-fill me-1"></i>Add Deduction</b-button> -->
                    </div>
                </div>
            </div>
            
            <div class="card bg-white border-bottom shadow-none" no-body>
                <b-row class="mb-2 ms-1 me-1" style="margin-top: 12px;">
                    <b-col lg>
                        <div class="input-group mb-1">
                            <span class="input-group-text"> <i class="ri-search-line search-icon"></i></span>
                            <input type="text" placeholder="Search Employee" class="form-control" style="width: 20%;">
                            
                            <span @click="openDeduction()" class="input-group-text" v-b-tooltip.hover title="Add Deduction" style="cursor: pointer;"> 
                                <i class="ri-add-circle-fill search-icon"></i>
                            </span>
                            <b-button type="button" variant="primary" @click="openUser">
                                <i class="ri-user-add-fill align-bottom me-1"></i> Create
                            </b-button>
                        </div>
                    </b-col>
                </b-row>
            </div>
            <div class="card-body bg-white rounded-bottom">
                <div class="table-responsive table-card" style="margin-top: -39px; height: calc(100vh - 465px); overflow: auto;">
                    <table class="table align-middle table-striped table-centered mb-0">
                        <thead class="table-light thead-fixed">
                            <tr class="fs-11">
                                <th style="width: 3%;"></th>
                                <th>Name</th>
                                <th style="width: 15%;" class="text-center">Compensation</th>
                                <th style="width: 15%;" class="text-center">Deductions</th>
                                <th style="width: 15%;" class="text-center">Net Amount Due</th>
                                <th style="width: 10%;" class="text-center">1st Quincena</th>
                                <th style="width: 10%;" class="text-center">2nd Quincena</th>
                                <th style="width: 6%;"></th>
                            </tr>
                        </thead>
                        <tbody class="table-white fs-12">
                            <tr v-for="(list,index) in lists" v-bind:key="index" >
                                <td class="text-center">{{ index + 1 }}.</td>
                                <td>
                                    <h5 class="fs-13 mb-0 fw-semibold text-primary text-uppercase">{{list.name}}.</h5>
                                    <p class="fs-12 text-muted mb-0">{{list.position}}</p>
                                </td>
                                <td class="text-center">{{ list.salary }}</td>
                                <td class="text-center">{{ list.deductions }}</td>
                                <td class="text-center">{{ list.net }}</td>
                                <td class="text-center">{{ list.first}}</td>
                                <td class="text-center">{{ list.second }}</td>
                                <td class="text-end">
                                    <b-button variant="soft-info" class="me-1" v-b-tooltip.hover title="View" size="sm">
                                        <i class="ri-eye-fill align-bottom"></i>
                                    </b-button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                
            </div>
        </div>
    </div>
    <User ref="user"/>
    <Deduction ref="deduction"/>
</template>
<script>
import simplebar from "simplebar-vue";
import User from '../Modals/User.vue';
import Deduction from '../Modals/Deduction.vue';
export default {
    components: { simplebar, Deduction, User },
    props: ['payroll'],
    data(){
        return {
            lists: [],
            index: null,
        }
    },
    created(){
        this.fetch();
    },
    methods: {
        fetch(page_url){
            page_url = page_url || '/payrolls';
            axios.get(page_url,{
                params : {
                    id: this.payroll.code,
                    option: 'payrolls'
                }
            })
            .then(response => {
                if(response){
                    this.lists = response.data.data;
                    this.meta = response.data.meta;
                    this.links = response.data.links;          
                }
            })
            .catch(err => console.log(err));
        },
        openDeduction(){
            this.$refs.deduction.show();
        },
        openUser(){
            this.$refs.user.show();
        }
    }
}
</script>