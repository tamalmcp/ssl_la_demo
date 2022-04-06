<template>
    <div class="container">
        <div class="row justify-content-center mt-3">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Product List</h5>
                        <router-link :to="{name: 'product-list'}" class="btn btn-success btn-sm"> Product  List</router-link>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 offset-3">
                                <form id = "productForm" @submit.prevent = "createProduct">
                                    <div class="form-group">
                                        <label for="">Product Name</label>
                                        <input type="text" class="form-control" placeholder="Product Name" name="name">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Product Description</label>
                                        <input type="text" class="form-control" placeholder="Product Detail" name="detail">
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-success mt-2">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
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
            createProduct(){
                var productFormData = new FormData(document.getElementById("productForm"));
                axios.post('/api/home/product_create', productFormData).then(response => {
                    this.products = response.data;
                console.log(response.data);
                })
            }
        },
        mounted(){
//            this.createProduct();
        }
    }
</script>