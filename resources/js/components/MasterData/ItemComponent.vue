<template>
    <div>
        <div class="header mb-3">
            <h2>Items</h2>
            <button class="btn btn-primary" style="width: 20%" v-on:click="addItem()">Add Item</button>
        </div>
        
       <div class="container-fluid">
        <v-client-table :data="dataTable" :columns="columns" :options="options">
            <template slot="action" slot-scope="props">
                <button class="btn btn-success" v-on:click="edit(props.row.id)">Edit</button>
                <button class="btn btn-danger" v-on:click="destroy(props.row.id)">Delete</button>
            </template>
        </v-client-table>
       </div>


        <div class="modal fade" id="add-item" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ this.modalTitle }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <div class="row col-12">
                        <div class="form-group col-md-12">
                            <label for="">Item Categories</label>
                            <v-select
                            :options="itemCategories"
                            :reduce="item => item.id"
                            label="name"
                            v-model="dataValues.item_category_id"
                            placeholder="Select Item Category"
                            ></v-select>
                            <div class="text-danger" v-if="errors.item_category_id"> {{ errors.item_category_id[0] }} </div>
                        </div>
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
            columns : ['id', 'item_category_name' ,'name', 'created_at' ,'updated_at', 'action'],
            options : {
                headings : {
                    id : 'ID',
                    item_category_name : 'Item Category Name',
                    name : 'Name',
                    created_at : 'Created At',
                    updated_at : 'Updated At',
                    action : 'Actions'
                }
            },
            itemCategories : [],
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
                item_category_id : '',
                name : '',
            }
        },
        getRecords() {
            axios.get('item/getrecords').then(response => {
                this.dataTable = response.data.data;
                this.itemCategories = response.data.item_categories;
            })
        },


        addItem() {
            this.initForm();
            this.modalId = 'add-item';
            this.modalTitle = 'Add Item Category';
            $('#' + this.modalId).modal('show');
        },

        store() {
            axios.post('item/store', this.dataValues).then(response => {
                this.messageBox('Success', response.data.message,'success');
                $('#' + this.modalId).modal('hide');
             
            }).catch(error => {
    
                this.errors = error.response.data.errors;
            });
        },


        edit(id) {
            axios.get('item/edit/' + id).then(response => {
                console.log(response)
                this.modalId = 'add-item';
                this.modalTitle = 'Edit Item';
                this.dataValues = response.data.data;
                $('#' + this.modalId).modal('show');
            })
        },

        destroy(id) {
            this.$confirm("Are you sure?", 'Delete', 'question').then(() => {
                    axios.get('item/destroy/' + id).then(response => {
                        this.messageBox('Success', response.data.message, 'success');
                     })
                });
        },
        
    },

    mounted() {
        this.getRecords();
    }
}
</script>