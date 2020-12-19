import Vue from 'vue'
import VueRouter from 'vue-router'
//import Home from '../views/Home.vue'
import Contacts from '../views/Contacts.vue'
import ProductMenu from '../views/Menu/ProductMenu.vue'
import CategoryMenu from '../views/Menu/CategoryMenu.vue'
import Cart from '../views/cart/v-cart.vue'
import Previos from '../views/Previos.vue'

Vue.use(VueRouter)

  const routes = [
  {
    path: '/',
    name: 'CategoryMenu',
    component: CategoryMenu,
    props: true
  },
  {
    path: '/menu',
    name: 'ProductMenu',
    component: ProductMenu,
    props: true
  },
  {
    path: '/previos',
    name: 'previos',
    component: Previos
  },
  {
    path: '/about',
    name: 'About',
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () => import(/* webpackChunkName: "about" */ '../views/About.vue')
  },
  {
    path: '/cart',
    name: 'Cart',
    component: Cart,
    props: true
  },
  {
    path: '/contacts',
    name: 'Contacts',
    component: Contacts
  },
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router
