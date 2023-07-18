import { createRouter, createWebHistory } from 'vue-router';
import TaskList from '@/views/Tasks/TaskList.vue';
import TaskDetail from '@/views/Tasks/TaskDetail.vue';
import Login from '@/views/Auth/Login.vue';

const routes = [
    {
        path: '/task/home',
        component: TaskList,
    },
    {
        path: '/task/detail/:id',
        component: TaskDetail,
        name: 'task-detail',
        props: true,
    },
    {
        path: '/task/login',
        component: Login,
    },
];


const router = createRouter({
    history: createWebHistory(),
    routes,
})
export default router
