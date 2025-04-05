import { createRouter, createWebHistory } from 'vue-router';
import Home from '../views/Home.vue';
import Items from '../views/Items.vue';
import ItemDetail from '../views/ItemDetail.vue';

const routes = [
    {
        path: '/',
        name: 'home',
        component: Home
    },
    {
        path: '/items',
        name: 'items',
        component: Items
    },
    {
        path: '/items/:id',
        name: 'item-detail',
        component: ItemDetail,
        props: true
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes
});

export default router;