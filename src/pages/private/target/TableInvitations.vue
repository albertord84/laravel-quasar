<template>
    <q-page class="bg-gray q-py-md">

      <!-- Desktop -->
      <q-card no-bordered flat class="q-mt-none gt-sm">
        <q-tab-panels value="invitations">
          <q-tab-panel name="invitations" class="q-pa-none">
            <!-- <TableInvitationsDesktop  :invitations="allInvitations" @edit="editInvitations" @delete="deleteInvitations" @reload="reloadInvitations" ></TableInvitationsDesktop> -->
          </q-tab-panel>
        </q-tab-panels>
      </q-card>

      <!-- Mobile -->
      <q-scroll-area v-if="!selectedInvitation && !answerInvitation" :thumb-style="thumbStyle"
        :content-style="contentStyle" :content-active-style="contentActiveStyle" style="max-width: 100%;"
        class="fill-window lt-md q-mt-xl">
        <InvitationsMobile
            :allInvitations="allInvitations"
            @setSelectInvitation="setSelectInvitation">
        </InvitationsMobile>
      </q-scroll-area>

      <InvitationMobileDatails
            v-if="selectedInvitation"
            :selectedInvitation="selectedInvitation"
            @showAllInvitations="selectedInvitation = null"
            @answerSelectedInvitation="answerSelectedInvitation">
      </InvitationMobileDatails>

      <InvitationsMobileAnswerQuestionnaire
            v-if="answerInvitation"
            :answerInvitation="answerInvitation"
            @showAllInvitations="selectedInvitation = null, answerInvitation = null"
            @saveResponse="saveResponse">
      </InvitationsMobileAnswerQuestionnaire>

    </q-page>
</template>

<script>
import { WebService } from '../../../services/WebService.js'

export default {
  name: 'TableInvitations',

  components: {
    'InvitationsMobile': require('../../../components/InvitationsMobile.vue').default,
    'InvitationMobileDatails': require('../../../components/InvitationMobileDatails.vue').default,
    'InvitationsMobileAnswerQuestionnaire': require('../../../components/InvitationsMobileAnswerQuestionnaire.vue').default
  },

  data () {
    return {
      loader: false,
      allInvitations: [],
      selectedInvitation: null,
      answerInvitation: null,

      filter: '',
      page: 0,

      thumbStyle: {
        right: '4px',
        borderRadius: '5px',
        // backgroundColor: '#027be3',
        backgroundColor: '#fefefe',
        width: '5px',
        opacity: 0.75
      },
      contentStyle: {
        right: '4px',
        borderRadius: '5px',
        // backgroundColor: '#027be3',
        backgroundColor: '#fefefe',
        width: '5px',
        opacity: 0.75
      },
      contentActiveStyle: {
        right: '4px',
        borderRadius: '5px',
        backgroundColor: '#fefefe',
        // backgroundColor: '#027be3',
        width: '5px',
        opacity: 0.75
      },

      userLogged: {}
    }
  },

  methods: {
    getInvitations (page) {
      this.isLoading = true
      WebService.get('web/' + 'invitations', {
        'filter': this.filter,
        'page': this.page,
        'user_id': this.userLogged.id,
        'userLogged': JSON.stringify(this.userLogged)
      })
        .then(response => {
          let tmp = Object.values(response.data)
          this.data = tmp
          this.allInvitations = tmp
          this.page = page
          this.hasMorePage = tmp.length
        })
        .catch(errors => {
        })
        .then(() => {
          this.isLoading = false
        })
    },

    setSelectInvitation (invitation, index) {
      this.selectedInvitation = invitation
    },

    answerSelectedInvitation () {
      this.answerInvitation = Object.assign({}, this.selectedInvitation)
      this.selectedInvitation = null
    },

    saveResponse (response) {

    }

  },

  watch: {
  },

  computed: {
  },

  beforeMount () {
    this.userLogged = this.$q.localStorage.getItem('user_data')
    this.getInvitations()
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
      title: 'Campanhas'
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
    .fill-window{
      height:calc(100vh - 140px)
    }

    @media screen and (max-width: 600px) {
    .fill-window{
      height:calc(100vh - 200px)
    }
  }
</style>
