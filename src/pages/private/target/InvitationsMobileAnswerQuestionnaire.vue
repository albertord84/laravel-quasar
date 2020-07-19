<template>
    <div style="margin-top:40px;">
      <div style="margin-top:22px;">
        <q-banner class="bg-white flex justify-start">
          <template v-slot:avatar>
            <q-icon name="keyboard_arrow_left" size="md" color="dark" @click="goBack"/>
          </template>
          <div class="text-center">
            <span style="margin-left:-40px">Questionário</span>
          </div>
        </q-banner>

        <q-separator />
        <q-scroll-area :thumb-style="thumbStyle" :content-style="contentStyle" :content-active-style="contentActiveStyle" style="" class="fill-window lt-md q-ml-xs">
          <div v-for="(page, index) in invitation.Campaign.Questionnaire.Pages" :key="index">
              <q-card-section v-if="indexQuestion == index">
                  <div class="text-p title text-bold">Questão {{index + 1}} de {{invitation.Campaign.Questionnaire.Pages.length}}</div>
                  <div class="text-p q-mt-md q-mb-xs text-justify">{{page.question}}</div>
                  <div class="text-caption text-grey">

                        <!-- Tipo de resposta: UNIQUE and MULTIPLE SELECTION -->
                        <div v-show="page.response_type_id === responsesTypes.BOOLEAN">
                          <div v-for="(option, index) in page.ResponseOptions" v-bind:key="index" style="width:100%">
                              <q-list>
                                <q-item tag="label" v-ripple>
                                  <q-item-section avatar>
                                    <q-radio v-model="response_option_id" :val="option.id" color="teal"/>
                                  </q-item-section>
                                  <q-item-section>
                                    <q-item-label class="text-dark">{{ (option.response == 'true') ? "Sim" : "Não"}}</q-item-label>
                                  </q-item-section>
                                </q-item>
                              </q-list>
                          </div>
                        </div>

                        <!-- Tipo de resposta: UNIQUE and MULTIPLE SELECTION -->
                        <div v-show="page.response_type_id === responsesTypes.UNIQUE_SELECTION || page.response_type_id === responsesTypes.MULTIPLE_SELECTION">
                          <div v-for="(option, index) in page.ResponseOptions" v-bind:key="index" style="width:100%">
                              <q-list>
                                <q-item tag="label" v-ripple>
                                  <q-item-section avatar>
                                    <q-radio v-model="response_option_id" :val="option.id" color="teal"/>
                                  </q-item-section>
                                  <q-item-section>
                                    <q-item-label class="text-dark">{{option.response}}</q-item-label>
                                  </q-item-section>
                                </q-item>
                              </q-list>
                          </div>
                        </div>

                        <!-- Tipo de resposta: SCALE -->
                        <div v-show="page.response_type_id === responsesTypes.SCALE_SELECTION">
                          <div v-for="(option, index) in page.newResponseOptions" v-bind:key="index" style="width:100%">
                              <q-list>
                                <q-item tag="label" v-ripple>
                                  <q-item-section avatar>
                                    <q-radio v-model="discursive_text" :val="option.response" color="teal"/>
                                  </q-item-section>
                                  <q-item-section>
                                    <q-item-label class="text-dark">{{option.response}}</q-item-label>
                                  </q-item-section>
                                </q-item>
                              </q-list>
                          </div>
                        </div>

                        <!-- Tipo de resposta: SCALE -->
                        <div v-show="page.response_type_id === responsesTypes.DISCURSIVE">
                          <div style="width:100%">
                              <div class="col-12 q-mt-lg">
                                <label>Mensagem:</label>
                                <q-input v-model="discursive_text" filled square type="textarea" :input-style="{ minHeight: '300px'}" label-color="orange-8" color="orange-8" class="col-12 q-mt-sm"/>
                              </div>
                          </div>
                        </div>

                  </div>
              </q-card-section>
          </div>
        </q-scroll-area>

        <div class="text-center q-py-sm bg-orange-8">
          <q-btn  text-color="white" class="q-pa-xs q-px-xl q-mb-xs bg-orange-8" flat @click.prevent="showNextPage"
                  :label="(indexQuestion < invitation.Campaign.Questionnaire.Pages.length - 1) ? 'Avançar' : 'Finalizar e enviar'"
                  :title="(indexQuestion < invitation.Campaign.Questionnaire.Pages.length - 1) ? 'Avançar' : 'Finalizar e enviar'"
          />
        </div>

      </div>
    </div>
