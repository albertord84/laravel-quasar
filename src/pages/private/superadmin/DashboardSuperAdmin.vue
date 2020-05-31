<template>
    <q-page class="bg-gray q-pa-md">
      <h6>Dashboard do Super Admin</h6>
      <h6>Dashboard para o SuperAdmin (estatísticas gerais e graficos)</h6>
    </q-page>
</template>

<script>
// import { mapActions } from 'vuex'
// import { mapGetters } from 'vuex'
// import { mapActions, mapGetters } from 'vuex'
// import { AuthService } from '../../../services/AuthService'
import { Roles } from '../../../helpers/userRoles.js'

export default {
  name: 'DashboardSuperAdmin',

  components: {
  },

  data () {
    return {
      loader: false,
      userLogged: {}
    }
  },

  methods: {

    ola () {

    }

  },

  watch: {

  },

  computed: {
    // ...mapGetters('auth', ['isAuth'])
  },

  beforeMount () {
    this.userLogged = this.$q.localStorage.getItem('user_data')
    if (this.userLogged.role_id > Roles.Superadmin) {
      this.$router.replace({ name: 'public.denied' })
    }
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

  mounted () {
    this.ola()
  },

  meta () {
    return {
      title: 'Dashboard'
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
