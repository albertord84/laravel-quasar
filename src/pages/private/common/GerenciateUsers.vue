<template>
    <q-page class="bg-gray q-pa-md">
      <div class="flex justify-between">
        <h6>Usuários</h6>
        <!-- <q-btn flat rounded class="q-pa-xs  q-my-lg" color="primary" icon="help"/> -->
      </div>

      <q-card no-bordered flat>
        <q-tabs v-model="tab" dense class="text-grey" active-color="orange-10" indicator-color="orange-10" align="left" caps inline-label>
            <q-tab name="users" class="text-dark" icon="horizontal_split"  label="Usuários" />
            <q-tab name="crudUsers" class="text-dark" icon="add" label="Novos usuários" />
        </q-tabs>

        <q-separator/>

        <q-tab-panels v-model="tab" animated>
            <q-tab-panel name="users" class="q-pa-none">
              <TableBases :users="allUsers" @edit="editUser" @delete="deleteUser" @reload="reloadUsers" ></TableBases>
            </q-tab-panel>

            <q-tab-panel name="crudUsers">
              <CrudUsers :action="'insert'" :userItem="{}"></CrudUsers>
            </q-tab-panel>
        </q-tab-panels>
      </q-card>
    </q-page>
</template>

<script>

const userItem = {
  id: 1,
  company_id: 1,
  cost_center_id: 1,
  address_id: 1,
  role_id: 1,
  status_id: 1,
  username: '',
  email: 'josergm86@gmail.com',
  password: '***********',
  created_at: '2020-10-10 10:10',
  updated_at: '2020-10-10 10:10'
}

export default {
  name: 'GerenciateUsers',

  components: {
    'CrudUsers': require('../../../components/CrudUsers.vue').default,
    'TableBases': require('../../../components/TableUsers.vue').default
  },

  data () {
    return {
      tab: '',
      url: 'users',
      userModel: null,
      allUsers: [],
      showCrudUsers: false,

      loader: false
    }
  },

  methods: {

    getUsers () {
      this.allUsers = []
      this.allUsers.push(Object.assign({}, userItem))
      this.allUsers.push(Object.assign({}, userItem))
      this.allUsers.push(Object.assign({}, userItem))
      this.tab = 'users'
    },

    editUser () {
    },

    deleteUser () {
    },

    reloadUsers () {
    }
  },

  watch: {
  },

  computed: {
  },

  beforeMount () {
    this.showCrudUsers = false
    this.getUsers()
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
