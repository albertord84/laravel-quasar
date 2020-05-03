
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

  // Authentication routes
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
    path: '/superadmin/dashboard',
    component: () => import('layouts/private/Superadmin.vue'),
    children: [
      {
        path: '/superadmin/dashboard',
        name: 'superadmin.dashboard',
        component: () => import('pages/private/superadmin/DashboardSuperAdmin.vue'),
        meta: { requiresAuth: false }
      },
      {
        path: '/superadmin/companies',
        name: 'superadmin.companies',
        component: () => import('pages/private/common/GerenciateCompanies.vue'),
        meta: { requiresAuth: false }
      },
      {
        path: '/superadmin/bases',
        name: 'superadmin.bases',
        component: () => import('pages/private/common/GerenciateBases.vue'),
        meta: { requiresAuth: false }
      },
      {
        path: '/superadmin/users',
        name: 'superadmin.users',
        component: () => import('pages/private/common/GerenciateUsers.vue'),
        meta: { requiresAuth: false }
      },
      {
        path: '/superadmin/questionaries',
        name: 'superadmin.questionaries',
        component: () => import('pages/private/common/GerenciateQuestionaries.vue'),
        meta: { requiresAuth: false }
      },
      {
        path: '/superadmin/campaigns',
        name: 'superadmin.campaigns',
        component: () => import('pages/private/common/GerenciateCampaigns.vue'),
        meta: { requiresAuth: false }
      }
    ]
  },

  // Admins routes
  {
    path: '/admin/dashboard',
    component: () => import('layouts/private/Admin.vue'),
    children: [
      {
        path: '/admin/dashboard',
        name: 'admin.dashboard',
        component: () => import('pages/private/admin/DashboardAdmin.vue'),
        meta: { requiresAuth: false }
      },
      {
        path: '/admin/questionaries',
        name: 'admin.questionaries',
        component: () => import('pages/private/common/GerenciateQuestionaries.vue'),
        meta: { requiresAuth: false }
      },
      {
        path: '/admin/campaigns',
        name: 'admin.campaigns',
        component: () => import('pages/private/common/GerenciateCampaigns.vue'),
        meta: { requiresAuth: false }
      },
      {
        path: '/admin/bases',
        name: 'admin.bases',
        component: () => import('pages/private/common/GerenciateBases.vue'),
        meta: { requiresAuth: false }
      },
      {
        path: '/admin/users',
        name: 'admin.users',
        component: () => import('pages/private/common/GerenciateUsers.vue'),
        meta: { requiresAuth: false }
      },
      {
        path: '/admin/history',
        name: 'admin.history',
        component: () => import('pages/private/admin/HistoryAdmin.vue'),
        meta: { requiresAuth: false }
      }
    ]
  },

  // Admins routes
  {
    path: '/target/dashboard',
    component: () => import('layouts/private/Target.vue'),
    children: [
      {
        path: '/target/dashboard',
        name: 'target.dashboard',
        component: () => import('pages/private/target/DashboardTarget.vue'),
        meta: { requiresAuth: false }
      },
      {
        path: '/target/questionaries',
        name: 'target.questionaries',
        component: () => import('pages/private/target/Questionaries.vue'),
        meta: { requiresAuth: false }
      },
      {
        path: '/target/payment',
        name: 'target.payment',
        component: () => import('pages/private/target/Payment.vue'),
        meta: { requiresAuth: false }
      },
      {
        path: '/target/notifications',
        name: 'target.notifications',
        component: () => import('pages/private/target/Notifications.vue'),
        meta: { requiresAuth: false }
      },
      {
        path: '/target/contactus',
        name: 'target.contactus',
        component: () => import('pages/private/target/ContactUs.vue'),
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