</template>

<script>
import { WebService } from '../../../services/WebService.js'
import { ResponsesTypes } from '../../../helpers/constants.js'

export default {
  name: 'InvitationsMobileAnswerQuestionnaire',

  data () {
    return {
      loader: false,
      invitation: null,
      userLogged: {},
      indexQuestion: 0,
      responsesTypes: null,
      response: [],
      response_option_id: null,
      discursive_text: '',
      range: 0,
      isSendingResponses: false,
      timer: 0,
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
    goBack () {
      this.$router.push(
        {
          name: 'target.invitationMobileDatails',
          params: {
            invitation: this.invitation
          }
        }
      )
    },

    showNextPage () {
      if (this.isSendingResponses) {
        return
      }
      if (this.indexQuestion < this.invitation.Campaign.Questionnaire.Pages.length - 1) {
        // 1. conferir se essa pergunta foi respondida
        if (this.response_option_id === null && this.discursive_text === '') {
          this.$q.notify({ type: 'negative', message: `Responda para continuar.`, position: 'center' })
          return
        }
        // 2. armazenar resposta atual
        this.response.push({
          user_id: this.userLogged.id,
          question_id: this.invitation.Campaign.Questionnaire.Pages[this.indexQuestion].id,
          campaign_id: this.invitation.Campaign.id,
          response_option_id: this.response_option_id,
          discursive_text: this.discursive_text
        })
        this.response_option_id = null
        this.discursive_text = ''
        this.indexQuestion = this.indexQuestion + 1
      } else

      if (this.indexQuestion === this.invitation.Campaign.Questionnaire.Pages.length - 1) {
        // 3. enviar respostas para o servido, atualizar status do convite, notificar sucesso, e redirecionar para os convites
        this.isSendingResponses = true
        this.$q.loading.show({ message: 'Enviando respostas.<br/><span class="text-primary">Aguarde...</span>' })
        WebService.get('web/' + 'saveTargetResponses', {
          'userLogged': JSON.stringify(this.userLogged),
          'invitation': this.invitation,
          'responses': this.response
        })
          .then(response => {
            this.$q.loading.hide()
            this.$q.notify({ type: 'positive', color: 'blue', message: `Questionário finalizado e guardado com sucesso. Sua recompensa foi gerada.`, position: 'center' })
            this.$q.loading.hide()
            this.timer = setTimeout(() => {
              this.timer = void 0
              this.$router.push({ name: 'target.invitations' })
            }, 2000)
          })
          .catch(errors => {
          })
          .then(() => {
          })
      }
    }
  },

  beforeMount () {
    this.userLogged = this.$q.localStorage.getItem('user_data')
    this.responsesTypes = ResponsesTypes
    var invitation = Object.assign(this.$route.params.invitation)
    this.response = []
    invitation.Campaign.Questionnaire.Pages.some((item, i) => {
      if (item.response_type_id === this.responsesTypes.SCALE_SELECTION) {
        var a = parseInt(item.ResponseOptions[0]['response'])
        var b = parseInt(item.ResponseOptions[1]['response'])
        var newResponseOptions = []
        for (var j = a; j <= b; j++) {
          newResponseOptions.push({
            question_id: item.ResponseOptions[0]['question_id'],
            response: j,
            truth: false
          })
        }
        item.newResponseOptions = newResponseOptions
      }
    })
    this.invitation = invitation
    console.log(this.invitation.Campaign.Questionnaire.Pages)
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
