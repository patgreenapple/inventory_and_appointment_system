<template>
    <div>
        <div class="header mb-3">
            <h2>Users</h2>
            <button class="btn btn-primary" style="width: 20%" v-on:click="addItemCategory()">Add User</button>
        </div>
        
       <div class="container-fluid">
        <v-client-table :data="dataTable" :columns="columns" :options="options">
            <template slot="action" slot-scope="props">
                <button class="btn btn-success" v-on:click="edit(props.row.id)">Edit</button>
                <button class="btn btn-secondary" v-on:click="changePasswordModal(props.row.id)">Change Password</button>
                <button class="btn btn-danger" v-on:click="destroy(props.row.id)">Delete</button>
            </template>
        </v-client-table>
       </div>


        <div class="modal fade" id="add-user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <input type="text" class="form-control" id="name" v-model="dataValues.name">
                            <div class="text-danger" v-if="errors.name">{{ errors.name[0] }}</div>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="name">Email</label>
                            <input type="email" class="form-control" id="name" v-model="dataValues.email">
                            <!-- <div class="text-danger" v-if="errors.name">{{ errors.name[0] }}</div> -->
                        </div>

                        <div class="form-group col-md-12">
                            <label for="name">Mobile Number</label>
                            <input type="text" class="form-control" id="name" v-model="dataValues.mobile_number">
                            <!-- <div class="text-danger" v-if="errors.name">{{ errors.name[0] }}</div> -->
                        </div>

                        <div class="form-group col-md-12">
                            <label for="name">Address</label>
                            <input type="text" class="form-control" id="name" v-model="dataValues.address">
                            <!-- <div class="text-danger" v-if="errors.name">{{ errors.name[0] }}</div> -->
                        </div>

                        <!-- <div  class="form-group col-md-12">
                            <label for="name">Password</label>
                            <input type="test" class="form-control" id="name" v-model="dataValues.password">
                            <div class="text-danger" v-if="errors.name">{{ errors.name[0] }}</div>
                        </div> -->

                        <div class="form-group col-md-12">
                            <label for="name">Role</label>
                            <v-select
                            :options="roles"
                            :reduce="item => item.id"
                            label="name"
                            v-model="dataValues.role_id"
                            placeholder="Select Role"
                            >
                            </v-select>
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


        <div class="modal fade" id="changepassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <div  class="form-group col-md-12">
                            <label for="name">New Password</label>
                            <input type="password" class="form-control" id="name" v-model="dataPassword.newPassword">
                            <div class="text-danger" v-if="errors.newPassword">{{ errors.newPassword[0] }}</div>
                        </div>

                        <div  class="form-group col-md-12">
                            <label for="name">Confirm Password</label>
                            <input type="password" class="form-control" id="name" v-model="dataPassword.confirmPassword">
                            <div class="text-danger" v-if="errors.confirmPassword">{{ errors.confirmPassword[0] }}</div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" v-on:click="changePassword()">Save changes</button>
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
            columns : ['id', 'name', 'email', 'mobile_number', 'address', 'role' ,'created_at' ,'updated_at', 'action'],
            options : {
                headings : {
                    id : 'ID',
                    name : 'Name',
                    email : 'Email',
                    mobile_number : 'Mobile Number',
                    address : 'Address',
                    role : 'Role',
                    created_at : 'Created At',
                    updated_at : 'Updated At',
                    action : 'Actions'
                }
            },
            errors : [],
            roles : [],
            dataPassword : [],
            modalId : '',
            modalTitle : '',
            isEdit : false,
            userID : '',
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
            this.errors = [];
            this.isEdit = false;
            this.dataValues = {
                name : '',
                email : '',
                mobile_number : '',
                address : '',
                role_id : '',
            }
        },
        getRecords() {
            axios.get('users/getrecords').then(response => {
                this.dataTable = response.data.data;
                this.roles = response.data.roles;
            })
        },


        addItemCategory() {
            this.initForm();
            this.modalId = 'add-user';
            this.modalTitle = 'Add User';
            $('#' + this.modalId).modal('show');
        },

        store() {
            axios.post('users/store', this.dataValues).then(response => {
                this.messageBox('Success', response.data.message,'success');
                $('#' + this.modalId).modal('hide');
             
            }).catch(error => {
    
                this.errors = error.response.data.errors;
            });
        },


        edit(id) {
            axios.get('users/edit/' + id).then(response => {
                this.isEdit = true;
                this.modalId = 'add-user';
                this.modalTitle = 'Edit User';
                this.dataValues = response.data.data;
                console.log(this.dataValues);
                $('#' + this.modalId).modal('show');
            })
        },

        destroy(id) {
            this.$confirm("Are you sure?", 'Delete', 'question').then(() => {
                    axios.get('users/destroy/' + id).then(response => {
                        this.messageBox('Success', response.data.message, 'success');
                     })
                });
        },

        changePasswordModal(id) {
            $('#changepassword').modal('show');
            this.modalTitle = 'Change Password';
            this.dataPassword = {
                user_id : id,
                newPassword : '',
                confirmPassword : '',
            };
        },

        changePassword() {
            
            if(this.dataPassword.newPassword == this.dataPassword.confirmPassword) {
                axios.post('users/store_changepassword', this.dataPassword).then(response => {
                this.messageBox('Success', response.data.message,'success');
                $('#changepassword').modal('hide');
             
            }).catch(error => {
                this.errors = error.response.data.errors;
            });
            } else {
                this.messageBox('Alert', 'Password does not match!', 'warning');
            }
           
        }
        
    },

    mounted() {
        this.getRecords();
    }
}
</script>