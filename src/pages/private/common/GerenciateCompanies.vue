<template>
    <q-page class="bg-gray q-pa-md">
      <div class="flex justify-between">
        <h6>Empresas</h6>
        <!-- <q-btn flat rounded class="q-pa-xs  q-my-lg" color="primary" icon="help"/> -->
      </div>

      <q-card no-bordered flat>
        <q-tabs v-model="tab" dense class="text-grey" active-color="orange-10" indicator-color="orange-10" align="left" caps inline-label>
            <q-tab name="showCompanies" class="text-dark" icon="horizontal_split"  label="Empresas" @click="showTabCompanies"/>
            <q-tab name="crudCompanies" class="text-dark" :icon="iconActionCompany" :label="crudTabTitle" />
        </q-tabs>

        <q-separator/>

        <q-tab-panels v-model="tab" animated>
            <q-tab-panel name="showCompanies" class="q-pa-none">
              <TableCompanies @editCompany="editCompany"></TableCompanies>
            </q-tab-panel>
            <q-tab-panel name="crudCompanies">
              <CrudCompanies :action="action" :company="company" @reloadCompanies="reloadCompanies"></CrudCompanies>
            </q-tab-panel>
        </q-tab-panels>
      </q-card>
    </q-page>
</template>

<script>

export default {
  name: 'GerentiateCompanies',

  components: {
    'CrudCompanies': require('../../../components/CrudCompanies.vue').default,
    'TableCompanies': require('../../../components/TableCompanies.vue').default
  },

  data () {
    return {
      tab: '',
      companies: [],
      crudTabTitle: '',
      action: '',
      iconActionCompany: '',
      userLogged: {}
    }
  },

  methods: {

    showTabCompanies () {
      this.company = {}
      this.crudTabTitle = 'Nova empresa'
      this.action = 'insert'
      this.iconActionCompany = 'add'
      this.tab = 'showCompanies'
    },

    editCompany (company) {
      this.company = Object.assign({}, company)
      this.crudTabTitle = 'Editar empresa'
      this.action = 'edit'
      this.iconActionCompany = 'edit'
      this.tab = 'crudCompanies'
    },

    reloadCompanies () {
      this.userLogged = this.$q.localStorage.getItem('user_data')
      this.showTabCompanies()
    }
  },

  watch: {
  },

  computed: {
  },

  beforeMount () {
    this.showTabCompanies()
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
      title: 'Empresas' // title: this.$t('page_titles.login_title')
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
