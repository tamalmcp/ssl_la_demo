<template>
    <div class="container">
        <div class="row justify-content-center mt-3 mb-3">
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
                            <tbody v-if="products && products.data.length > 0">
                                <tr v-for="product in products.data" :key="product.id">
                                    <td>{{ product.name }}</td>
                                    <td>{{ product.detail }}</td>
                                    <td>
                                        <router-link :to="{name: 'product-view', params: {id: product.id}}" class="btn btn-primary btn-sm">View</router-link>
                                        <a href="#" @click.prevent="deleteProduct(product.id)" class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr>
                            </tbody>
                            <tbody v-else>
                                <tr>
                                    <td align="center" colspan="3">No record found.</td>
                                </tr>
                            </tbody>
                        </table>

                        <div v-if="products && products.data.length > 0">
                            <pagination :data="products" @pagination-change-page="loadProducts">
                                <span slot="prev-nav">&lt; Previous</span>
                                <span slot="next-nav">Next &gt;</span>
                            </pagination>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import pagination from 'laravel-vue-pagination'
    export default{
        data(){
            return{
                products: {}
            }
        },
        methods:{
            loadProducts(page = 1){
                axios.get('/api/home/products?page='+page).then(response => {
                    this.products = response.data;
                }).catch(({ response })=>{
                    console.error(response)
                })
            },
            deleteProduct(productId){
                axios.delete('/api/home/delete_product/'+productId).then(response => {
                let indx = this.products.data.map(data => data.id).indexOf(productId);
                this.products.data.splice(indx, 1);

                    flash('Product Deleted Successfully', 'success');
                });
            }
        },
        mounted(){
            this.loadProducts();
        }
    }
</script>

<style scoped>
    .pagination{
        margin-bottom: 0;
    }
</style>