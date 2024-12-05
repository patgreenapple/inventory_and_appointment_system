<template>
    <div>
        <div class="header mb-3">
            <h2>Roles</h2>
            <button class="btn btn-primary" style="width: 20%" v-on:click="addItemCategory()">Add Role</button>
        </div>
        
       <div class="container-fluid">
        <v-client-table :data="dataTable" :columns="columns" :options="options">
            <template slot="action" slot-scope="props">
                <button class="btn btn-success" v-on:click="edit(props.row.id)">Edit</button>
                <button class="btn btn-danger" v-on:click="destroy(props.row.id)">Delete</button>
            </template>
        </v-client-table>
       </div>


        <div class="modal fade" id="add-role" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            columns : ['id', 'name', 'created_at' ,'updated_at', 'action'],
            options : {
                headings : {
                    id : 'ID',
                    name : 'Name',
                    created_at : 'Created At',
                    updated_at : 'Updated At',
                    action : 'Actions'
                }
            },
            errors : [],
            modalId : '',
            modalTitle : '',
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
            this.dataValues = {
                name : '',
            }
        },
        getRecords() {
            axios.get('roles/getrecords').then(response => {
                this.dataTable = response.data.data;
            })
        },


        addItemCategory() {
            this.initForm();
            this.modalId = 'add-role';
            this.modalTitle = 'Add Role';
            $('#' + this.modalId).modal('show');
        },

        store() {
            axios.post('roles/store', this.dataValues).then(response => {
                this.messageBox('Success', response.data.message,'success');
                $('#' + this.modalId).modal('hide');
             
            }).catch(error => {
    
                this.errors = error.response.data.errors;
            });
        },


        edit(id) {
            axios.get('roles/edit/' + id).then(response => {
                console.log(response)
                this.modalId = 'add-role';
                this.modalTitle = 'Edit Role';
                this.dataValues = response.data.data;
                $('#' + this.modalId).modal('show');
            })
        },

        destroy(id) {
            this.$confirm("Are you sure?", 'Delete', 'question').then(() => {
                    axios.get('roles/destroy/' + id).then(response => {
                        this.messageBox('Success', response.data.message, 'success');
                     })
                });
        }
        
    },

    mounted() {
        this.getRecords();
    }
}
</script>