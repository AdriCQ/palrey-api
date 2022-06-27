import { RouteRecordRaw } from 'vue-router';
import MainLayoutVue from '../layouts/MainLayout.vue';
import { ROUTE_NAME } from './names';
/**
 * routes
 */
const routes: RouteRecordRaw[] = [
    {
        path: '/',
        component: MainLayoutVue,
        children: [
            {
                path: '',
                name: ROUTE_NAME.MAIN_HOME,
                component: () => import('@/pages/IndexPage.vue')
            }, {
                path: '',
                name: ROUTE_NAME.MAIN_TEST,
                component: () => import('@/pages/TestPage.vue')
            }
        ]
    }
];

export default routes;
