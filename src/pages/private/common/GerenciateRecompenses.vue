<template>
    <q-page class="bg-gray q-pa-md">
      <div class="flex justify-between">
        <h6>Recompensas</h6>
        <!-- <q-btn flat rounded class="q-pa-xs  q-my-lg" color="primary" icon="help"/> -->
      </div>

      <q-card no-bordered flat>
        <q-tabs v-model="tab" dense class="text-grey" active-color="orange-10" indicator-color="orange-10" align="left" caps inline-label>
            <q-tab name="showRecompenses" class="text-dark" icon="horizontal_split"  label="Recompensas" @click="showTabRecompenses"/>
            <q-tab name="crudRecompenses" class="text-dark" :icon="iconActionRecompenses" @click.prevent="1" :label="crudTabTitle" />
        </q-tabs>

        <q-separator/>

        <q-tab-panels v-model="tab" animated>
            <q-tab-panel name="showRecompenses" class="q-pa-none">
              <TableRecompenses  @editRecompense="editRecompense" ></TableRecompenses>
            </q-tab-panel>

            <q-tab-panel name="crudRecompenses">
              <CrudRecompenses :action="action" :recompense="recompense" @reloadRecompenses="reloadRecompenses"></CrudRecompenses>
            </q-tab-panel>
        </q-tab-panels>
      </q-card>
    </q-page>
</template>

<script>

export default {
  name: 'GerentiateRecompenses',

  components: {
    'CrudRecompenses': require('../../../components/CrudRecompenses.vue').default,
    'TableRecompenses': require('../../../components/TableRecompenses.vue').default
  },

  data () {
    return {
      tab: '',
      recompense: {},
      crudTabTitle: '',
      action: '',
      iconActionRecompenses: '',
      userLogged: {}
    }
  },

  methods: {
    showTabRecompenses () {
      this.recompense = {}
      this.crudTabTitle = 'Nova recompensa'
      this.action = 'insert'
      this.iconActionRecompenses = 'add'
      this.tab = 'showRecompenses'
    },

    editRecompense (recompense) {
      this.recompense = Object.assign({}, recompense)
      this.crudTabTitle = 'Editar recompensa'
      this.action = 'edit'
      this.iconActionRecompenses = 'edit'
      this.tab = 'crudRecompenses'
    },

    reloadRecompenses () {
      this.showTabRecompenses()
    }
  },

  watch: {
  },

  computed: {
  },

  beforeMount () {
    this.userLogged = this.$q.localStorage.getItem('user_data')
    this.showTabRecompenses()
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
      title: 'Recompensas' // title: this.$t('page_titles.login_title')
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
