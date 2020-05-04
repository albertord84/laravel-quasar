<template>
  <q-layout view="hHh Lpr fFf">

      <q-header class="bg-orange-8"> <!--elevated -->
          <q-toolbar class="q-pa-md">
              <q-btn flat round dense icon="menu" class="q-mr-sm" @click="leftDrawer = !leftDrawer"/>
              <img class="q-ml-sm q-sm-md hover-pointer" src="../../assets/custom/physiback.png" alt="Logo" width="35rem" height="35rem">
              <q-toolbar-title><b class="hover-pointer">PhysiBack</b></q-toolbar-title>
              <q-btn-dropdown stretch shrink  flat icon="account_circle">
                  <q-list>
                      <!-- <q-item-label header>Folders</q-item-label> -->
                      <q-item clickable v-close-menu tabindex="0">
                          <!-- <q-item-section avatar>
                            <q-avatar icon="folder" color="secondary" text-color="white" ></q-avatar>
                          </q-item-section> -->
                          <q-item-section>
                            <q-item-label>Editar perfil</q-item-label>
                            <!-- <q-item-label caption>February 22, 2016</q-item-label> -->
                          </q-item-section>
                          <q-item-section side>
                            <q-icon name="edit" class="cl-orange-14" ></q-icon>
                          </q-item-section>
                      </q-item>
                      <q-item clickable v-close-menu tabindex="0">
                          <!-- <q-item-section avatar>
                            <q-avatar icon="folder" color="secondary" text-color="white" ></q-avatar>
                          </q-item-section> -->
                          <q-item-section>
                            <q-item-label>Encerrar sessão</q-item-label>
                            <!-- <q-item-label caption>February 22, 2016</q-item-label> -->
                          </q-item-section>
                          <q-item-section side>
                            <q-icon name="exit_to_app" class="cl-orange-14" ></q-icon>
                          </q-item-section>
                      </q-item>
                      <!-- <q-separator inset spaced ></q-separator>
                      <q-item-label header>Files</q-item-label>
                      <q-item  clickable v-close-menu tabindex="0">
                          <q-item-section avatar>
                              <q-avatar icon="assignment" color="primary" text-color="white" ></q-avatar>
                          </q-item-section>
                          <q-item-section>
                              <q-item-label>Vacation</q-item-label>
                              <q-item-label caption>February 22, 2016</q-item-label>
                          </q-item-section>
                          <q-item-section side>
                              <q-icon name="info" ></q-icon>
                          </q-item-section>
                      </q-item> -->
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
          link: '/admin',
          selected: 'true',
          separator: false
        },
        {
          icon: 'list_alt',
          label: 'Questionários',
          link: '/admin/questionaries',
          selected: false,
          separator: false
        },
        {
          icon: 'style',
          label: 'Campanhas',
          link: '/admin/campaigns',
          selected: false,
          separator: false
        },
        {
          icon: 'storage',
          label: 'Bases',
          link: '/admin/bases',
          selected: false,
          separator: false
        },
        {
          icon: 'group',
          label: 'Usuários',
          link: '/admin/users',
          selected: false,
          separator: false
        },
        {
          icon: 'history',
          label: 'Histórico',
          link: '/admin/history',
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
</style>
