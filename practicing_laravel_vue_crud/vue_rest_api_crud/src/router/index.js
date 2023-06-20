import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import JobsIndex from '../views/JobsIndex.vue'
import JobsCreate from '../views/JobsCreate.vue'
import JobsEdit from '../views/JobsEdit.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView
    },
      {
          path: '/jobs',
          name: 'jobsIndex',
          component: JobsIndex
      },
      {
          path: '/jobs/create',
          name: 'jobsCreate',
          component: JobsCreate
      },
      {
          path: '/jobs/edit/:id',
          name: 'jobsEdit',
          component: JobsEdit,
          props: true
      }
  ]
})

export default router
