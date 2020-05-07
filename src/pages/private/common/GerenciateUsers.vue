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
              <TableUsers :users="users" @edit="editUser" @delete="deleteUser" @reload="reloadUsers" ></TableUsers>
            </q-tab-panel>

            <q-tab-panel name="crudUsers">
              <CrudUsers :action="'insert'" :userItem="{}"></CrudUsers>
            </q-tab-panel>
        </q-tab-panels>
      </q-card>
    </q-page>
</template>

<script>
import axios from 'axios'

export default {
  name: 'GerenciateUsers',

  components: {
    'CrudUsers': require('../../../components/CrudUsers.vue').default,
    'TableUsers': require('../../../components/TableUsers.vue').default
  },

  data () {
    return {
      tab: '',
      users: [],
      usersStatuses: [],
      userModel: {
        id: 1,
        company_id: 1,
        cost_center_id: 1,
        address_id: 1,
        role_id: 1,
        status_id: 1,
        username: '',
        email: '',
        password: ''
      },
      showCrudUsers: false,

      loader: false
    }
  },

  methods: {

    getUsers () {
      this.loader = true
      axios.get('web/' + 'users')
        .then(response => {
          response.data.some((item, i) => {
            item.statusName = this.usersStatuses[item.status_id]
          })
          this.users = response.data
          this.tab = 'users'
        })
        .catch(errors => {
        })
        .then(() => {
          this.loader = false
        })
    },

    getUsersStatuses () {
      this.loader = true
      axios.get('web/' + 'usersStatuses')
        .then(response => {
          this.usersStatuses = []
          response.data.some((item, i) => {
            this.usersStatuses[i + 1] = item.name
          })
        })
        .catch(errors => {
        })
        .then(() => {
          this.loader = false
        })
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
    this.getUsersStatuses()
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
