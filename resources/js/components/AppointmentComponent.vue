<template>
    <div>
        <div class="header mb-3">
            <h2>Appointments</h2>
            <button class="btn btn-primary" style="width: 20%" v-on:click="addItemCategory()">Add Appointment</button>
        </div>
        
       <div class="container-fluid">
        <v-client-table :data="dataTable" :columns="columns" :options="options">
            <template slot="action" slot-scope="props">
                <button class="btn btn-success" v-on:click="edit(props.row.id)">Edit</button>
                <button class="btn btn-danger" v-on:click="destroy(props.row.id)">Delete</button>
            </template>
        </v-client-table>
       </div>


        <div class="modal fade" id="add-appointment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ modalTitle }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <div class="row col-12">
                        <div class="form-group col-md-12">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" v-model="name">
                            <!-- <div class="text-danger" v-if="errors.name">{{ errors.name[0] }}</div> -->
                        </div>

                        <div class="form-group col-md-12">
                            <label for="name">Email</label>
                            <input type="text" class="form-control" id="email" v-model="email">
                            <!-- <div class="text-danger" v-if="errors.email">{{ errors.email[0] }}</div> -->
                        </div>

                        <div class="form-group col-md-12">
                            <label for="name">Mobile Number</label>
                            <input type="text" class="form-control" id="mobile_number" v-model="mobile_number">
                            <!-- <div class="text-danger" v-if="errors.mobile_number">{{ errors.mobile_number[0] }}</div> -->
                        </div>


                        <!-- <div class="form-group col-md-12">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" id="address" v-model="address">
                            <div class="text-danger" v-if="errors.address">{{ errors.address[0] }}</div>
                        </div> -->

                        <div class="form-group col-md-12">
                            <label for="service_id">Services</label>
                            <v-select
                             :options="services"
                             :reduce="item => item.id"
                             label="name"
                             placeholder="Select a Service"
                             v-model="service_id"
                            ></v-select>
                            <div class="text-danger" v-if="errors.service_id">{{ errors.service_id[0] }}</div>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="name">Appointment Date</label>
                            <input
                                type="date"
                                class="form-control"
                                id="appointment_date"
                                v-model="appointment_date"
                                :min="minDate"
                                :max="minDate"
                            />
                            <div class="text-danger" v-if="errors.appointment_date">{{ errors.appointment_date[0] }}</div>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="name">Appointment Time</label>
                            <v-select
                            :options="even_hours"
                            :reduce="hours => hours"
                            label="hours"
                            placeholder="Select a Time"
                            v-model="appointment_time"
                            ></v-select>
                            <div class="text-danger" v-if="errors.appointment_time">{{ errors.appointment_time[0] }}</div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" v-on:click="store()">Save changes</button>
                </div>
            </div>
            </div>
        </div>
        
    </div>
</template>
<script>
import axios from 'axios';

export default {
    data() {
        return {
            dataValues : [],
            dataTable : [],
            columns : ['id', 'full_name', 'email', 'mobile_number', 'service_name', 'preferred_date', 'time' ,'created_at' ,'updated_at', 'action'],
            options : {
                headings : {
                    id : 'ID',
                    full_name : 'Name',
                    email : 'Email',
                    mobile_number : 'Mobile Number',
                    service_name : 'Service',
                    preferred_date : 'Appointment Date',
                    time : 'Appointment Time',
                    created_at : 'Created At',
                    updated_at : 'Updated At',
                    action : 'Actions'
                }
            },
            errors : [],
            services : [],
            user : [],
            even_hours : [],
            id : null,
            name : '',
            mobile_number : '',
            email : '',
            service_id : '',
            appointment_date : '',
            appointment_time : '',
            minDate: '',
            modalId: '',
            modalId : '',
            modalTitle : '',
            isEdit : false,
        }
    },

    methods : {
        messageBox(title, text, type) {
            this.$fire({
                title : title,
                text : text,
                type : type,
                timer : 3000
            })
            this.getRecords();
        },
        initForm() {
                this.id = '';
                this.name = '';
                this.email = '';
                this.mobile_number = '';
                this.service_id = '';
                this.appointment_date = '';
                this.appointment_time = '';
                this.errors = [];
                this.isEdit = false;
        },
        getRecords() {
            axios.get('appointments/getrecords').then(response => {
                this.dataTable = response.data.data;
                this.services = response.data.services;
                this.user = response.data.user;
                this.even_hours = response.data.even_hours;
                
            })
        },


        addItemCategory() {
            this.initForm();
            this.modalId = 'add-appointment';
            this.modalTitle = 'Add Appointment';
            this.name = this.user.name;
            this.email = this.user.email;
            this.mobile_number = this.user.mobile_number;
            $('#' + this.modalId).modal('show');
        },

        store() {
            let data = {
                is_edit : this.isEdit,
                id : this.id,
                service_id : this.service_id,
                appointment_date:  this.appointment_date,
                appointment_time : this.appointment_time,
            }
            axios.post('appointments/store', data).then(response => {
                this.messageBox('Success', response.data.message,'success');
                $('#' + this.modalId).modal('hide');
                this.getRecords();
             
            }).catch(error => {
    
                this.errors = error.response.data.errors;
            });
        },


        edit(id) {
            this.isEdit = true;
            axios.get('appointments/edit/' + id).then(response => {
                this.modalId = 'add-appointment';
                this.modalTitle = 'Edit Appointment';
                this.id = response.data.data.id;
                this.name = response.data.data.full_name;
                this.email = response.data.data.email;
                this.mobile_number = response.data.data.mobile_number;
                this.service_id = response.data.data.service_id;
                this.appointment_date = response.data.data.preferred_date;
                this.appointment_time = response.data.data.time;
                $('#' + this.modalId).modal('show');
            })
        },

        destroy(id) {
            this.$confirm("Are you sure?", 'Delete', 'question').then(() => {
                    axios.get('appointments/destroy/' + id).then(response => {
                        this.messageBox('Success', response.data.message, 'success');
                     })
                });
        }
        
    },

    mounted() {
        this.getRecords();
        const today = new Date();
        today.setDate(today.getDate() + 1); // Calculate tomorrow's date
        this.minDate = today.toISOString().split('T')[0]; // Format as YYYY-MM-DD
    }
}
</script>