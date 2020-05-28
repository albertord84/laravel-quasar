<template>
  <q-layout view="hHh Lpr fFf">

      <q-header class="bg-orange-8"> <!--elevated -->
          <q-toolbar class="q-pa-md">
              <q-btn flat round dense icon="menu" class="q-mr-sm" @click="leftDrawer = !leftDrawer"/>
              <img class="q-ml-sm q-sm-md hover-pointer" src="../../assets/custom/physiback.png" alt="Logo" width="35rem" height="35rem">
              <q-toolbar-title><b class="hover-pointer">PhysiBack</b></q-toolbar-title>
              <q-btn-dropdown stretch shrink  flat icon="account_circle">
                  <q-list>
                      <q-item clickable tabindex="0">
                          <q-item-section>
                            <q-item-label>Editar perfil</q-item-label>
                          </q-item-section>
                          <q-item-section side>
                            <q-icon name="edit" class="cl-orange-14" ></q-icon>
                          </q-item-section>
                      </q-item>

                      <q-item clickable @click="logout($router)" tabindex="0">
                          <q-item-section>
                            <q-item-label>Encerrar sessão</q-item-label>
                          </q-item-section>
                          <q-item-section side>
                            <q-icon name="exit_to_app" class="cl-orange-14" ></q-icon>
                          </q-item-section>
                      </q-item>
                  </q-list>
              </q-btn-dropdown>
          </q-toolbar>
      </q-header>

      <q-drawer v-model="leftDrawer" show-if-above side="left" :breakpoint="500" bordered content-class="bg-grey-8">
          <q-scroll-area class="fit">
              <q-list v-for="(menuItem, index) in menuList" :key="index">
                  <q-item :to="menuItem.link" clickable :active="menuItem.label === 'Questionários'" @click="setSelected(index)" v-ripple>
                      <q-item-section avatar>
                          <q-icon style="color:white" :name="menuItem.icon" />
                      </q-item-section>
                      <q-item-section style="color:white">
                          {{ menuItem.label }}
                      </q-item-section>
                  </q-item>
              </q-list>
          </q-scroll-area>
      </q-drawer>

      <q-page-container style="padding-top:1.2rem !important">
          <router-view />
      </q-page-container>

  </q-layout>
</template>

<script>
import { mapActions } from 'vuex'

export default {
  name: 'LayoutAdmin',

  data () {
    return {
      leftDrawer: true,
      menuList: [
        {
          icon: 'home',
          label: 'Dashboard',
          link: '/superadmin/dashboard',
          selected: 'true',
          separator: false
        },
        {
          icon: 'apartment',
          label: 'Empresas',
          link: '/superadmin/companies',
          selected: false,
          separator: false
        },
        {
          icon: 'storage',
          label: 'Bases',
          link: '/superadmin/bases',
          selected: false,
          separator: false
        },
        {
          icon: 'group',
          label: 'Usuários',
          link: '/superadmin/users',
          selected: false,
          separator: false
        },
        {
          icon: 'list_alt',
          label: 'Questionários',
          link: '/superadmin/questionnaires',
          selected: false,
          separator: false
        },
        {
          icon: 'style',
          label: 'Campanhas',
          link: '/superadmin/campaigns',
          selected: false,
          separator: false
        },
        {
          icon: 'transfer_within_a_station',
          label: 'Recompensas',
          link: '/superadmin/recompenses',
          selected: false,
          separator: false
        },
        {
          icon: 'monetization_on',
          label: 'Pagamentos',
          link: '/superadmin/payments',
          selected: false,
          separator: false
        }
      ],
      userLogged: {}
    }
  },

  methods: {
    setSelected: function (index) {
      this.menuList.some((item, i) => {
        this.menuList[i].selected = false
        if (i === index) {
          this.menuList[i].selected = true
        }
      })
    },

    ...mapActions('auth', ['logout'])
  },

  beforeMount () {
    this.userLogged = this.$q.localStorage.getItem('user_data')
  }
}
</script>

<style  scoped>
  .cl-orange-14{
    color: #fb8c00;
  }
  .hover-pointer:hover{
    cursor: pointer;
  }
</style>
