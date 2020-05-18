<template>
    <q-page class="bg-gray q-pa-md">
      <div class="flex justify-between">
        <h6>Bases</h6>
        <!-- <q-btn flat rounded class="q-pa-xs  q-my-lg" color="primary" icon="help"/> -->
      </div>

      <q-card no-bordered flat>
        <q-tabs v-model="tab" dense class="text-grey" active-color="orange-10" indicator-color="orange-10" align="left" caps inline-label>
            <q-tab name="showBases" class="text-dark" icon="horizontal_split"  label="Bases" @click="showTabBases"/>
            <q-tab name="crudBases" class="text-dark" :icon="iconActionBases" :label="crudTabTitle" />
        </q-tabs>

        <q-separator/>

        <q-tab-panels v-model="tab" animated>
            <q-tab-panel name="showBases" class="q-pa-none">
              <TableBases  @editBase="editBase" ></TableBases>
            </q-tab-panel>

            <q-tab-panel name="crudBases">
              <CrudBases :action="action" :base="base" @reloadBases="reloadBases"></CrudBases>
            </q-tab-panel>
        </q-tab-panels>
      </q-card>
    </q-page>
</template>

<script>

export default {
  name: 'GerentiateBases',

  components: {
    'CrudBases': require('../../../components/CrudBases.vue').default,
    'TableBases': require('../../../components/TableBases.vue').default
  },

  data () {
    return {
      tab: '',
      base: {},
      crudTabTitle: '',
      action: '',
      iconActionBases: ''
    }
  },

  methods: {
    showTabBases () {
      this.base = {}
      this.crudTabTitle = 'Nova base'
      this.action = 'insert'
      this.iconActionBases = 'add'
      this.tab = 'showBases'
    },

    editBase (base) {
      this.base = Object.assign({}, base)
      this.crudTabTitle = 'Editar base'
      this.action = 'edit'
      this.iconActionBases = 'edit'
      this.tab = 'crudBases'
    },

    reloadBases () {
      this.showTabBases()
    }
  },

  watch: {
  },

  computed: {
  },

  beforeMount () {
    this.showTabBases()
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
      title: 'Bases' // title: this.$t('page_titles.login_title')
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
