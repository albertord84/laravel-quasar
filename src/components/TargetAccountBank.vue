<template>
    <q-page class="bg-gray q-pa-md">
      <h6>Pagamento</h6>
    </q-page>
</template>

<script>
import { mapActions, mapGetters } from 'vuex'
import { AuthService } from '../../../services/AuthService'
import { master } from '../../../helpers/master'
import _ from 'lodash'
import { Roles } from '../helpers/roles.js'

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
    // Height: function (val) {
    //   return 'height: ' + (this.window.height - val) + 'px'
    // },

    // handleResize: function () {
    //   this.window.width = window.innerWidth
    //   this.window.height = window.innerHeight
    // },

    ...mapActions('auth', ['setAuthStatus', 'setUserData', 'storeToken']),

    async submit () {
      const isValid = await this.$refs.observer.validate()
      if (!isValid) {
        return false
      }
      this.login()
    },

    hasErrors (errors) {
      return !_.isEmpty(errors)
    },

    login () {
      this.loader = true
      AuthService.login(this.form)
        .then(response => {
          this.storeToken(response)
          this.setAuthStatus(true)
          this.setUserData(_.get(response, ['data', 'user_data'], {}))
          let redirect = _.get(this.$route, ['query', 'redirect'])
          if (redirect) {
            this.$router.replace(redirect)
          } else {
            this.$router.replace({ name: 'auth.user' })
          }
        })
        .catch(errors => {
          let errArray = master.hasErrors(errors)
          if (errArray) {
            master.setErrors(this.$refs.observer, errArray)
          }
        })
        .then(() => {
          this.loader = false
        })
    }
  },

  watch: {
    'form.username' (val) {
      if (this.$refs.observer.$data.isAuth) {
        this.$refs.observer.$data.isAuth = false
        this.$refs.password.reset()
      }
    },
    'form.password' (val) {
      if (this.$refs.observer.$data.isAuth) {
        this.$refs.observer.$data.isAuth = false
        this.$refs.username.reset()
      }
    }
  },

  computed: {
    ...mapGetters('auth', ['isAuth'])
  },

  beforeMount () {
    this.userLogged = this.$q.localStorage.getItem('user_data')
    if (this.userLogged.role_id > Roles.Superdmin) {
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

  meta () {
    return {
      title: this.$t('page_titles.login_title')
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
