import { createRouter, createWebHistory } from 'vue-router';
import routes from './routes';
/**
 * Create Router
 */
const router = createRouter({
  history: createWebHistory(),
  routes
});

export default router;

/**
 * ROUTE_NAME
 */
export * from './names';
