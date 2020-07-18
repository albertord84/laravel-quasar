<template>
    <div style="margin-top:22px;">
      <div style="margin-top:22px;">
        <q-banner class="bg-white flex justify-start">
          <template v-slot:avatar>
            <q-icon name="keyboard_arrow_left" size="md" color="dark" @click="showAllInvitations" />
          </template>
          <div class="text-center">
            <span style="margin-left:-40px">Questionário</span>
          </div>
        </q-banner>

        <q-card class="my-card q-mx-sm" flat bordered>
          <q-card-section >
            <!-- About campaign -->
            <div class="text-p title">Campanha</div>
            <q-separator />
            <div class="text-p q-mt-sm q-mb-xs">{{answerInvitation.Campaign.name}}</div>
            <div class="text-caption text-grey">
              {{answerInvitation.Campaign.description}}
            </div>
            <div class="flex justify-between q-mt-xs">
              <div class="text-p text-caption text-dark" >Início: {{answerInvitation.created_at.slice(0,10)}}</div>
              <div class="text-p text-caption text-dark" >Fim: {{answerInvitation.created_at.slice(0,10)}}</div>
            </div>

            <!-- About company -->
            <div class="text-p title q-mt-md">Entidade interessada</div>
            <q-separator />
            <div class="text-p q-mt-sm">{{answerInvitation.Company.fantasy_name}}</div>
            <div class="text-caption text-grey">
              {{answerInvitation.Company.social_reason}}
            </div>
            <div class="text-caption text-grey">
              {{answerInvitation.Company.decription}}
            </div>

            <!-- About invitation -->
            <div class="text-p title q-mt-md">Convite</div>
            <q-separator />
            <div class="flex justify-between q-mt-sm">
              <div class="text-p text-caption text-dark" >Recebido: {{answerInvitation.created_at.slice(0,10)}}</div>
              <div class="text-p text-caption text-dark">Status:
                  <span v-if="answerInvitation.accepted"><b style="color:green">ACEITO</b></span>
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
      </div>
    </div>
</template>

<script>
// import { WebService } from '../../../services/WebService.js'

export default {
  name: 'InvitationsMobileAnswerQuestionnaire',

  props: {
    answerInvitation: null
  },

  components: {
  },

  data () {
    return {
      loader: false,
      userLogged: {}
    }
  },

  methods: {
    showAllInvitations () {
      this.$emit('showAllInvitations')
    }
  },

  watch: {
  },

  computed: {
  },

  beforeMount () {
    this.userLogged = this.$q.localStorage.getItem('user_data')
    console.log(this.answerInvitation)
  }
}
</script>

<style type="text/stylus" scoped>
</style>
