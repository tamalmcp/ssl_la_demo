<template>
    <div class="container">
        <div class="row justify-content-center mt-3">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Product List</h5>
                        <router-link :to="{name: 'create-product'}" class="btn btn-success btn-sm"> Create Product </router-link>
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Detail</th>
                                    <th scope="col">View</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="product in products" :key="product.id">
                                    <td>{{ product.name }}</td>
                                    <td>{{ product.detail }}</td>
                                    <td>
                                        <router-link :to="{name: 'product-view', params: {id: product.id}}" class="btn btn-primary btn-sm">View</router-link>
                                        <a href="#" @click.prevent="deleteProduct(product.id)" class="btn btn-danger btn-sm">Delete</a>
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
                products: []
            }
        },
        methods:{
            loadProducts(){
                axios.get('/api/home/products').then(response => {
                    this.products = response.data;
                })
            },
            deleteProduct(productId){
                axios.delete('/api/home/delete_product/'+productId).then(response => {
                    let i = this.products.map(data => data.id).indexOf(productId);
                    this.products.splice(i, 1)

                    flash('Product Deleted Successfully', 'success');
                });
            }
        },
        mounted(){
            this.loadProducts();
        }
    }
</script>