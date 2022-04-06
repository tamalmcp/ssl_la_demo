<template>
    <div class="container">
        <div class="row justify-content-center mt-3">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">User List</div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">View</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="user in users" :key="user.id">
                                    <td>{{ user.name }}</td>
                                    <td>{{ user.email }}</td>
                                    <td>
                                        <router-link :to="{name: 'user-view', params: {id: user.id}}" class="btn btn-primary btn-sm">View</router-link>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default{
        data(){
            return{
                users: []
            }
        },
        methods:{
            loadUsers(){
                axios.get('/api/home/users').then(response => {
                    this.users = response.data;
                })
            }
        },
        mounted(){
            this.loadUsers();
        }
    }
</script>