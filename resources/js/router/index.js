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
import Auth from "../page/Auth";
import Registration from "../page/Registration";
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
            name: 'Auth',
            path: '/auth',
            component: Auth
        },
        {
            name: 'Reg',
            path: '/registration',
            component: Registration
        },
        {
            name: 'home',
            path: '/',
            component: Home,
            meta:{
                layout: "index-layout"
            }
        },
        {
            name: 'category',
            path: '/category/:id',
            component: Category,
            meta:{
                layout: "index-layout"
            }
        },
        {
            name: 'product',
            path: '/product/:id',
            component: Product,
            meta:{
                layout: "index-layout"
            }
        },
        {
            name: 'basket',
            path: '/basket',
            component: Basket,
            meta:{
                layout: "index-layout"
            }
        },
        {
            name: 'favourites',
            path: '/favourites',
            component: Favourites,
            meta:{
                layout: "index-layout"
            }
        },
        {
            name: 'orders',
            path: '/orders',
            component: Orders,
            meta:{
                layout: "index-layout"
            }
        },
        {
            name: 'order',
            path: '/order',
            component: Order,
            meta:{
                layout: "index-layout"
            }
        },
        {
            name: 'userSettings',
            path: '/user/settings',
            component: Settings,
            meta:{
                layout: "index-layout"
            }
        },
        {
            name: 'AdminPanel',
            path: '/admin',
            component: AdminIndex,
            meta:{
                layout: "admin-layout"
            }
        },
        {
            name: 'AdminOrders',
            path: '/admin/orders',
            component: AdminOrders,
            meta:{
                layout: "admin-layout"
            }
        },
        {
            name: 'AdminOrder',
            path: '/admin/order/create',
            component: AdminOrder,
            meta:{
                layout: "admin-layout"
            }
        },
        {
            name: 'AdminProducts',
            path: '/admin/products',
            component: AdminProducts,
            meta:{
                layout: "admin-layout"
            }
        },
        {
            name: 'AdminProduct',
            path: '/admin/product/create',
            component: AdminProduct,
            meta:{
                layout: "admin-layout"
            }
        },
        {
            name: 'AdminCategories',
            path: '/admin/categories',
            component: AdminCategories,
            meta:{
                layout: "admin-layout"
            }
        },
        {
            path: '*',
            redirect: '/404'
        }

    ]
})