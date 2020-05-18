<template>
    <q-page class="bg-gray q-pa-md">
      <div class="flex justify-between">
        <h6>Campanhas</h6>
        <!-- <q-btn flat rounded class="q-pa-xs  q-my-lg" color="primary" icon="help"/> -->
      </div>

      <q-card no-bordered flat>
        <q-tabs v-model="tab" dense class="text-grey" active-color="orange-10" indicator-color="orange-10" align="left" caps inline-label>
            <q-tab name="showCampaigns" class="text-dark"  icon="horizontal_split"  label="Campanhas" @click="showTabCampaigns"/>
            <q-tab name="crudCampaigns" class="text-dark" :icon="iconActionCompany" :label="crudTabTitle"/>
        </q-tabs>

        <q-separator/>

        <q-tab-panels v-model="tab" animated>
            <q-tab-panel name="showCampaigns" class="q-pa-none">
              <TableCampaigns @editCampaign="editCampaign"></TableCampaigns>
            </q-tab-panel>
            <q-tab-panel name="crudCampaigns">
              <CrudCampaigns :action="action" :campaign="campaign" @reloadCampaigns="reloadCampaigns"></CrudCampaigns>
            </q-tab-panel>
        </q-tab-panels>
      </q-card>
    </q-page>
</template>

<script>

export default {
  name: 'GerentiateCampaigns',

  components: {
    'CrudCampaigns': require('../../../components/CrudCampaigns.vue').default,
    'TableCampaigns': require('../../../components/TableCampaigns.vue').default
  },

  data () {
    return {
      tab: '',
      campaign: [],
      crudTabTitle: '',
      action: '',
      iconActionCCampaigns: ''
    }
  },

  methods: {
    showTabCampaigns () {
      this.campaign = {}
      this.crudTabTitle = 'Nova campanha'
      this.action = 'insert'
      this.iconActionCompany = 'add'
      this.tab = 'showCampaigns'
    },

    editCampaign (campaign) {
      this.campaign = Object.assign({}, campaign)
      this.crudTabTitle = 'Editar campanha'
      this.action = 'edit'
      this.iconActionCompany = 'edit'
      this.tab = 'crudCampaigns'
    },

    reloadCampaigns () {
      this.showTabCampaigns()
    }
  },

  watch: {
  },

  computed: {
  },

  beforeMount () {
    this.showTabCampaigns()
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
      title: 'Campanhas' // title: this.$t('page_titles.login_title')
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
