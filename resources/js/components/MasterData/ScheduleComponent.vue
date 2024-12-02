<template>
    <div>
        <div class="header mb-3">
            <h2>Schedules</h2>
            <!-- <button class="btn btn-primary" style="width: 20%" v-on:click="addItemCategory()">Add Schedule</button> -->
        </div>


        <div class="row">
            <div class="col-md-6">
              <div class="card">
                    <div class="card-header"></div>
                        <div class="card-body">
                              <div class="row">
                                    <div class="col-md-12"> 
                                        <div class="form-group">
                                            <input type="hidden" class="form-control" id="name" v-model="id">
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Opening Time</label>
                                            <input type="time" class="form-control" id="name" v-model="opening_time">
                                            <div class="text-danger" v-if="errors.opening_time">{{ errors.opening_time[0] }}</div>
                                        </div>

                                        <div class="form-group">
                                            <label for="name">Closing Time</label>
                                            <input type="time" class="form-control" id="name" v-model="closing_time">
                                            <div class="text-danger" v-if="errors.closing_time">{{ errors.closing_time[0] }}</div>
                                        </div>


                                        <div class="form-group">
                                            <label for="name">Number of Clients Per Day</label>
                                            <input type="number" class="form-control" id="name" v-model="number_of_clients_per_day">
                                            <div class="text-danger" v-if="errors.number_of_clients_per_day">{{ errors.number_of_clients_per_day[0] }}</div>
                                        </div>
                                    </div>
                              </div>  
                        </div>
                        <div class="card-footer d-flex justify-content-end">
                            <div>
                                <button class="btn btn-primary" v-on:click="store()">Save</button>
                            </div>
                            
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
            id : '',
            opening_time : '',
            closing_time : '',
            number_of_clients_per_day : '',
            errors : [],
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
       
        getRecords() {

            axios.get('schedule/getrecords').then(response => {
                this.id = response.data.data.id;
                this.opening_time = response.data.data.opening_time;
                this.closing_time = response.data.data.closing_time;
                this.number_of_clients_per_day = response.data.data.number_of_clients_per_day;
            })
        },


        store() {
            let data = {
                id : this.id,
                opening_time : this.opening_time,
                closing_time : this.closing_time,
                number_of_clients_per_day : this.number_of_clients_per_day,
            }
            axios.post('schedule/store', data).then(response => {
                this.messageBox('Success', response.data.message,'success');
            }).catch(error => {
    
                this.errors = error.response.data.errors;
            });
        },

        
    },

    mounted() {
        this.getRecords();
    }
}
</script>