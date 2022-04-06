<template>
    <div class="container">
        <div class="row justify-content-center mt-3">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Product Detail</h5>
                        <router-link :to="{name: 'product-list'}" class="btn btn-success btn-sm"> Product List </router-link>
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <td>{{ product.name }}</td>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="col">Detail</th>
                                <td>{{ product.detail }}</td>
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
                product: []
            }
        },
        methods:{
            loadProduct(){
                var productId = this.$route.params.id;
                axios.get('/api/home/product-detail/'+productId).then(response => {
                    this.product = response.data;
                });
            }
        },
        mounted(){
            this.loadProduct();
        }
    }
</script>