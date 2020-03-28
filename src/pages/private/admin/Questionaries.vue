<template>
    <q-page class="bg-gray q-pa-md">
      <div class="flex justify-between">
        <h6>Questionários</h6>
        <q-btn flat round color="primary" icon="help"/>
      </div>

      <q-card no-bordered flat>
        <q-tabs v-model="tab" dense class="text-grey" active-color="orange-10" indicator-color="orange-10" align="left" caps inline-label>
          <q-tab name="questionaries" class="text-dark" @click="restartPlaneCriation"  icon="horizontal_split"  label="Questionários" />
          <q-tab name="crudQuestionary" class="text-dark" icon="add" label="Novo questionário" />
        </q-tabs>
        <q-separator/>
        <q-tab-panels v-model="tab" animated>

          <q-tab-panel name="questionaries" class="q-pa-none">
            <div class="text-h6">Questionários</div>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. <br>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. <br>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. <br>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. <br>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. <br>
          </q-tab-panel>

          <q-tab-panel name="crudQuestionary">
            <Planes v-if="showSelectPlane" :plane="initialPlane" @onselectedplane="selectedPlane"></Planes>
            <CrudQuestionary v-if="showCrudQuestionary" :plane="plane" :action="'insert'" @onchangeplane="changePlane"></CrudQuestionary>
          </q-tab-panel>

        </q-tab-panels>
      </q-card>
    </q-page>
</template>

<script>
import { mapActions, mapGetters } from 'vuex'
import { AuthService } from '../../../services/AuthService'
import { master } from '../../../helpers/master'
import _ from 'lodash'

export default {
  name: 'Questionaries',

  components: {
    'Planes': require('../../../components/Planes.vue').default,
    'CrudQuestionary': require('../../../components/CrudQuestionary.vue').default
  },

  data () {
    return {
      tab: 'questionaries',
      plane: [],
      initialPlane: { 'code': 0, 'name': 'Ideal' },
      showSelectPlane: true,
      showCrudQuestionary: false,

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
      }
    }
  },

  methods: {

    selectedPlane (plane) {
      this.initialPlane = plane
      this.plane = plane
      this.showSelectPlane = false
      this.showCrudQuestionary = true
    },

    restartPlaneCriation () {
      this.initialPlane.code = 0
      this.plane = []
      this.showSelectPlane = true
      this.showCrudQuestionary = false
    },

    changePlane () {
      this.showSelectPlane = true
      this.showCrudQuestionary = false
      // this.plane = []
    },

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
    // this.showSelectPlane = true
    // this.showCrudQuestionary = false

    this.showSelectPlane = false
    this.showCrudQuestionary = true
    this.initialPlane = { 'code': 1, 'name': 'Ideal' }
    this.plane = { 'code': 1, 'name': 'Ideal' }

    this.tab = 'crudQuestionary'
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
    .my-p{
      padding: 1.2em;
    }
    .my-p2{
      padding: 0.6em;
    }
</style>
