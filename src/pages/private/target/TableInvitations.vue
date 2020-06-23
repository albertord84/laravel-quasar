<template>
    <q-page class="bg-gray q-py-md">
      <div class="q-ml-sm q-mb-sm">
        <h6 v-show="!selectedInvitation" class="q-mb-none gt-sm">Campanhas</h6>
        <p v-show="!selectedInvitation" class="q-mt-xl q-mb-none lt-md">Campanhas</p>
      </div>
      <q-card no-bordered flat class="q-mt-none gt-sm">
        <q-tab-panels value="invitations">
          <q-tab-panel name="invitations" class="q-pa-none">
            <!-- <TableInvitations  :invitations="allInvitations" @edit="editInvitations" @delete="deleteInvitations" @reload="reloadInvitations" ></TableInvitations> -->
          </q-tab-panel>
        </q-tab-panels>
      </q-card>

      <q-scroll-area v-show="!selectedInvitation" :thumb-style="thumbStyle" :content-style="contentStyle"  :content-active-style="contentActiveStyle" style="max-width: 100%;" class="fill-window lt-md">
        <div  v-for="(invitation, index) in allInvitations" :key="index">
          <q-item bordered clickable class="q-py-md" style="border-bottom:solid 1px #f5f5f5" @click.prevent="selectedInvitation = invitation">
            <q-item-section v-if="invitation.accepted" top avatar class="text-center">
                <q-avatar color="primary" rounded text-color="white" square icon="album" />
                <span style="margin-left: 5px; font-size:0.55rem">ACEITA</span>
                <span style="font-size:0.55rem; color:#4caf50">+ R$ {{invitation.Campaign.Questionnaire.Plane.recompense}}.00</span>
            </q-item-section>
            <q-item-section v-else top avatar class="text-center">
                <q-avatar color="negative" rounded text-color="white" square icon="block" />
                <span style="margin-left:-3px; font-size:0.55rem">REJEITADA</span>
                <span style="font-size:0.55rem; color:#f44336; text-decoration: line-through;"> R$ {{invitation.Campaign.Questionnaire.Plane.recompense}}.00</span>
            </q-item-section>

            <q-item-section>
              <q-item-label>{{invitation.Campaign.name}}</q-item-label>
              <q-item-label caption style="font-size:0.7rem">Potenciado por: {{invitation.Company.fantasy_name}}</q-item-label>
              <q-item-label caption class="q-mx-none q-px-none">{{invitation.Campaign.description.slice(0,86)}}...</q-item-label>
            </q-item-section>
          </q-item>
        </div>
      </q-scroll-area>

      <InvitationDatails v-show="selectedInvitation"  :selectedInvitation="selectedInvitation" @showAllInvitations="selectedInvitation = null"></InvitationDatails>

    </q-page>
</template>

<script>
// import axios from 'axios'
import { WebService } from '../../../services/WebService.js'

export default {
  name: 'TableInvitations',

  components: {
    'InvitationDatails': require('../../../components/InvitationDatails.vue').default
  },

  data () {
    return {
      loader: false,
      allInvitations: [],
      selectedInvitation: null,

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
          console.log(response.data)
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
