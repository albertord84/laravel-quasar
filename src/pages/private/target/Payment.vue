<template>
    <q-page class="bg-gray q-pa-md">
      <h6 class="q-mb-none gt-sm">Pagamento</h6>
      <p class="q-mt-xl q-mb-none lt-md">Pagamento</p>
    </q-page>
</template>

<script>
// import { mapActions, mapGetters } from 'vuex'
// import { AuthService } from '../../../services/AuthService'
// import { master } from '../../../helpers/master'
// import _ from 'lodash'
// import { mapGetters } from 'vuex'

export default {
  name: 'Questionaries',

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
    // ...mapGetters('auth', ['isAuth'])
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
      title: 'Pagamento'
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
