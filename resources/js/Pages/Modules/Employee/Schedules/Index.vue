<template>
    <Head title="Schedules"/>
        <PageHeader title="Calendar Schedules" pageTitle="List" />
        <BRow>
            <div class="col-md-12">
                <div class="card bg-light-subtle shadow-none border">
                    <div class="card-header bg-light-subtle">
                        <div class="d-flex mb-n3">
                            <div class="flex-shrink-0 me-3">
                                <div style="height:2.5rem;width:2.5rem;">
                                    <span class="avatar-title bg-primary-subtle rounded p-2 mt-n1">
                                        <i class="ri-calendar-todo-fill text-primary fs-24"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="flex-grow-1">
                                <h5 class="mb-0 fs-14"><span class="text-body">Operational Calendar</span></h5>
                                <p class="text-muted text-truncate-two-lines fs-12">Centralized tracking of official engagements, transport bookings, and field activities.</p>
                            </div>
                            <!-- <div class="flex-shrink-0" style="width: 45%;"></div> -->
                        </div>
                    </div>
                    <div class="card-body bg-white rounded-bottom">
                        <FullCalendar ref="fullCalendar" :options="calendarOptions" />
                    </div>
                </div>
            </div>
        </BRow>
    </template>
    <script>
    import _ from 'lodash';
    import "@fullcalendar/core";
    import dayGridPlugin from "@fullcalendar/daygrid";
    import timeGridPlugin from "@fullcalendar/timegrid";
    import listPlugin from "@fullcalendar/list";
    import FullCalendar from "@fullcalendar/vue3";
    import bootstrapPlugin from "@fullcalendar/bootstrap";
    import interactionPlugin, { Draggable } from "@fullcalendar/interaction";
    import Multiselect from "@vueform/multiselect";
    import PageHeader from '@/Shared/Components/PageHeader.vue';
    export default {
        components: { PageHeader,  Multiselect, FullCalendar },
        props: ['dropdowns'],
        data(){
            return {
                currentUrl: window.location.origin,
                lists: [],
                meta: {},
                links: {},
                filter: {
                    year: null,
                    semester: null
                },
                index: null,
                units: [],
                calendarOptions: {
                timeZone: "Asia/Manila",
                droppable: true,
                navLinks: true,
                plugins: [
                    dayGridPlugin,
                    timeGridPlugin,
                    interactionPlugin,
                    bootstrapPlugin,
                    listPlugin,
                ],
                themeSystem: "bootstrap",
                headerToolbar: {
                    left: "prev,next today",
                    center: "title",
                    right: "dayGridMonth,timeGridWeek,timeGridDay,listMonth",
                },
                windowResize: () => {
                    this.getInitialView();
                },
                initialView: this.getInitialView(),
                initialEvents: [],
                editable: true,
                showNonCurrentDates: false,
                fixedWeekCount: false,
                height: 'calc(100vh - 320px)',
                events: [],
                eventClick: this.editEvent,
            },
            }
        },
        watch: {
            "filter.semester"(newVal){
                this.fetch();
            },
            "filter.year"(newVal){
                this.checkSearchStr(newVal);
            }
        },
        created(){
           this.fetch();
        },
        methods: {
            fetch(){
                axios.get('/calendar',{
                    params : {
                        option: 'events' 
                    }
                })
                .then(response => {
                    this.calendarOptions.events = response.data.data;        
                })
                .catch(err => console.log(err));
            },
            getInitialView() {
                if (window.innerWidth >= 768 && window.innerWidth < 1200) {
                    return "timeGridWeek";
                } else if (window.innerWidth <= 768) {
                    return "listMonth";
                } else {
                    return "dayGridMonth";
                }
            },
            openCreate(data){
                this.$refs.create.show(data);
            },
            editEvent(event){
                this.$refs.view.show(event.event);
            }
        }
    }
    </script>