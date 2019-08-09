import Vue from 'vue'
import Router from 'vue-router'
import Users from '@/components/users'
import Signin from '@/components/signin'

Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      component: Signin
    },
    {
      path: '/users',
      component: Users
    }
  ]
})
