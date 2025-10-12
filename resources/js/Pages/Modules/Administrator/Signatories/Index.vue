 <template>

     <Head title="Signatories" />
     <PageHeader title="Signatory Management" pageTitle="List" />
     <BRow>
         <div class="col-md-12">
            
              
                     <div class="row g-3 p-0">
                         <div class="col-md-4">
                            <div class="card bg-light-subtle shadow-none border">
                                <div class="d-flex p-3">
                                    <div class="flex-shrink-0 avatar-sm align-self-center me-3">
                                        <div class="avatar-title bg-light rounded-circle fs-24 text-success">
                                            <i class="ri-checkbox-circle-fill"></i>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 overflow-hidden">
                                        <p class="mb-0 text-muted fs-12">Office of the Regional Director</p>
                                        <h6 class="text-truncate fw-semibold fs-13 mb-0">Approved</h6>
                                        <p class="mb-0 text-muted fs-12">Regional Director</p>
                                    </div>
                                </div>
                            </div>
                         </div>
                         <div class="col-md-4">
                            <div class="card bg-light-subtle shadow-none border">
                                <div class="d-flex p-3">
                                    <div class="flex-shrink-0 avatar-sm align-self-center me-3">
                                        <div class="avatar-title bg-light rounded-circle fs-24 text-success">
                                            <i class="ri-checkbox-circle-fill"></i>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 overflow-hidden">
                                        <p class="mb-0 text-muted fs-12">Finance and Administrative Support Services</p>
                                        <h6 class="fw-semibold fs-13 mb-0">Ricardo J. Apolinario, III</h6>
                                        <p class="mb-0 text-muted fs-12">Assistant Regional Director </p>
                                    </div>
                                </div>
                             </div>
                         </div>
                         <div class="col-md-4">
                            <div class="card bg-light-subtle shadow-none border">
                                <div class="d-flex p-3">
                                    <div class="flex-shrink-0 avatar-sm align-self-center me-3">
                                        <div class="avatar-title bg-light rounded-circle fs-24 text-success">
                                            <i class="ri-checkbox-circle-fill"></i>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 overflow-hidden">
                                        <p class="mb-0 text-muted fs-12">Technical Operations Services</p>
                                        <h6 class="text-truncate fw-semibold fs-13 mb-0">Rosemarie S. Salazar</h6>
                                        <p class="mb-0 text-muted fs-12">Assistant Regional Director</p>
                                    </div>
                                </div>
                            </div>
                         </div>
                     </div>
         </div>
         <div class="col-md-12">
             <div class="card bg-light-subtle shadow-none border">
                 <div class="card-header bg-light-subtle">
                     <div class="d-flex mb-n3">
                         <div class="flex-shrink-0 me-3">
                             <div style="height:2.5rem;width:2.5rem;">
                                 <span class="avatar-title bg-primary-subtle rounded p-2 mt-n1">
                                     <i class="ri-mark-pen-fill text-primary fs-24"></i>
                                 </span>
                             </div>
                         </div>
                         <div class="flex-grow-1">
                             <h5 class="mb-0 fs-14"><span class="text-body">List of Signatories</span></h5>
                             <p class="text-muted text-truncate-two-lines fs-12">A comprehensive list of campuses from
                                 various schools, providing location and institutional details</p>
                         </div>
                         <div class="flex-shrink-0" style="width: 45%;">

                         </div>
                     </div>
                 </div>
                 <div class="car-body bg-white border-bottom shadow-none">
                     <b-row class="mb-2 ms-1 me-1" style="margin-top: 12px;">
                         <b-col lg>
                             <div class="input-group mb-1">
                                 <span class="input-group-text"> <i class="ri-search-line search-icon"></i></span>
                                 <input type="text" v-model="filter.keyword" placeholder="Search Employee"
                                     class="form-control" style="width: 20%;">

                                 <span @click="refresh()" class="input-group-text" v-b-tooltip.hover title="Refresh"
                                     style="cursor: pointer;">
                                     <i class="bx bx-refresh search-icon"></i>
                                 </span>
                                 <b-button type="button" variant="primary" @click="openCreate">
                                     <i class="ri-add-circle-fill align-bottom me-1"></i> Create
                                 </b-button>
                             </div>
                         </b-col>
                     </b-row>
                 </div>
                 <div class="card bg-white border-bottom shadow-none" no-body>

                     <!-- <div class="d-flex">
                        <div class="flex-grow-1">
                            <ul class="nav nav-tabs nav-tabs-custom nav-primary fs-12" role="tablist">
                                <li class="nav-item">
                                    <BLink @click="viewStatus(null,null)" class="nav-link py-3 active" data-bs-toggle="tab" role="tab" aria-selected="true">
                                    <i class="ri-apps-2-line me-1 align-bottom"></i> All Employees
                                    </BLink>
                                </li>
                                <li class="nav-item" v-for="(list,index) in counts" v-bind:key="index">
                                    <BLink @click="viewStatus(index,list.value)" class="nav-link py-3" :class="(this.index == index) ? 'text-primary active' : ''" data-bs-toggle="tab" role="tab" aria-selected="false">
                                        <i :class="list.icon" class="me-1 align-bottom"></i>
                                        {{ list.name }} 
                                        <BBadge v-if="list.count > 0" :class="(this.index == index) ? 'bg-primary text-white' : 'text-dark bg-primary-subtle'" class="align-middle ms-1">{{list.count}}</BBadge>
                                    </BLink>
                                </li>
                            </ul>
                        </div>
                        <div class="flex-shrink-0">
                            <div class="d-flex flex-wrap gap-2 mt-3">
                              
                            </div>
                        </div>
                    </div> -->
                 </div>
                 <div class="card-body bg-white rounded-bottom">
                     <div class="table-responsive table-card"
                         style="margin-top: -39px; height: calc(100vh - 465px); overflow: auto;">
                         <table class="table align-middle table-striped table-centered mb-0">
                             <thead class="table-light thead-fixed">
                                 <tr class="fs-11">
                                     <th style="width: 3%;"></th>
                                     <th>Name</th>
                                     <th style="width: 10%;" class="text-center">Type</th>
                                     <th style="width: 10%;" class="text-center">Employee No.</th>
                                     <th style="width: 10%;" class="text-center">Contact No.</th>
                                     <th style="width: 15%;" class="text-center">Email</th>
                                     <th style="width: 13%;" class="text-center">Birthdate</th>
                                     <th style="width: 10%;" class="text-center">Status</th>
                                     <th style="width: 6%;"></th>
                                 </tr>
                             </thead>
                             <tbody class="table-white fs-12">
                                 <tr v-for="(list,index) in lists" v-bind:key="index" @click="selectRow(index)" :class="filter.status === null ? {
                                    'bg-info-subtle': selectedRow === index,
                                    'bg-danger-subtle': list.organization.status.name === 'Retired',
                                } : ''">
                                     <td class="text-center">
                                         <div class="avatar-xs chat-user-img online">
                                             <img :src="list.avatar" alt="" class="avatar-xs rounded-circle">
                                             <!-- <span v-if="list.is_active" class="user-status text-success"></span> -->
                                         </div>
                                     </td>
                                     <td>
                                         <h5 class="fs-13 mb-0 fw-semibold text-primary text-uppercase">
                                             {{list.profile.lastname}}, {{list.profile.firstname}}
                                             {{list.profile.middlename}}.</h5>
                                         <p class="fs-12 text-muted mb-0">{{list.organization.position.name}}</p>
                                     </td>
                                     <td class="text-center">{{ list.organization.type.name }}</td>
                                     <td class="text-center">{{ list.username }}</td>
                                     <td class="text-center">{{ list.profile.contact_no }}</td>
                                     <td class="text-center">{{ list.email }}</td>
                                     <td class="text-center">{{ list.profile.birthdate }}</td>
                                     <td class="text-center">
                                         <span
                                             :class="'badge '+list.organization.status.color+' '+list.organization.status.type">{{list.organization.status.name}}</span>
                                     </td>
                                     <td class="text-end">
                                         <b-button @click="openEdit(list,index)" variant="soft-warning" class="me-1"
                                             v-b-tooltip.hover title="Edit" size="sm">
                                             <i class="ri-pencil-fill align-bottom"></i>
                                         </b-button>
                                         <Link :href="`/employees/${list.code}`">
                                         <b-button variant="soft-info" class="me-1" v-b-tooltip.hover title="View"
                                             size="sm">
                                             <i class="ri-eye-fill align-bottom"></i>
                                         </b-button>
                                         </Link>
                                     </td>
                                 </tr>
                             </tbody>
                         </table>
                     </div>
                 </div>
                 <div class="card-footer">
                     <Pagination class="ms-2 me-2 mt-n1" v-if="meta" @fetch="fetch" :lists="lists.length" :links="links"
                         :pagination="meta" />
                 </div>
             </div>
         </div>
     </BRow>
 </template>
 <script>
     import _ from 'lodash';
     import Multiselect from "@vueform/multiselect";
     import PageHeader from '@/Shared/Components/PageHeader.vue';
     import Pagination from "@/Shared/Components/Pagination.vue";
     export default {
         components: {
             PageHeader,
             Pagination,
             Multiselect
         },
         data() {
             return {
                 currentUrl: window.location.origin,
                 lists: [],
                 meta: {},
                 links: {},
                 filter: {
                     keyword: null
                 },
                 index: null,
                 selectedRow: null
             }
         },
         watch: {
             "filter.keyword"(newVal) {
                 this.checkSearchStr(newVal);
             }
         },
         created() {
             this.fetch();
         },
         methods: {
             checkSearchStr: _.debounce(function (string) {
                 this.fetch();
             }, 300),
             fetch(page_url) {
                 page_url = page_url || '/employees';
                 axios.get(page_url, {
                         params: {
                             keyword: this.filter.keyword,
                             status: this.filter.status,
                             type: this.filter.type,
                             division: this.filter.division,
                             unit: this.filter.unit,
                             station: this.filter.station,
                             count: 10, //Math.floor((window.innerHeight-350)/59)
                             option: 'lists'
                         }
                     })
                     .then(response => {
                         if (response) {
                             this.lists = response.data.data;
                             this.meta = response.data.meta;
                             this.links = response.data.links;
                         }
                     })
                     .catch(err => console.log(err));
             },
         }
     }

 </script>
