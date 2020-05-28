<template>
    <q-page class="bg-gray q-py-md">
      <div class="q-ml-sm">
        <h6 class="q-mb-none gt-sm">Início</h6>
        <p class="q-mt-xl q-mb-none lt-md"></p>
      </div>

      <div class="row q-px-sm">
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 col-xl-4 q-pa-lg">
            <q-card  class="my-card">
              <q-card-section>
                <div class="flex justify-center align-baseline text-center text-grey-14">
                  <q-icon class="q-mt-xs q-mr-sm" size="1.5rem" name="list_alt" color="primary" ></q-icon>
                  <h6 class="q-pa-none q-ma-none"> QUESTIONÁRIOS</h6>
                </div>
                <div class="text-center">
                  <h3 class="q-mt-md q-mb-none ">7</h3>
                  <div class="">Total</div>
                </div>
                <q-item bordered class="flex justify-content-between q-pt-md q-pb-xs" >
                  <q-item-section class="text-center">
                    <span>2</span>
                    <span style="font-size:0.55rem">Novos</span>
                  </q-item-section>
                  <q-item-section class="text-center">
                    <span>3</span>
                    <span style="font-size:0.55rem">Respondidos</span>
                  </q-item-section>
                  <q-item-section class="text-center">
                    <span>2</span>
                    <span style="font-size:0.55rem">Encerrados</span>
                  </q-item-section>
                </q-item>
              </q-card-section>
            </q-card>
        </div>

        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 col-xl-4 q-pa-lg">
            <q-card class="my-card">
              <q-card-section>
                <div class="flex justify-center align-baseline text-center text-grey-14">
                  <q-icon class="q-mt-xs q-mr-sm" size="1.5rem" name="money" color="primary" ></q-icon>
                  <h6 class="q-pa-none q-ma-none"> PAGAMENTOS</h6>
                </div>
                <div class="text-center">
                  <h3 class="q-mt-md q-mb-none "><span style="font-size:1.8rem">R$</span>1.700,00</h3>
                  <div class="">Total ganho</div>
                </div>
                <q-item bordered class="flex justify-content-between q-pt-md q-pb-xs" >
                  <q-item-section class="text-center">
                    <span>R$ 500,00</span>
                    <span style="font-size:0.55rem">Resgates realizados</span>
                  </q-item-section>
                  <q-item-section class="text-center">
                    <span>R$ 1.200,00</span>
                    <span style="font-size:0.55rem">Disponível para saque</span>
                  </q-item-section>
                </q-item>
              </q-card-section>
            </q-card>
        </div>
      </div>

    </q-page>
</template>

<script>

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
      title: 'Início'
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
