import Vue from 'vue'
import Router from 'vue-router'
import Hello from '@/components/Hello'
import List from '@/components/demo/list'
import MyDetail from "@/components/demo/detail"
import ToDoBox from "@/components/lianxi2/ToDoBox"
import Login from "@/components/Login"
import Main from "@/components/Main"
import Chart from "@/components/Chart"
import ProductList from "@/components/ProductList"
import UserList from "@/components/UserList"

Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      name: 'Login',
      component: Login
    },
    {
      path: '/login',
      name: 'Login',
      component: Login
    },
    {
      path: '/main',
      name: 'Main',
      component: Main,
      children:[
        {path:"/",component:ProductList},
        {path:"/productlist",component:ProductList},
        {path:"/chart",component:Chart},
        {path:"/userlist",component:UserList}

      ]
    },











    {
      path: '/todobox',
      name: 'ToDoBox',
      component: ToDoBox
    },
    {
      path: '/list',
      name: 'List',
      component: List
    },
    {
      path:'/myDetail/:index',
      name:"MyDetail",
      component:MyDetail
    }
  ]
})
