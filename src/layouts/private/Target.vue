<template>
  <q-layout view="hHh Lpr fFf">

      <q-header class="bg-orange-8">
          <q-toolbar class="q-pa-md">
              <q-btn flat round dense icon="menu" class="q-mr-sm gt-xs" @click="leftDrawer = !leftDrawer"/>
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
          <q-toolbar class="flex justify-between q-px-md xs">
            <q-btn :to="'/target/dashboard'"  flat round dense icon="home" class="q-mr-sm"/>
            <q-btn :to="'/target/questionnaires'"  flat round dense icon="list_alt" class="q-mr-sm">
              <q-badge color="green-13" text-color="white" multi-line floating>2</q-badge>
            </q-btn>
            <q-btn :to="'/target/payment'"  flat round dense icon="money" class="q-mr-sm"/>
            <q-btn :to="'/target/notifications'" flat round dense icon="notifications" class="q-mr-sm">
              <q-badge color="red" text-color="white" multi-line floating>4</q-badge>
            </q-btn>
            <q-btn :to="'/target/contactus'"  flat round dense icon="mail_outline" class="q-mr-sm"/>
          </q-toolbar>
      </q-header>

      <q-drawer  v-model="leftDrawer" side="left" :breakpoint="500" bordered content-class="bg-grey-8">
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

      <q-page-container class="content-top">
          <router-view />
      </q-page-container>

  </q-layout>
</template>

<script>
import { mapActions } from 'vuex'
export default {
  name: 'LayoutTarget',

  data () {
    return {
      leftDrawer: true,
      menuList: [
        {
          icon: 'home',
          label: 'Dashboard',
          link: '/target/dashboard',
          selected: true,
          separator: false
        },
        {
          icon: 'list_alt',
          label: 'Questionários',
          link: '/target/questionnaires',
          selected: false,
          separator: false
        },
        {
          icon: 'storage',
          label: 'Pagamento',
          link: '/target/payment',
          selected: false,
          separator: false
        },
        {
          icon: 'notifications',
          label: 'Notificações',
          link: '/target/notifications',
          selected: false,
          separator: false
        },
        {
          icon: 'mail_outline',
          label: 'Contato',
          link: '/target/contactus',
          selected: false,
          separator: false
        }
      ]
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
  .content-top{
    padding-top:1.2rem !important
  }

  @media screen and (max-width: 600px) {
    .content-top{
      padding-top:5rem !important
    }
  }
</style>
