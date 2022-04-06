import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import Home from '../pages/home.vue';

import CategoryList from '../pages/category/index.vue';
import ProductList from '../pages/products/index.vue';
import CreateProduct from '../pages/products/create.vue';
import ProductView from '../pages/products/view.vue';
import UserList from '../pages/users/index.vue';
import UserView from '../pages/users/view.vue';

const routes = new VueRouter({
    mode: 'history',
    linkExactActiveClass: "active",
    routes: [
        {
            path: '/home',
            component: Home,
            name: 'home'
        },
        {
            path: '/home/product',
            component: ProductList,
            name: 'product-list'
        },
        {
            path: '/home/product/:id',
            component: ProductView,
            name: 'product-view'
        },
        {
            path: '/home/product/create',
            component: CreateProduct,
            name: 'create-product'
        },
        {
            path: '/home/category',
            component: CategoryList,
            name: 'category-list'
        },
        {
            path: '/home/users',
            component: UserList,
            name: 'user-list'
        },
        {
            path: '/home/user/:id',
            component: UserView,
            name: 'user-view'
        }
    ]
});

export default routes;

