<template>
    <div style="margin-top:40px;">
      <q-banner class="bg-white flex justify-start">
        <template v-slot:avatar>
          <q-icon name="keyboard_arrow_left" size="md" color="dark" @click="goBack"/>
        </template>
        <div class="text-center">
          <span style="margin-left:-30px">Detalhes</span>
        </div>
      </q-banner>

      <!-- <q-card class="my-card q-mx-sm" flat bordered> -->
      <q-separator />
        <q-scroll-area :thumb-style="thumbStyle" :content-style="contentStyle" :content-active-style="contentActiveStyle" style="" class="fill-window lt-md q-ml-xs">
          <q-card-section >
            <!-- About campaign -->
            <div class="text-p title">Campanha</div>
            <q-separator />
            <div class="text-p q-mt-sm q-mb-xs">{{invitation.Campaign.name}}</div>
            <div class="text-caption text-grey">
              {{invitation.Campaign.description}}
            </div>
            <div class="flex justify-between q-mt-xs">
              <div class="text-p text-caption text-dark" >Início: {{invitation.created_at.slice(0,10)}}</div>
              <div class="text-p text-caption text-dark" >Fim: {{invitation.created_at.slice(0,10)}}</div>
            </div>

            <!-- About company -->
            <div class="text-p title q-mt-md">Entidade interessada</div>
            <q-separator />
            <div class="text-p q-mt-sm">{{invitation.Company.fantasy_name}}</div>
            <div class="text-caption text-grey">
              {{invitation.Company.social_reason}}
            </div>
            <div class="text-caption text-grey">
              {{invitation.Company.decription}}
            </div>

            <!-- About invitation -->
            <div class="text-p title q-mt-md">Convite</div>
            <q-separator />
            <div class="flex justify-between q-mt-sm">
              <div class="text-p text-caption text-dark" >Recebido: {{invitation.created_at.slice(0,10)}}</div>
              <div class="text-p text-caption text-dark">Status:
                  <span v-if="invitation.accepted"><b style="color:green">ACEITO</b></span>
                  <span v-else>
                    <b style="color:red">REJEITADO</b>
                    <q-icon name="edit" size="xs" color="orange-8" class="q-ml-xs" @click="modalAceptInvitation = true"/>
                  </span>
              </div>
            </div>
          </q-card-section>
      </q-scroll-area>

        <div class="text-center q-py-sm" style="background-color:#e65100 !important">
          <q-btn  text-color="white" class="q-pa-xs q-px-xl q-mb-xs bg-orange-10 " label="Responder questionário"
                  title="Responder questionário" flat
                  @click.prevent="answerSelectedInvitation"/>
        </div>
      <!-- </q-card> -->

      <q-dialog v-model="modalAceptInvitation" persistent transition-show="flip-down" transition-hide="flip-up">
        <q-card>
          <q-card-section class="row items-center">
            <!-- <q-icon name="warning" class="text-red" style="font-size: 1.9rem;" /> -->
            <span class="q-ml-sm">Confirma que deseja aceitar o convite para responder essa campanha?</span>
          </q-card-section>

          <q-card-section v-show="isAceptingInvitation" class="text-center">
            <q-spinner-ios color="orange-8" size="1.9rem" />
          </q-card-section>

          <q-card-actions align="right">
            <q-btn flat label="Aceitar convite" color="orange-8" @click.prevent="aceptInvitation"></q-btn>
            <q-btn flat label="Cancelar" color="gray" v-close-popup />
          </q-card-actions>

        </q-card>
      </q-dialog>
    </div>
</template>

<script>

export default {
  name: 'InvitationMobileDatails',

  components: {
  },

  data () {
    return {
      loader: false,
      expanded: false,
      modalAceptInvitation: false,
      isAceptingInvitation: false,
      userLogged: {},
      invitation: null,
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
      }
    }
  },

  methods: {
    answerSelectedInvitation () {
      this.$router.push(
        {
          name: 'target.answerQuestionnaire',
          params: {
            invitation: this.invitation
          }
        }
      )
    },

    goBack () {
      this.$router.push(
        {
          name: 'target.invitations'
        }
      )
    }
  },

  beforeMount () {
    this.userLogged = this.$q.localStorage.getItem('user_data')
    this.invitation = this.$route.params.invitation
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
    .fill-window{
      height:calc(100vh - 40px)
      /* height:calc(100vh - 40px) */
    }

    @media screen and (max-width: 600px) {
    .fill-window{
      height:calc(100vh - 240px)
      /* height:calc(100vh - 200px) */
    }
  }
</style>
