import { RouteRecordRaw } from 'vue-router';
import { ROUTE_NAME } from './names';
/**
 * routes
 */
const routes: RouteRecordRaw[] = [
    {
        path: '',
        name: ROUTE_NAME.MAIN_HOME,
        component: () => import('@/pages/IndexPage.vue')
    },
];

export default routes;
