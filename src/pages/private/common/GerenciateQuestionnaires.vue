<template>
    <q-page class="bg-gray q-pa-md">
      <div class="flex justify-between">
        <h6>Questionários</h6>
        <!-- <q-btn flat rounded class="q-pa-xs  q-my-lg" color="primary" icon="help"/> -->
      </div>

      <q-card no-bordered flat>
        <q-tabs v-model="tab" dense class="text-grey" active-color="orange-10" indicator-color="orange-10" align="left" caps inline-label>
          <q-tab name="showQuestionaries" class="text-dark" icon="horizontal_split"  label="Questionários" @click="showTabQuestionnaires" />
          <q-tab name="crudQuestionary" class="text-dark" :icon="iconActionQuestionnaires" :label="crudTabTitle"/>
        </q-tabs>
        <q-separator/>
        <q-tab-panels v-model="tab" animated>

          <q-tab-panel name="showQuestionaries" class="q-pa-none">
            <TableQuestionnaires @editQuestionary="editQuestionary"></TableQuestionnaires>
          </q-tab-panel>

          <q-tab-panel name="crudQuestionary">
            <CrudQuestionary :action="action" :questionary="questionary" @reloadQuestionnaires="reloadQuestionnaires"></CrudQuestionary>
          </q-tab-panel>

        </q-tab-panels>
      </q-card>
    </q-page>
</template>

<script>

export default {
  name: 'GerentiateQuestionaries',

  components: {
    'TableQuestionnaires': require('../../../components/TableQuestionnaires.vue').default,
    'CrudQuestionary': require('../../../components/CrudQuestionary.vue').default
  },

  data () {
    return {
      tab: '',
      questionary: {},
      crudTabTitle: '',
      action: '',
      iconActionQuestionnaires: '',
      userLogged: {}
    }
  },

  methods: {
    showTabQuestionnaires () {
      this.questionary = {}
      this.crudTabTitle = 'Novo questionário'
      this.action = 'insert'
      this.iconActionQuestionnaires = 'add'
      this.tab = 'showQuestionaries'
    },

    editQuestionary (questionary) {
      this.questionary = Object.assign({}, questionary)
      this.crudTabTitle = 'Editar questionário'
      this.action = 'edit'
      this.iconActionQuestionnaires = 'edit'
      this.tab = 'crudQuestionary'
    },

    reloadQuestionnaires () {
      this.showTabQuestionnaires()
    }
  },

  watch: {
  },

  computed: {
  },

  beforeMount () {
    this.userLogged = this.$q.localStorage.getItem('user_data')
    this.showTabQuestionnaires()
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
      title: 'Questionários' // title: this.$t('page_titles.login_title')
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
