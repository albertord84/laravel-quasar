<template>
    <q-page class="bg-gray q-pa-md">
      <div class="flex justify-between">
        <h6>Centros de Custo</h6>
        <!-- <q-btn flat rounded class="q-pa-xs  q-my-lg" color="primary" icon="help"/> -->
      </div>

      <q-card no-bordered flat>
        <q-tabs v-model="tab" dense class="text-grey" active-color="orange-10" indicator-color="orange-10" align="left" caps inline-label>
            <q-tab name="showCostCenters" class="text-dark" icon="horizontal_split"  label="Centros de Custo" @click="showTabCostCenters"/>
            <q-tab name="crudCostCenters" class="text-dark" :icon="iconActionBases" :label="crudTabTitle" />
        </q-tabs>

        <q-separator/>

        <q-tab-panels v-model="tab" animated>
            <q-tab-panel name="showCostCenters" class="q-pa-none">
              <TableCostCenter  @editCostCenter="editCostCenter" ></TableCostCenter>
            </q-tab-panel>

            <q-tab-panel name="crudCostCenters">
              <CrudCostCenters :action="action" :costCenter="costCenter" @reloadCostCenters="reloadCostCenters"></CrudCostCenters>
            </q-tab-panel>
        </q-tab-panels>
      </q-card>
    </q-page>
</template>

<script>

export default {
  name: 'GerentiateBases',

  components: {
    'CrudCostCenters': require('../../../components/CrudCostCenters.vue').default,
    'TableCostCenter': require('../../../components/TableCostCenter.vue').default
  },

  data () {
    return {
      tab: '',
      costCenter: {},
      crudTabTitle: '',
      action: '',
      iconActionBases: '',
      userLogged: {}
    }
  },

  methods: {
    showTabCostCenters () {
      this.costCenter = {}
      this.crudTabTitle = 'Novo centro de custo'
      this.action = 'insert'
      this.iconActionBases = 'add'
      this.tab = 'showCostCenters'
    },

    editCostCenter (costCenter) {
      this.costCenter = Object.assign({}, costCenter)
      this.crudTabTitle = 'Editar centro de custo'
      this.action = 'edit'
      this.iconActionBases = 'edit'
      this.tab = 'crudCostCenters'
    },

    reloadCostCenters () {
      this.showTabCostCenters()
    }
  },

  watch: {
  },

  computed: {
  },

  beforeMount () {
    this.userLogged = this.$q.localStorage.getItem('user_data')
    this.showTabCostCenters()
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
      title: 'Centros de Custo' // title: this.$t('page_titles.login_title')
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
