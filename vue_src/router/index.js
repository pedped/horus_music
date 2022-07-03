import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView
    },
    {
      path: '/login',
      name: 'login',
      component: () => import('../views/User/LoginView.vue')
    },
    {
      path: '/signup',
      name: 'signup',
      component: () => import('../views/User/SignupView.vue')
    },
    {
      path: '/logout',
      name: 'logout',
      component: () => import('../views/User/Logout.vue')
    },
    {
      path: '/upload',
      name: 'upload',
      component: () => import('../views/Music/Upload.vue')
    },
    {
      path: '/my_musics',
      name: 'my_musics',
      component: () => import('../views/Music/MyMusics.vue')
    },
    {
      path: '/admin/index',
      name: 'admin_index',
      component: () => import('../views/Admin/Index/Index.vue')
    },
    {
      path: '/admin/music/list',
      name: 'admin_music_list',
      component: () => import('../views/Admin/Music/List.vue')
    },
    {
      path: '/admin/music/view/:id',
      name: 'view_musics',
      component: () => import('../views/Admin/Music/View.vue')
    }
  ]
})

export default router
