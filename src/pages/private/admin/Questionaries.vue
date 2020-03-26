<template>
    <q-page class="bg-gray q-pa-md">
      <div class="flex justify-between">
        <h6>Questionários</h6>
        <q-btn flat round color="primary" icon="help"/>
      </div>

      <q-card class="" no-bordered flat>
        <q-tabs v-model="tab" dense class="text-grey" active-color="orange-10" indicator-color="orange-10" align="left" caps inline-label>
          <q-tab name="mails" class="text-dark"  icon="horizontal_split"  label="Questionários" />
          <q-tab name="alarms" class="text-dark" icon="add" label="Novo questionário" />
        </q-tabs>

        <q-separator />

        <q-tab-panels v-model="tab" animated>

          <q-tab-panel name="mails" class="q-pa-none">
            <div class="text-h6">Alarms</div>
            Lorem ipsum dolor sit amet consectetur adipisicing elit.
          </q-tab-panel>

          <q-tab-panel name="alarms">
            <div class="row justify-left">

                <div class="col-xs-12 col-md-4 col-lg-3 col-lg-2 my-p2 q-py-md-xl">
                    <div class="text-center my-p bg-light-green-1">
                      <h5 class="q-ma-none">Starter</h5>
                    </div>
                    <q-list>
                        <q-separator />
                        <q-item >
                          <q-item-section><q-item-label >Resposta com seleção Sim - Não</q-item-label></q-item-section>
                          <q-item-section avatar><q-icon color="green" name="check_circle" /></q-item-section>
                        </q-item>
                        <q-separator />
                        <q-item >
                          <q-item-section><q-item-label>Resposta com seleção única</q-item-label></q-item-section>
                          <q-item-section avatar><q-icon color="green" name="check_circle" /></q-item-section>
                        </q-item>
                        <q-separator />
                        <q-item >
                          <q-item-section><q-item-label>Resposta com múltipla escolha</q-item-label></q-item-section>
                          <q-item-section avatar><q-icon color="red-7" name="cancel" /></q-item-section>
                        </q-item>
                        <q-separator />
                        <q-item >
                          <q-item-section><q-item-label>Resposta em escala</q-item-label></q-item-section>
                          <q-item-section avatar><q-icon color="red-7" name="cancel" /></q-item-section>
                        </q-item>
                        <q-separator />
                        <q-item >
                          <q-item-section><q-item-label>Resposta em texto livre</q-item-label></q-item-section>
                          <q-item-section avatar><q-icon color="red-7" name="cancel" /></q-item-section>
                        </q-item>
                        <q-separator />
                        <q-item >
                          <q-item-section><q-item-label>Adição de imagens</q-item-label></q-item-section>
                          <q-item-section avatar><q-icon color="red-7" name="cancel" /></q-item-section>
                        </q-item>
                        <q-separator />
                        <q-item >
                          <q-item-section><q-item-label>Adição de videos</q-item-label></q-item-section>
                          <q-item-section avatar><q-icon color="red-7" name="cancel" /></q-item-section>
                        </q-item>
                        <q-separator />
                    </q-list>
                    <div>
                      <q-btn v-show="planeStarter === false" class="q-pa-xs full-width" label="Selecionar" @click="selectPlane(1)" color="orange-8" />
                      <q-btn v-show="planeStarter === true"  class="q-pa-xs full-width" icon="check" label="Selecionado" color="green" />
                    </div>
                </div>

                <div class="col-xs-12 col-md-4 col-lg-3 col-lg-2 my-p2 q-py-md-xl">
                    <div class="text-center my-p bg-orange-2">
                      <h5 class="q-ma-none">Ideal</h5>
                    </div>
                    <q-list>
                        <q-separator />
                        <q-item >
                          <q-item-section><q-item-label >Resposta com seleção Sim - Não</q-item-label></q-item-section>
                          <q-item-section avatar><q-icon color="green" name="check_circle" /></q-item-section>
                        </q-item>
                        <q-separator />
                        <q-item >
                          <q-item-section><q-item-label>Resposta com seleção única</q-item-label></q-item-section>
                          <q-item-section avatar><q-icon color="green" name="check_circle" /></q-item-section>
                        </q-item>
                        <q-separator />
                        <q-item >
                          <q-item-section><q-item-label>Resposta com múltipla escolha</q-item-label></q-item-section>
                          <q-item-section avatar><q-icon color="green" name="check_circle" /></q-item-section>
                        </q-item>
                        <q-separator />
                        <q-item >
                          <q-item-section><q-item-label>Resposta em escala</q-item-label></q-item-section>
                          <q-item-section avatar><q-icon color="green" name="check_circle" /></q-item-section>
                        </q-item>
                        <q-separator />
                        <q-item >
                          <q-item-section><q-item-label>Resposta em texto livre</q-item-label></q-item-section>
                          <q-item-section avatar><q-icon color="green" name="check_circle" /></q-item-section>
                        </q-item>
                        <q-separator />
                        <q-item >
                          <q-item-section><q-item-label>Adição de imagens</q-item-label></q-item-section>
                          <q-item-section avatar><q-icon color="red-7" name="cancel" /></q-item-section>
                        </q-item>
                        <q-separator />
                        <q-item >
                          <q-item-section><q-item-label>Adição de videos</q-item-label></q-item-section>
                          <q-item-section avatar><q-icon color="red-7" name="cancel" /></q-item-section>
                        </q-item>
                        <q-separator />
                    </q-list>
                    <div>
                      <q-btn v-show="planeIdeal === false" class="q-pa-xs full-width" label="Selecionar" @click="selectPlane(2)" color="orange-8" />
                      <q-btn v-show="planeIdeal === true"  class="q-pa-xs full-width" icon="check" label="Selecionado" color="green" />
                    </div>
                </div>

                <div class="col-xs-12 col-md-4 col-lg-3 col-lg-2 my-p2 q-py-md-xl">
                    <div class="text-center my-p bg-orange-7">
                      <h5 class="q-ma-none">Premium</h5>
                    </div>
                    <q-list>
                        <q-separator />
                        <q-item >
                          <q-item-section><q-item-label >Resposta com seleção Sim - Não</q-item-label></q-item-section>
                          <q-item-section avatar><q-icon color="green" name="check_circle" /></q-item-section>
                        </q-item>
                        <q-separator />
                        <q-item >
                          <q-item-section><q-item-label>Resposta com seleção única</q-item-label></q-item-section>
                          <q-item-section avatar><q-icon color="green" name="check_circle" /></q-item-section>
                        </q-item>
                        <q-separator />
                        <q-item >
                          <q-item-section><q-item-label>Resposta com múltipla escolha</q-item-label></q-item-section>
                          <q-item-section avatar><q-icon color="green" name="check_circle" /></q-item-section>
                        </q-item>
                        <q-separator />
                        <q-item >
                          <q-item-section><q-item-label>Resposta em escala</q-item-label></q-item-section>
                          <q-item-section avatar><q-icon color="green" name="check_circle" /></q-item-section>
                        </q-item>
                        <q-separator />
                        <q-item >
                          <q-item-section><q-item-label>Resposta em texto livre</q-item-label></q-item-section>
                          <q-item-section avatar><q-icon color="green" name="check_circle" /></q-item-section>
                        </q-item>
                        <q-separator />
                        <q-item >
                          <q-item-section><q-item-label>Adição de imagens</q-item-label></q-item-section>
                          <q-item-section avatar><q-icon color="green" name="check_circle" /></q-item-section>
                        </q-item>
                        <q-separator />
                        <q-item >
                          <q-item-section><q-item-label>Adição de videos</q-item-label></q-item-section>
                          <q-item-section avatar><q-icon color="green" name="check_circle" /></q-item-section>
                        </q-item>
                        <q-separator />
                    </q-list>
                    <div>
                      <q-btn v-show="planePremium === false" class="q-pa-xs full-width" label="Selecionar" @click="selectPlane(3)" color="orange-8" />
                      <q-btn v-show="planePremium === true"  class="q-pa-xs full-width" icon="check" label="Selecionado" color="green" />
                    </div>
                </div>

              </div>
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
  },

  data () {
    return {
      tab: 'mails',
      innerTab: 'innerMails',
      splitterModel: 20,
      planeStarter: false,
      planeIdeal: true,
      planePremium: false,

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
      }
    }
  },

  methods: {
    selectPlane (plane) {
      switch (plane) {
        case 1:
          this.planeStarter = true
          this.planeIdeal = false
          this.planePremium = false
          break
        case 2:
          this.planeStarter = false
          this.planeIdeal = true
          this.planePremium = false
          break
        case 3:
          this.planeStarter = false
          this.planeIdeal = false
          this.planePremium = true
          break
      }
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

  created () {
    // window.addEventListener('resize', this.handleResize)
    // this.handleResize()
  },

  destroyed () {
    // window.removeEventListener('resize', this.handleResize)
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
