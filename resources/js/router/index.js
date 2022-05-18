import VueRouter from 'vue-router';

import Home from "../page/Home";
import Basket from "../page/Basket";
import Favourites from "../page/Favourites";
import Orders from "../page/Orders";
import Order from "../page/Order";
import Product from "../page/Product";
import Category from "../page/Category";
import Settings from "../page/User/Profile";
import AdminOrders from "../page/Admin/AdminOrders";
import AdminOrder from "../page/Admin/AdminOrder";
import AdminIndex from "../page/Admin/AdminIndex";
import AdminProducts from "../page/Admin/AdminProducts";
import AdminProduct from "../page/Admin/AdminProduct";
import NotFound from "../page/NotFound";
import AdminCategories from "../page/Admin/AdminCategories";

import NewsComponent from "../page/NewsComponent";
import ProductComponent from "../page/ProductionComponent";
import MainComponent from "../page/layouts/MainComponent";
import AuthComponent from "../page/AuthComponent";
import RegistrationComponent from "../page/RegistrationComponent";
import ProfileComponent from "../page/ProfileComponent";
import NotFoundComponent from "../page/NotFoundComponent";

export default new VueRouter ({
    mode: 'history',
    linkExactActiveClass: "active",
    routes: [
        {
            name: '404',
            path: '/404',
            component: NotFound
        },
        {
            name: 'home',
            path: '/',
            component: Home
        },
        {
            name: 'category',
            path: '/category/:id',
            component: Category,
        },
        {
            name: 'product',
            path: '/product/:id',
            component: Product
        },
        {
            name: 'product',
            path: '/product/:id',
            component: Home
        },
        {
            name: 'basket',
            path: '/basket',
            component: Basket
        },
        {
            name: 'favourites',
            path: '/favourites',
            component: Favourites
        },
        {
            name: 'orders',
            path: '/orders',
            component: Orders
        },
        {
            name: 'order',
            path: '/order',
            component: Order
        },
        {
            name: 'userSettings',
            path: '/user/settings',
            component: Settings
        },
        {
            name: 'AdminPanel',
            path: '/admin',
            component: AdminIndex
        },
        {
            name: 'AdminOrders',
            path: '/admin/orders',
            component: AdminOrders,
        },
        {
            name: 'AdminOrder',
            path: '/admin/order/create',
            component: AdminOrder,
        },
        {
            name: 'AdminProducts',
            path: '/admin/products',
            component: AdminProducts,
        },
        {
            name: 'AdminProduct',
            path: '/admin/product/create',
            component: AdminProduct,
        },
        {
            name: 'AdminCategories',
            path: '/admin/categories',
            component: AdminCategories,
        },
        {
            path: '*',
            redirect: '/404'
        }

    ]
})
