<template>
    <q-page class="bg-gray q-pa-md">
      <div class="flex justify-between">
        <h6>Empresas</h6>
        <!-- <q-btn flat rounded class="q-pa-xs  q-my-lg" color="primary" icon="help"/> -->
      </div>

      <q-card no-bordered flat>
        <q-tabs v-model="tab" dense class="text-grey" active-color="orange-10" indicator-color="orange-10" align="left" caps inline-label>
            <q-tab name="companies" class="text-dark" icon="horizontal_split"  label="Empresas" />
            <q-tab name="crudCompanies" class="text-dark" icon="add" label="Nova empresa" />
        </q-tabs>

        <q-separator/>

        <q-tab-panels v-model="tab" animated>
            <q-tab-panel name="companies" class="q-pa-none">
              <TableCompanies :companies="allCompanies" @edit="editCompany" @delete="deleteCompany" @reload="reloadCompanies" ></TableCompanies>
            </q-tab-panel>

            <q-tab-panel name="crudCompanies">
              <CrudCompanies :action="'insert'" :companyItem="{}"></CrudCompanies>
            </q-tab-panel>
        </q-tab-panels>
      </q-card>
    </q-page>
</template>

<script>

const companyItem = {
  id: 1,
  responsible_id: 1,
  address_id: 1,
  social_reason: 'BioCuba Farma',
  fantasy_name: 'Labiofam',
  cnpj: '88.495.263/0001-60',
  phone: '5521965913089',
  phone2: '',
  decription: 'Produtos biofarmaceuticos',
  observation: 'Produção e comercialização de produtos para imunologia molecular',
  created_at: '2020-10-10 10:10',
  updated_at: '2020-10-10 10:10'
}

export default {
  name: 'Companies',

  components: {
    'CrudCompanies': require('../../../components/CrudCompanies.vue').default,
    'TableCompanies': require('../../../components/TableCompanies.vue').default
  },

  data () {
    return {
      tab: '',
      showCrudCompany: false,

      companyModel: null,
      allCompanies: [],

      loader: false
    }
  },

  methods: {

    getCampaigns () {
      this.allCompanies = []
      this.allCompanies.push(Object.assign({}, companyItem))
      this.allCompanies.push(Object.assign({}, companyItem))
      this.allCompanies.push(Object.assign({}, companyItem))
      this.tab = 'companies'

      // this.loader = true
      // ApiService.login(this.form)
      // .then(response => {
      //   this.storeToken(response)
      //   this.setAuthStatus(true)
      //   this.setUserData(_.get(response, ['data', 'user_data'], {}))
      //   let redirect = _.get(this.$route, ['query', 'redirect'])
      //   if (redirect) {
      //     this.$router.replace(redirect)
      //   } else {
      //     this.$router.replace({ name: 'auth.user' })
      //   }
      // })
      // .catch(errors => {
      //   let errArray = master.hasErrors(errors)
      //   if (errArray) {
      //     master.setErrors(this.$refs.observer, errArray)
      //   }
      // })
      // .then(() => {
      //   this.loader = false
      // })
    },

    editCompany () {
    },

    deleteCompany () {
    },

    reloadCompanies () {
    }
  },

  watch: {
  },

  computed: {
  },

  beforeMount () {
    this.showCrudCompany = false
    this.getCampaigns()
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
