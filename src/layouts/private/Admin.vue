<template>
  <q-layout view="hHh Lpr fFf">
    <q-header> <!--elevated -->
    <q-toolbar>
          <q-btn flat round dense icon="menu" class="q-mr-sm" />
          <q-avatar>
            <!-- <img src="https://cdn.quasar.dev/logo/svg/quasar-logo.svg"> -->
            <img class="q-ml-sm q-sm-md" :src="~'/../../assets/custom/physiback.png'" alt="Logo" width="35rem" height="35rem">
          </q-avatar>

          <q-toolbar-title><b class="">PhysiBack</b></q-toolbar-title>

          <q-btn flat round dense icon="whatshot" />
        </q-toolbar>
      <!-- <q-toolbar>
        <q-toolbar-title >
          <div class="flex q-pa-md">
            <q-btn class="" flat round dense icon="menu" @click="leftDrawer = !leftDrawer" />
            <img class="q-ml-sm q-sm-md" src="../../assets/custom/physiback.png" alt="Logo" width="35rem" height="35rem">
            </div>
        </q-toolbar-title>
            <q-space />
            <q-btn dense flat icon="minimize" />
            <q-btn dense flat icon="crop_square" />
            <q-btn dense flat icon="close" />
      </q-toolbar> -->
      <!-- <q-tabs>
        <q-route-tab icon="map" to="/your/route" replace label="One Tab" />
        <q-route-tab icon="assignment" to="/some/other/route" replace label="Other Tab"/>
      </q-tabs> -->
    </q-header>

    <!-- (Optional) A Drawer; you can add one more with side="right" or change this one's side -->
    <q-drawer v-model="leftDrawer" side="left" bordered content-class="bg-grey-2">
      <!-- QScrollArea is optional -->
      <q-scroll-area class="fit q-pa-sm">
        <!-- Content here -->
        <h1>ergerg</h1>
      </q-scroll-area>
    </q-drawer>

    <q-page-container>
      <!-- This is where pages get injected -->
      <router-view />
    </q-page-container>

  </q-layout>
</template>

<script>
export default {
  name: 'LayoutAdmin',

  data () {
    return {
      leftDrawer: true
    }
  }
}
</script>
