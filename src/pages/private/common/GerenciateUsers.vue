<template>
    <q-page class="bg-gray q-pa-md">
      <div class="flex justify-between">
        <h6>Usuários</h6>
        <!-- <q-btn flat rounded class="q-pa-xs  q-my-lg" color="primary" icon="help"/> -->
      </div>

      <q-card no-bordered flat>
        <q-tabs v-model="tab" dense class="text-grey" active-color="orange-10" indicator-color="orange-10" align="left" caps inline-label>
            <q-tab name="showUsers" class="text-dark" icon="horizontal_split"  label="Usuários" @click="showTabUsers"/>
            <q-tab name="crudUsers" class="text-dark" :icon="iconActionUsers" :label="crudTabTitle"/>
        </q-tabs>

        <q-separator/>

        <q-tab-panels v-model="tab" animated>
            <q-tab-panel name="showUsers" class="q-pa-none">
              <TableUsers @editUser="editUser"></TableUsers>
            </q-tab-panel>

            <q-tab-panel name="crudUsers">
              <CrudUsers :action="action" :user="user" @reloadUsers="reloadUsers"></CrudUsers>
            </q-tab-panel>
        </q-tab-panels>
      </q-card>
    </q-page>
</template>

<script>

export default {
  name: 'GerenciateUsers',

  components: {
    'CrudUsers': require('../../../components/CrudUsers.vue').default,
    'TableUsers': require('../../../components/TableUsers.vue').default
  },

  data () {
    return {
      tab: '',
      user: {},
      crudTabTitle: '',
      action: '',
      iconActionUsers: '',
      userLogged: {}
    }
  },

  methods: {
    showTabUsers () {
      this.user = {}
      this.crudTabTitle = 'Novo usuário'
      this.action = 'insert'
      this.iconActionUsers = 'add'
      this.tab = 'showUsers'
    },

    editUser (user) {
      this.user = Object.assign({}, user)
      this.crudTabTitle = 'Editar usuário'
      this.action = 'edit'
      this.iconActionUsers = 'edit'
      this.tab = 'crudUsers'
    },

    reloadUsers () {
      this.showTabUsers()
    }
  },

  watch: {
  },

  computed: {
  },

  beforeMount () {
    this.userLogged = this.$q.localStorage.getItem('user_data')
    this.showTabUsers()
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
      title: 'Usuários' // title: this.$t('page_titles.login_title')
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
