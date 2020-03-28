
const routes = [

  // Public routes
  {
    path: '/',
    component: () => import('layouts/public/PublicLayout.vue'),
    children: [
      // {
      //   path: '',
      //   name: 'public.index',
      //   component: () => import('pages/public/Index.vue'),
      //   meta: { requiresAuth: false }
      // },
      {
        // path: '/login',
        path: '/',
        name: 'public.login',
        component: () => import('pages/public/Login.vue'),
        meta: { requiresAuth: false }
      },
      {
        path: '/register',
        name: 'public.register',
        component: () => import('pages/public/Register.vue'),
        meta: { requiresAuth: false }
      }
    ]
  },

  // Auth routes
  {
    path: '/',
    component: () => import('layouts/auth/AdminLayout.vue'),
    children: [
      {
        path: 'user',
        name: 'auth.user',
        component: () => import('pages/auth/User.vue'),
        meta: { requiresAuth: true }
      },
      {
        path: 'info',
        name: 'auth.info',
        component: () => import('pages/auth/Info.vue'),
        meta: { requiresAuth: true }
      }
    ]
  },

  // Admins routes
  {
    path: '/admin',
    component: () => import('layouts/private/Admin.vue'),
    children: [
      {
        path: '/admin',
        name: 'admin.dashboard',
        component: () => import('pages/private/admin/Dashboard.vue'),
        meta: { requiresAuth: false }
      },
      {
        path: '/admin/questionaries',
        name: 'admin.questionaries',
        component: () => import('pages/private/admin/Questionaries.vue'),
        meta: { requiresAuth: false }
      },
      {
        path: '/admin/campaigns',
        name: 'admin.campaigns',
        component: () => import('pages/private/admin/Campaigns.vue'),
        meta: { requiresAuth: false }
      },
      {
        path: '/admin/bases',
        name: 'admin.bases',
        component: () => import('pages/private/admin/Bases.vue'),
        meta: { requiresAuth: false }
      },
      {
        path: '/admin/users',
        name: 'admin.bases',
        component: () => import('pages/private/admin/Users.vue'),
        meta: { requiresAuth: false }
      },
      {
        path: '/admin/history',
        name: 'admin.bases',
        component: () => import('pages/private/admin/History.vue'),
        meta: { requiresAuth: false }
      }
    ]
  }

]

// Always leave this as last one
if (process.env.MODE !== 'ssr') {
  routes.push({
    path: '*',
    component: () => import('pages/Error404.vue')
  })
}

export default routes
