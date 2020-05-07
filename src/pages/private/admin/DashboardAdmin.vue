<template>
    <q-page class="bg-gray q-pa-md">
      <h6>Dashboard</h6>
    </q-page>
</template>

<script>

export default {
  name: 'DashboardAdmin',

  components: {
  },

  data () {
    return {
      loader: false
    }
  },

  methods: {

  },

  watch: {

  },

  computed: {

  },

  created () {

  },

  destroyed () {

  },

  beforeRouteEnter (to, from, next) {
    next(vm => {
      if (vm.isAuth) {
        vm.$router.replace({ name: 'public.index' })
      }
    })
  },

  meta () {
    return {
      title: 'Dasboard'
      // title: this.$t('page_titles.login_title')
    }
  }

}
</script>

<style type="text/stylus" scoped>
    .image-background {
      background-image: url('../../../assets/custom/login-background.jpg');
    }
    .login-form {
      width: 350px;
    }
    .page-background{
      background-color: #f5f5f5;
    }
    .m-text-muted{
      color:#6c757d
    }
</style>
