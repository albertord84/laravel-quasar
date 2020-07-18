<template>
    <div style="margin-top:22px;">
      <q-banner class="bg-white flex justify-start">
        <template v-slot:avatar>
          <q-icon name="keyboard_arrow_left" size="md" color="dark" @click="showAllInvitations" />
        </template>
        <div class="text-center">
          <span style="margin-left:-20px">Detalhes</span>
        </div>
      </q-banner>

      <q-card class="my-card q-mx-sm" flat bordered>
          <q-card-section >
            <!-- About campaign -->
            <div class="text-p title">Campanha</div>
            <q-separator />
            <div class="text-p q-mt-sm q-mb-xs">{{selectedInvitation.Campaign.name}}</div>
            <div class="text-caption text-grey">
              {{selectedInvitation.Campaign.description}}
            </div>
            <div class="flex justify-between q-mt-xs">
              <div class="text-p text-caption text-dark" >Início: {{selectedInvitation.created_at.slice(0,10)}}</div>
              <div class="text-p text-caption text-dark" >Fim: {{selectedInvitation.created_at.slice(0,10)}}</div>
            </div>

            <!-- About company -->
            <div class="text-p title q-mt-md">Entidade interessada</div>
            <q-separator />
            <div class="text-p q-mt-sm">{{selectedInvitation.Company.fantasy_name}}</div>
            <div class="text-caption text-grey">
              {{selectedInvitation.Company.social_reason}}
            </div>
            <div class="text-caption text-grey">
              {{selectedInvitation.Company.decription}}
            </div>

            <!-- About invitation -->
            <div class="text-p title q-mt-md">Convite</div>
            <q-separator />
            <div class="flex justify-between q-mt-sm">
              <div class="text-p text-caption text-dark" >Recebido: {{selectedInvitation.created_at.slice(0,10)}}</div>
              <div class="text-p text-caption text-dark">Status:
                  <span v-if="selectedInvitation.accepted"><b style="color:green">ACEITO</b></span>
                  <span v-else>
                    <b style="color:red">REJEITADO</b>
                    <q-icon name="edit" size="xs" color="orange-8" class="q-ml-xs" @click="modalAceptInvitation = true"/>
                  </span>
              </div>
            </div>

            <div class="text-center q-pt-lg">
              <q-btn  text-color="white" class="q-pa-xs q-mb-xs bg-orange-8" label="Responder questionário"
                      title="Responder questionário" icon="chrome_reader_mode"
                      @click.prevent="$emit('answerSelectedInvitation')"/>
            </div>

          </q-card-section>
      </q-card>

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

  props: {
    selectedInvitation: null
  },

  components: {
  },

  data () {
    return {
      loader: false,
      expanded: false,
      modalAceptInvitation: false,
      isAceptingInvitation: false,
      userLogged: {}
    }
  },

  methods: {
    showAllInvitations () {
      this.$emit('showAllInvitations')
    },

    aceptInvitation () {
      this.isAceptingInvitation = true
      this.isAceptingInvitation = false
      this.modalAceptInvitation = false
    }
  },

  watch: {
  },

  computed: {
  },

  beforeMount () {
    this.userLogged = this.$q.localStorage.getItem('user_data')
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
      /* background-image: url('../../../assets/custom/login-background.jpg'); */
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

    .title{
      font-size: 1.2em;
    }

    @media screen and (max-width: 600px) {
    .fill-window{
      height:calc(100vh - 200px)
    }
  }
</style>
