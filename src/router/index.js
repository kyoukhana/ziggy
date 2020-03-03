import Vue from 'vue';
import VueRouter from 'vue-router';
import Home from '../views/Home.vue';


Vue.use(VueRouter);

const routes = [
  {
    path: '/',
    name: 'home',
    component: Home,
  },

  {
  path: '/api',
  },

];


const loadRoutes = [
  ...routes,
];


const router = new VueRouter({
  hashbang: false,
  linkActiveClass: 'active',
  mode: 'history',
  routes: loadRoutes,
});

export default router;
