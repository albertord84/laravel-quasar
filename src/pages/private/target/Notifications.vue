<template>
    <q-page class="bg-gray q-pa-md">
      <h6 class="q-mb-none gt-sm">Notificações</h6>
      <p class="q-mt-xl q-mb-none lt-md">Notificações</p>
    </q-page>
</template>

<script>
// import { mapActions, mapGetters } from 'vuex'
// import { AuthService } from '../../../services/AuthService'
// import { master } from '../../../helpers/master'
// import _ from 'lodash'

export default {
  name: 'Questionaries',

  components: {
  },

  data () {
    return {
      loader: false,
      form: {
        username: null,
        password: null,
        grant_type: 'password'
      },
      form_rules: {
        username: 'required|max:50',
        password: 'required|min:8',
        grant_type: 'required'
      },
      window: {
        width: 0,
        height: 0
      },
      userLogged: {}
    }
  },

  methods: {

  },

  watch: {

  },

  computed: {

  },

  beforeMount () {
    this.userLogged = this.$q.localStorage.getItem('user_data')
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
      title: 'Notificações'
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
