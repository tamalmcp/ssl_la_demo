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
                                    <td>{{ user.name }}</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="col">Email</th>
                                    <td>{{ user.email }}</td>
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
                user: []
            }
        },
        methods:{
            loadUser(){
                var userId = this.$route.params.id;
                axios.get('/api/home/user-detail/'+userId).then(response => {
                    this.user = response.data;
                })
            }
        },
        mounted(){
            this.loadUser();
        }
    }
</script>