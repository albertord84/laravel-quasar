<template>
    <q-page class="bg-gray q-pa-md">
      <h6>Usuários</h6>
      <q-card class="my-card">
      <q-card-section>
        <div class="text-h6">Our Changing Planet</div>
        <div class="text-subtitle2">by John Doe</div>
      </q-card-section>

      <q-table title="Treats" dense :data="data" :columns="columns" row-key="name" />
    </q-card>
    </q-page>
</template>

<script>
import { mapActions, mapGetters } from 'vuex'
import { AuthService } from '../../../services/AuthService'
import { master } from '../../../helpers/master'
import _ from 'lodash'

export default {
  name: 'Questionaries',

  components: {
  },

  data () {
    return {
      loader: false,
      form: {
        username: null,
        password: null,
        grant_type: 'password'
      },
      form_rules: {
        username: 'required|max:50',
        password: 'required|min:8',
        grant_type: 'required'
      },
      columns: [
        {
          name: 'name',
          required: true,
          label: 'Dessert (100g serving)',
          align: 'left',
          field: row => row.name,
          format: val => `${val}`,
          sortable: true
        },
        { name: 'calories', align: 'center', label: 'Calories', field: 'calories', sortable: true },
        { name: 'fat', label: 'Fat (g)', field: 'fat', sortable: true },
        { name: 'carbs', label: 'Carbs (g)', field: 'carbs' },
        { name: 'protein', label: 'Protein (g)', field: 'protein' },
        { name: 'sodium', label: 'Sodium (mg)', field: 'sodium' },
        { name: 'calcium', label: 'Calcium (%)', field: 'calcium', sortable: true, sort: (a, b) => parseInt(a, 10) - parseInt(b, 10) },
        { name: 'iron', label: 'Iron (%)', field: 'iron', sortable: true, sort: (a, b) => parseInt(a, 10) - parseInt(b, 10) }
      ],
      data: [
        {
          name: 'Frozen Yogurt',
          calories: 159,
          fat: 6.0,
          carbs: 24,
          protein: 4.0,
          sodium: 87,
          calcium: '14%',
          iron: '1%'
        },
        {
          name: 'Ice cream sandwich',
          calories: 237,
          fat: 9.0,
          carbs: 37,
          protein: 4.3,
          sodium: 129,
          calcium: '8%',
          iron: '1%'
        },
        {
          name: 'Eclair',
          calories: 262,
          fat: 16.0,
          carbs: 23,
          protein: 6.0,
          sodium: 337,
          calcium: '6%',
          iron: '7%'
        },
        {
          name: 'Cupcake',
          calories: 305,
          fat: 3.7,
          carbs: 67,
          protein: 4.3,
          sodium: 413,
          calcium: '3%',
          iron: '8%'
        },
        {
          name: 'Gingerbread',
          calories: 356,
          fat: 16.0,
          carbs: 49,
          protein: 3.9,
          sodium: 327,
          calcium: '7%',
          iron: '16%'
        },
        {
          name: 'Jelly bean',
          calories: 375,
          fat: 0.0,
          carbs: 94,
          protein: 0.0,
          sodium: 50,
          calcium: '0%',
          iron: '0%'
        },
        {
          name: 'Lollipop',
          calories: 392,
          fat: 0.2,
          carbs: 98,
          protein: 0,
          sodium: 38,
          calcium: '0%',
          iron: '2%'
        },
        {
          name: 'Honeycomb',
          calories: 408,
          fat: 3.2,
          carbs: 87,
          protein: 6.5,
          sodium: 562,
          calcium: '0%',
          iron: '45%'
        },
        {
          name: 'Donut',
          calories: 452,
          fat: 25.0,
          carbs: 51,
          protein: 4.9,
          sodium: 326,
          calcium: '2%',
          iron: '22%'
        },
        {
          name: 'KitKat',
          calories: 518,
          fat: 26.0,
          carbs: 65,
          protein: 7,
          sodium: 54,
          calcium: '12%',
          iron: '6%'
        }
      ]
    }
  },

  methods: {
    // Height: function (val) {
    //   return 'height: ' + (this.window.height - val) + 'px'
    // },

    // handleResize: function () {
    //   this.window.width = window.innerWidth
    //   this.window.height = window.innerHeight
    // },

    ...mapActions('auth', ['setAuthStatus', 'setUserData', 'storeToken']),

    async submit () {
      const isValid = await this.$refs.observer.validate()
      if (!isValid) {
        return false
      }
      this.login()
    },

    hasErrors (errors) {
      return !_.isEmpty(errors)
    },

    login () {
      this.loader = true
      AuthService.login(this.form)
        .then(response => {
          this.storeToken(response)
          this.setAuthStatus(true)
          this.setUserData(_.get(response, ['data', 'user_data'], {}))
          let redirect = _.get(this.$route, ['query', 'redirect'])
          if (redirect) {
            this.$router.replace(redirect)
          } else {
            this.$router.replace({ name: 'auth.user' })
          }
        })
        .catch(errors => {
          let errArray = master.hasErrors(errors)
          if (errArray) {
            master.setErrors(this.$refs.observer, errArray)
          }
        })
        .then(() => {
          this.loader = false
        })
    }
  },

  watch: {
    'form.username' (val) {
      if (this.$refs.observer.$data.isAuth) {
        this.$refs.observer.$data.isAuth = false
        this.$refs.password.reset()
      }
    },
    'form.password' (val) {
      if (this.$refs.observer.$data.isAuth) {
        this.$refs.observer.$data.isAuth = false
        this.$refs.username.reset()
      }
    }
  },

  computed: {
    ...mapGetters('auth', ['isAuth'])
  },

  created () {
    // window.addEventListener('resize', this.handleResize)
    // this.handleResize()
  },

  destroyed () {
    // window.removeEventListener('resize', this.handleResize)
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
      title: this.$t('page_titles.login_title')
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
</style>
