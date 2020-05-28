<template>
    <q-page class="bg-gray q-pa-md">
      <div class="flex justify-between">
        <h6>Pagamentos</h6>
        <!-- <q-btn flat rounded class="q-pa-xs  q-my-lg" color="primary" icon="help"/> -->
      </div>

      <q-card no-bordered flat>
        <q-tabs v-model="tab" dense class="text-grey" active-color="orange-10" indicator-color="orange-10" align="left" caps inline-label>
            <q-tab name="showPayments" class="text-dark" icon="horizontal_split"  label="Pagamentos" @click="showTabPayments"/>
            <q-tab name="crudPayments" class="text-dark" :icon="iconActionPayments" :label="crudTabTitle"/>
        </q-tabs>

        <q-separator/>

        <q-tab-panels v-model="tab" animated>
            <q-tab-panel name="showPayments" class="q-pa-none">
              <TablePayments @editPayment="editPayment"></TablePayments>
            </q-tab-panel>

            <q-tab-panel name="crudPayments">
              <CrudPayments :action="action" :payment="payment" @reloadPayments="reloadPayments"></CrudPayments>
            </q-tab-panel>
        </q-tab-panels>
      </q-card>
    </q-page>
</template>

<script>

export default {
  name: 'GerenciatePayments',

  components: {
    'CrudPayments': require('../../../components/CrudExtractions.vue').default,
    'TablePayments': require('../../../components/TableExtractions.vue').default
  },

  data () {
    return {
      tab: '',
      payment: {},
      crudTabTitle: '',
      action: '',
      iconActionPayments: '',
      userLogged: {}
    }
  },

  methods: {
    showTabPayments () {
      this.payment = {}
      this.crudTabTitle = '' // 'Novo pagamento'
      this.action = '' // 'insert'
      this.iconActionPayments = '' // 'add'
      this.tab = 'showPayments'
    },

    editPayment (payment) {
      this.payment = Object.assign({}, payment)
      this.crudTabTitle = 'Editar pagamento'
      this.action = 'edit'
      this.iconActionPayments = 'edit'
      this.tab = 'crudPayments'
    },

    reloadPayments () {
      this.showTabPayments()
    }
  },

  watch: {
  },

  computed: {
  },

  beforeMount () {
    this.userLogged = this.$q.localStorage.getItem('user_data')
    this.showTabPayments()
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
      title: 'Pagamentos' // title: this.$t('page_titles.login_title')
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
