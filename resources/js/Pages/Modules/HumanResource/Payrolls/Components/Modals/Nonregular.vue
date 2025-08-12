<template>
    <!-- style="--vz-modal-width: 600px;" -->
    <b-modal v-model="showModal" style="--vz-modal-width: 700px;" header-class="p-3 bg-light" title="Select Employee" class="v-modal-custom" modal-class="zoomIn" centered no-close-on-backdrop>
        <form class="customform">
            <BRow class="g-3">
                <BCol lg="12">
                    <BRow class="g-3">
                        <BCol lg="12"><hr class="text-muted mb-0 mt-0"/></BCol>
                        
                        <BCol lg="12">
                            <form class="app-search d-none d-md-block mb-n3" style="margin-top: -33px;">
                                <div class="position-relative">
                                    <input type="text" class="form-control" placeholder="Search Employee" autocomplete="off" id="search-options" />
                                    <span class="mdi mdi-magnify search-widget-icon"></span>
                                    <span @click="clear()" class="mdi mdi-close-circle search-widget-icon search-widget-icon-close d-none" id="search-close-options"></span>
                                </div>
                                <div class="dropdown-menu dropdown-menu-lg" id="search-dropdown">
                                    <SimpleBar data-simplebar >
                                        <div class="notification-list">
                                            <b-link @click="chooseUser(list)" v-for="(list, index) of names" :key="index" class="d-flex dropdown-item notify-item py-2">
                                                <img :src="list.avatar" class="me-3 rounded-circle avatar-xs" alt="user-pic" />
                                                <div class="flex-1">
                                                    <h6 class="m-0">{{ list.name}}</h6>
                                                    <span class="fs-11 mb-0 text-muted">{{list.position}}</span>
                                                </div>
                                            </b-link>
                                        </div>
                                    </SimpleBar>
                                </div>
                            </form>
                        </BCol>
                      
                        
                       
                    </BRow>
                </BCol>
            </BRow>
        </form>
        <template v-slot:footer>
            <b-button @click="hide()" variant="light" block>Close</b-button>
            <b-button @click="submit('ok')" variant="primary" :disabled="form.processing" block>Submit</b-button>
        </template>
    </b-modal>
</template>

<script>
import _ from 'lodash';
import { useForm } from '@inertiajs/vue3';
export default {
    props: ['is_regular','id'],
    data(){
        return {
            currentUrl: window.location.origin,
            form: useForm({
                id: this.id,
                user_id: null,
                option: 'users'
            }),
            names: [],
            keyword: null,
            showModal: false
        }
    },
    mounted() {
        this.isCustomDropdown();
    },
    methods: { 
        show(){
            this.showModal = true;
        },
        checkSearchStr: _.debounce(function (string) {
            this.keyword = string;
            this.search();
        }, 500),
        search(){
            axios.get('/search', {
                params: {
                    keyword: this.keyword,
                    is_regular: this.is_regular,
                    option: 'users'
                }
            })
            .then(response => {
                if(response){ 
                    this.names = response.data; 
                }
            })
            .catch(err => console.log(err));
        },
        getEmployeeName(id) {
            const emp = this.employees.find(e => e.value === id);
            return emp ? emp.name : `User ID: ${id}`;
        },
        chooseUser(data){
            if (!this.employees.some(user => user.value === data.value)) {
                this.employees.unshift(data);
            }
            this.keyword = null;
            document.getElementById("search-options").value = "";
            document.getElementById("search-options").focus();
        }, 
        submit(){
            this.form.post('/payrolls',{
                preserveScroll: true,
                onSuccess: (response) => {
                
                },
            });
        },
        handleInput(field) {
            this.form.errors[field] = false;
        },
        hide(){
            this.showModal = false;
        },
        isCustomDropdown() {
            var searchOptions = document.getElementById("search-close-options");
            var dropdown = document.getElementById("search-dropdown");
            var searchInput = document.getElementById("search-options");

            searchInput.addEventListener("focus", () => {
                var inputLength = searchInput.value.length;
                if (inputLength > 0) {
                    dropdown.classList.add("show");
                    searchOptions.classList.remove("d-none");
                } else {
                    dropdown.classList.remove("show");
                    searchOptions.classList.add("d-none");
                }
            });

            searchInput.addEventListener("keyup", () => {
                var inputLength = searchInput.value.length;
                console.log(inputLength);
                if (inputLength > 0) {
                    dropdown.classList.add("show");
                    searchOptions.classList.remove("d-none");
                    this.checkSearchStr(searchInput.value);
                } else {
                    dropdown.classList.remove("show");
                    searchOptions.classList.add("d-none");
                }
            });

            searchOptions.addEventListener("click", () => {
                searchInput.value = "";
                dropdown.classList.remove("show");
                searchOptions.classList.add("d-none");
            });

            document.body.addEventListener("click", (e) => {
                if (e.target.getAttribute("id") !== "search-options") {
                    dropdown.classList.remove("show");
                    searchOptions.classList.add("d-none");
                }
            });
        }
    }
}
</script>
<style scoped>
    .dropdown-menu-lg {
        width: 95%;
    }
</style>