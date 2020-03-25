<template>
    <q-layout view="hHh lpR fFf">
        <q-page-container>
          <router-view />
        </q-page-container>
    </q-layout>
</template>

<script>
import { mapGetters } from 'vuex'
export default {
  name: 'PublicLayout',
  components: {
  },
  computed: {
    ...mapGetters('auth', ['isAuth'])
  }
}
</script>

<style>
</style>
