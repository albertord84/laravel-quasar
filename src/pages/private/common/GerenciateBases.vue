<template>
    <q-page class="bg-gray q-pa-md">
      <div class="flex justify-between">
        <h6>Bases</h6>
        <!-- <q-btn flat rounded class="q-pa-xs  q-my-lg" color="primary" icon="help"/> -->
      </div>

      <q-card no-bordered flat>
        <q-tabs v-model="tab" dense class="text-grey" active-color="orange-10" indicator-color="orange-10" align="left" caps inline-label>
            <q-tab name="bases" class="text-dark" icon="horizontal_split"  label="Bases" />
            <q-tab name="crudBases" class="text-dark" icon="add" label="Nova base" />
        </q-tabs>

        <q-separator/>

        <q-tab-panels v-model="tab" animated>
            <q-tab-panel name="bases" class="q-pa-none">
              <TableBases :bases="allBases" @edit="editBase" @delete="deleteBase" @reload="reloadBases" ></TableBases>
            </q-tab-panel>

            <q-tab-panel name="crudBases">
              <CrudBases :action="'insert'" :baseItem="{}"></CrudBases>
            </q-tab-panel>
        </q-tab-panels>
      </q-card>
    </q-page>
</template>

<script>

const baseItem = {
  id: 1,
  origin_id: 1,
  company_id: 1,
  criator_id: 1,
  name: 'Endocrinologistas',
  decription: 'Asociação brasileira Endocrinologia',
  json_data: 1,
  created_at: '2020-10-10 10:10',
  updated_at: '2020-10-10 10:10'
}

export default {
  name: 'Bases',

  components: {
    'CrudBases': require('../../../components/CrudBases.vue').default,
    'TableBases': require('../../../components/TableBases.vue').default
  },

  data () {
    return {
      tab: '',
      showCrudBase: false,

      companyModel: null,
      allBases: [],

      loader: false
    }
  },

  methods: {

    getBases () {
      this.allBases = []
      this.allBases.push(Object.assign({}, baseItem))
      this.allBases.push(Object.assign({}, baseItem))
      this.allBases.push(Object.assign({}, baseItem))
      this.tab = 'bases'

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

    editBase () {
    },

    deleteBase () {
    },

    reloadBases () {
    }
  },

  watch: {
  },

  computed: {
  },

  beforeMount () {
    this.showCrudBase = false
    this.getBases()
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
