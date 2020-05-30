<template>
  <div class="row justify-left">
      <!-- Dados gerais -->
      <div class="col-12 flex q-mt-xs justify-between">
          <span class="q-mt-sm" style="font-size:1.2rem">Dados gerais</span>
      </div>
      <q-separator  class="col-12 q-pa-none q-ma-none"></q-separator>

      <!-- Nome -->
      <div class="col-6 q-px-xs q-mt-lg">
        <span>Nome (*) </span>
        <q-input filled square v-model="campaignModel.name" label-color="orange-8" color="orange-8" class="col-12 q-mt-sm"/>
      </div>

      <!-- Objetivo -->
      <div class="col-6 q-px-xs q-mt-lg">
        <span>Objetivo </span>
        <q-input filled square v-model="campaignModel.objetive" label-color="orange-8" color="orange-8" class="col-12 q-mt-sm"/>
      </div>

      <!-- Descrição -->
      <div class="col-6 q-px-xs q-mt-lg">
        <span>Descrição </span>
        <q-input autogrow filled square v-model="campaignModel.description" label-color="orange-8" color="orange-8" class="col-12 q-mt-sm"/>
      </div>

      <!-- Observação -->
      <div class="col-6 q-px-xs q-mt-lg">
        <span>Observação</span>
        <q-input autogrow filled square v-model="campaignModel.observation" label-color="orange-8" color="orange-8" class="col-12 q-mt-sm"/>
      </div>

      <!-- Para superadmins: Admin -->
      <div class="col-6 q-px-xs q-mt-lg" v-if="userLogged.role_id == 1">
        <span>Administrador da empressa (*)</span>
        <q-select v-model="selectedAdminEmail" :options="options" @filter="filterFnAutoselect" @filter-abort="abortFilterFn" filled class="col-12 q-mt-sm" label-color="orange-8" color="orange-8" hide-selected fill-input input-debounce="0" label=""  clearable use-input>
          <template v-slot:no-option>
            <q-item>
              <q-item-section class="text-grey">
                Não existem administradores
              </q-item-section>
            </q-item>
          </template>
        </q-select>
      </div>

      <!-- Para superadmins: Status -->
      <div class="col-6 q-px-xs q-mt-lg" v-if="userLogged.role_id == 1">
        <span>Status da campanha (*)</span>
        <q-select v-model="selectedCampaignStatus" :options="optionsStatus" @filter="filterFnAutoselectStatus" @filter-abort="abortFilterFnStatus" filled class="col-12 q-mt-sm" label-color="orange-8" color="orange-8" hide-selected fill-input input-debounce="0" label=""  clearable use-input>
          <template v-slot:no-option>
            <q-item>
              <q-item-section class="text-grey">
                Status das campanhas
              </q-item-section>
            </q-item>
          </template>
        </q-select>
      </div>

      <!-- >Base de usuários -->
      <div class="col-6 q-px-xs q-mt-lg">
        <span>Base de usuários (*)</span>
        <q-select v-model="selectedCampaignBase" :options="optionsBases" @filter="filterFnAutoselectBase" @filter-abort="abortFilterFnBase" filled class="col-12 q-mt-sm" label-color="orange-8" color="orange-8" hide-selected fill-input input-debounce="0" label=""  clearable use-input>
          <template v-slot:no-option>
            <q-item>
              <q-item-section class="text-grey">
                  Não existem bases de usuários
              </q-item-section>
            </q-item>
          </template>
        </q-select>
      </div>

      <!-- Questionário -->
      <div class="col-6 q-px-xs q-mt-lg">
        <span>Questionário (*)</span>
        <q-select v-model="selectedCampaignQuestionnary" :options="optionsQuestionnaires" @filter="filterFnAutoselectQuestionnaires" @filter-abort="abortFilterFnQuestionnaires" filled class="col-12 q-mt-sm" label-color="orange-8" color="orange-8" hide-selected fill-input input-debounce="0" label=""  clearable use-input>
          <template v-slot:no-option>
            <q-item>
              <q-item-section class="text-grey">
                  Não existem questionários
              </q-item-section>
            </q-item>
          </template>
        </q-select>
      </div>

      <!-- Limite de respostas -->
      <div class="col-6 q-px-xs q-mt-lg">
        <span>Limite de respostas (*)</span>
        <q-input filled square v-model="campaignModel.response_limit" label-color="orange-8" color="orange-8" class="col-12 q-mt-sm"/>
      </div>

      <!-- Data para envio dos convites -->
      <div class="col-6 q-px-xs q-mt-lg">
        <span>Data para envio dos convites  (*)</span>
        <q-input filled v-model="campaignModel.invitations_send_date" label-color="orange-8" color="orange-8" class="col-12 q-mt-sm" >
          <template v-slot:prepend>
            <q-icon name="event" class="cursor-pointer">
              <q-popup-proxy transition-show="scale" transition-hide="scale">
                <q-date v-model="campaignModel.invitations_send_date" mask="YYYY-MM-DD HH:mm" :locale="myLocale" color="orange-8"/>
              </q-popup-proxy>
            </q-icon>
          </template>
          <template v-slot:append>
            <q-icon name="access_time" class="cursor-pointer">
              <q-popup-proxy transition-show="scale" transition-hide="scale">
                <q-time v-model="campaignModel.invitations_send_date" mask="YYYY-MM-DD HH:mm" format24h :locale="myLocale" color="orange-8"/>
              </q-popup-proxy>
            </q-icon>
          </template>
        </q-input>
      </div>

      <!-- Data de início -->
      <div class="col-6 q-px-xs q-mt-lg">
        <span>Data de início da campanha (*)</span>
        <q-input filled v-model="campaignModel.start_date" label-color="orange-8" color="orange-8" class="col-12 q-mt-sm" >
          <template v-slot:prepend>
            <q-icon name="event" class="cursor-pointer">
              <q-popup-proxy transition-show="scale" transition-hide="scale">
                <q-date v-model="campaignModel.start_date" mask="YYYY-MM-DD HH:mm" :locale="myLocale" color="orange-8" />
              </q-popup-proxy>
            </q-icon>
          </template>
          <template v-slot:append>
            <q-icon name="access_time" class="cursor-pointer">
              <q-popup-proxy transition-show="scale" transition-hide="scale">
                <q-time v-model="campaignModel.start_date" mask="YYYY-MM-DD HH:mm" format24h :locale="myLocale" color="orange-8"/>
              </q-popup-proxy>
            </q-icon>
          </template>
        </q-input>
      </div>

      <!-- Data de fim -->
      <div class="col-6 q-px-xs q-mt-lg">
        <span>Data de fim da campanha (*)</span>
        <q-input filled v-model="campaignModel.end_date" label-color="orange-8" color="orange-8" class="col-12 q-mt-sm">
          <template v-slot:prepend>
            <q-icon name="event" class="cursor-pointer">
              <q-popup-proxy transition-show="scale" transition-hide="scale">
                <q-date v-model="campaignModel.end_date" mask="YYYY-MM-DD HH:mm" :locale="myLocale" color="orange-8" />
              </q-popup-proxy>
            </q-icon>
          </template>
          <template v-slot:append>
            <q-icon name="access_time" class="cursor-pointer">
              <q-popup-proxy transition-show="scale" transition-hide="scale">
                <q-time v-model="campaignModel.end_date" mask="YYYY-MM-DD HH:mm" format24h :locale="myLocale" color="orange-8"/>
              </q-popup-proxy>
            </q-icon>
          </template>
        </q-input>
      </div>

      <!-- ----------------------------------------------------------------------------------- -->
      <!-- Boton de salvar -->
      <div class="col-12 flex q-my-md justify-between">
        <span class="q-mt-sm" style="font-size:1.2rem">Finalizar {{(action === 'insert') ? 'criação' : 'edição'}} da campanha</span>
      </div>
      <q-separator  class="col-12 q-pa-none q-ma-none"></q-separator>
      <div class="q-my-md">
        <q-btn text-color="white" :loading="isCreatingCampaign" class="q-pa-sm q-mb-sm bg-orange-8"
            label="Guardar campanha"  title="Guardar campanha" icon="save" @click.prevent="saveCampaign">
          <template v-slot:loading>
            <q-spinner></q-spinner>
          </template>
        </q-btn>
      </div>
  </div>
</template>

<script>
import { WebService } from '../services/WebService.js'
import validation from '../services/ValidationService.js'
import { Roles } from '../helpers/roles.js'

export default {
  name: 'CrudCampaigns',

  props: {
    action: null,
    campaign: null
  },

  data () {
    return {
      campaignModel: {
        id: 0,
        status_id: 0,
        criator_id: 0,
        updater_id: 0,
        questionary_id: 0,
        base_id: 0,
        name: '',
        objetive: '',
        description: '',
        observation: '',
        response_limit: '',
        response_amount: '',
        invitations_sent: '',
        invitations_accepted: '',
        invitations_declined: '',
        invitations_send_date: '',
        requested_date: '',
        analyzed_date: '',
        start_date: '',
        end_date: '',
        created_at: '',
        updated_at: ''
      },

      selectedAdminEmail: '',
      selectedAdmin: {},
      listAdmins: [],
      stringOptions: [],
      options: [],

      selectedCampaignStatus: '',
      selectedStatus: {},
      listStatus: [],
      stringOptionsStatus: [],
      optionsStatus: [],

      selectedCampaignBase: '',
      selectedBase: {},
      listBases: [],
      stringOptionsBases: [],
      optionsBases: [],

      selectedCampaignQuestionnary: '',
      selectedQuestionnary: {},
      listQuestionnaires: [],
      stringOptionsQuestionnaires: [],
      optionsQuestionnaires: [],

      userLogged: {},

      isCreatingCampaign: false,

      myLocale: {
        days: 'Domingo_Segunda_Terça_Quarta_Quinta_Sexta_Sábado'.split('_'),
        daysShort: 'Dom_Seg_Ter_Qua_Qui_Sex_Sáb'.split('_'),
        months: 'Janeiro_Fevereiro_Março_Abril_Maio_Junho_Julho_Agosto_Setembro_Outubro_Novembro_Dezembro'.split('_'),
        monthsShort: 'Jan_Fev_Mar_Abr_Mai_Jun_Jul_Ago_Set_Out_Nov_Dez'.split('_'),
        firstDayOfWeek: 1
      },
      today: ''
    }
  },

  methods: {

    saveCampaign () {
      if (!this.validateCampaignModel()) {
        return
      }
      this.campaignModel.updater_id = this.campaignModel.criator_id
      this.isCreatingCampaign = true
      this.$q.loading.show()
      if (this.campaign.UserCriator) { delete this.campaign.UserCriator }
      if (this.campaign.UserUpdater) { delete this.campaign.UserUpdater }
      if (this.campaign.StatusCampaign) { delete this.campaign.StatusCampaign }
      if (this.campaign.Questionnaire) { delete this.campaign.Questionnaire }
      if (this.campaign.Base) { delete this.campaign.Base }
      var url = (this.action === 'insert') ? 'criateFullCampaign' : 'updateFullCampaign'
      WebService.put('web/' + url, {
        campaign: this.campaignModel
      })
        .then(response => {
          this.isCreatingCampaign = false
          var text = (this.action === 'insert') ? 'criada' : 'atualizada'
          this.$q.notify({ type: 'positive', color: 'teal-3', message: `Campanha ` + text + ` com sucesso.`, position: 'top-right' })
          this.$emit('reloadCampaigns')
        })
        .catch(error => {
          var text = (this.action === 'insert') ? 'cadastrando' : 'atualizando'
          this.$q.notify({ type: 'negative', message: `Erro ` + text + ` campanha.`, position: 'top-right' })
          this.isCreatingCampaign = false
          console.log(error)
        })
        .finally(() => {
          this.isCreatingCampaign = false
          this.$q.loading.hide()
        })
    },

    prepareToUpdateCompany () {
      if (this.campaign.UserCriator) {
        this.selectedAdminEmail = this.campaign.UserCriator.email
      }
      if (this.campaign.StatusCampaign) {
        this.selectedCampaignStatus = this.campaign.StatusCampaign.name
      }
      if (this.campaign.Questionnaire) {
        this.selectedCampaignQuestionnary = this.campaign.Questionnaire.name
      }
      if (this.campaign.Base) {
        this.selectedCampaignBase = this.campaign.Base.name
      }
      this.campaign.invitations_send_date = this.campaign.invitations_send_date.slice(0, 16)
      this.campaign.start_date = this.campaign.start_date.slice(0, 16)
      this.campaign.end_date = this.campaign.end_date.slice(0, 16)
      // ---------------------
      this.campaign.invitations_send_date = '2020-05-27 10:00'
      this.campaign.start_date = '2020-05-28 10:00'
      this.campaign.end_date = '2020-05-29 10:00'
      // ---------------------
      this.campaignModel = this.campaign
    },

    updateCompany () {
      // --------------
    },

    getAdmins () {
      WebService.get('web/' + 'users', {
        'role_id': 2
      })
        .then(response => {
          this.stringOptions = []
          response.data.some((item, i) => {
            this.stringOptions.push(item.email)
          })
          this.listAdmins = response.data
        })
        .catch(errors => {
        })
        .then(() => {
        })
    },

    getCampaignsStatus () {
      WebService.get('web/' + 'campaignsStatuses')
        .then(response => {
          this.stringOptionsStatus = []
          response.data.some((item, i) => {
            this.stringOptionsStatus.push(item.name)
          })
          this.listStatus = response.data
        })
        .catch(errors => {
        })
        .then(() => {
        })
    },

    getBases () {
      var origins
      var company
      if (this.userLogged.role_id === Roles.Superadmin) {
        origins = JSON.stringify([1, 2, 3])
        company = 0
      }
      if (this.userLogged.role_id === Roles.Admin) {
        origins = JSON.stringify([1, 2])
        company = this.userLogged.company_id
      }
      WebService.get('web/' + 'bases', {
        'origin_id': origins,
        'company_id': company
      })
        .then(response => {
          this.stringOptionsBases = []
          response.data.some((item, i) => {
            this.stringOptionsBases.push(item.name)
          })
          this.listBases = response.data
        })
        .catch(errors => {
        })
        .then(() => {
        })
    },

    getQuestionnaires () {
      WebService.get('web/' + 'questionnaires')
        .then(response => {
          this.stringOptionsQuestionnaires = []
          response.data.some((item, i) => {
            this.stringOptionsQuestionnaires.push(item.name)
          })
          this.listQuestionnaires = response.data
        })
        .catch(errors => {
        })
        .then(() => {
        })
    },

    selectUserByEmail (email) {
      if (email.trim() === '') {
        return null
      }
      var resp = null
      this.listAdmins.some((item, i) => {
        if (item.email === email) {
          resp = item
        }
      })
      return resp
    },

    selectedStatusByName (status) {
      if (status.trim() === '') {
        return null
      }
      var resp = null
      this.listStatus.some((item, i) => {
        if (item.name === status) {
          resp = item
        }
      })
      return resp
    },

    selectedBaseByName (base) {
      if (base.trim() === '') {
        return null
      }
      var resp = null
      this.listBases.some((item, i) => {
        if (item.name === base) {
          resp = item
        }
      })
      return resp
    },

    selectedQuestionnaireByName (questionnaires) {
      if (questionnaires.trim() === '') {
        return null
      }
      var resp = null
      this.listQuestionnaires.some((item, i) => {
        if (item.name === questionnaires) {
          resp = item
        }
      })
      return resp
    },

    filterFnAutoselect (val, update, abort) {
      // call abort() at any time if you can't retrieve data somehow
      setTimeout(() => {
        update(
          () => {
            if (val === '') {
              this.options = this.stringOptions
            } else {
              const needle = val.toLowerCase()
              this.options = this.stringOptions.filter(v => v.toLowerCase().indexOf(needle) > -1)
            }
          },
          // next function is available in Quasar v1.7.4+;
          // "ref" is the Vue reference to the QSelect
          ref => {
            if (val !== '' && ref.options.length > 0 && ref.optionIndex === -1) {
              ref.moveOptionSelection(1, true) // focus the first selectable option and do not update the input-value
              ref.toggleOption(ref.options[ref.optionIndex], true) // toggle the focused option
            }
          }
        )
      }, 300)
    },

    abortFilterFn () {
      this.selectedAdminEmail = ''
    },

    filterFnAutoselectStatus (val, update, abort) {
      // call abort() at any time if you can't retrieve data somehow
      setTimeout(() => {
        update(
          () => {
            if (val === '') {
              this.optionsStatus = this.stringOptionsStatus
            } else {
              const needle = val.toLowerCase()
              this.optionsStatus = this.stringOptionsStatus.filter(v => v.toLowerCase().indexOf(needle) > -1)
            }
          },
          // next function is available in Quasar v1.7.4+;
          // "ref" is the Vue reference to the QSelect
          ref => {
            if (val !== '' && ref.options.length > 0 && ref.optionIndex === -1) {
              ref.moveOptionSelection(1, true) // focus the first selectable option and do not update the input-value
              ref.toggleOption(ref.options[ref.optionIndex], true) // toggle the focused option
            }
          }
        )
      }, 300)
    },

    abortFilterFnStatus () {
      this.selectedCampaignStatus = ''
    },

    filterFnAutoselectBase (val, update, abort) {
      // call abort() at any time if you can't retrieve data somehow
      setTimeout(() => {
        update(
          () => {
            if (val === '') {
              this.optionsBases = this.stringOptionsBases
            } else {
              const needle = val.toLowerCase()
              this.optionsBases = this.stringOptionsBases.filter(v => v.toLowerCase().indexOf(needle) > -1)
            }
          },
          // next function is available in Quasar v1.7.4+;
          // "ref" is the Vue reference to the QSelect
          ref => {
            if (val !== '' && ref.options.length > 0 && ref.optionIndex === -1) {
              ref.moveOptionSelection(1, true) // focus the first selectable option and do not update the input-value
              ref.toggleOption(ref.options[ref.optionIndex], true) // toggle the focused option
            }
          }
        )
      }, 300)
    },

    abortFilterFnBase () {
      this.selectedCampaignBase = ''
    },

    filterFnAutoselectQuestionnaires (val, update, abort) {
      // call abort() at any time if you can't retrieve data somehow
      setTimeout(() => {
        update(
          () => {
            if (val === '') {
              this.optionsQuestionnaires = this.stringOptionsQuestionnaires
            } else {
              const needle = val.toLowerCase()
              this.optionsQuestionnaires = this.stringOptionsQuestionnaires.filter(v => v.toLowerCase().indexOf(needle) > -1)
            }
          },
          // next function is available in Quasar v1.7.4+;
          // "ref" is the Vue reference to the QSelect
          ref => {
            if (val !== '' && ref.options.length > 0 && ref.optionIndex === -1) {
              ref.moveOptionSelection(1, true) // focus the first selectable option and do not update the input-value
              ref.toggleOption(ref.options[ref.optionIndex], true) // toggle the focused option
            }
          }
        )
      }, 300)
    },

    abortFilterFnQuestionnaires () {
      this.selectedCampaignQuestionnary = ''
    },

    validateCampaignModel () {
      var check
      if (this.campaignModel.name.trim() === '') {
        this.$q.notify({ type: 'negative', message: `O campo Nome é obrigatório.`, position: 'top-right' })
        return false
      }

      if (this.userLogged.role_id === 1) {
        this.selectedAdmin = this.selectUserByEmail(this.selectedAdminEmail)
        if (!this.selectedAdmin) {
          this.$q.notify({ type: 'negative', message: `O campo Administrador é obrigatório.`, position: 'top-right' })
          return false
        } else {
          this.campaignModel.criator_id = this.selectedAdmin.id
        }
      }

      if (this.userLogged.role_id === 1) {
        this.selectedStatus = this.selectedStatusByName(this.selectedCampaignStatus)
        if (!this.selectedStatus) {
          this.$q.notify({ type: 'negative', message: `O campo Status é obrigatório.`, position: 'top-right' })
          return false
        } else {
          this.campaignModel.status_id = this.selectedStatus.id
        }
      }

      this.selectedBase = this.selectedBaseByName(this.selectedCampaignBase)
      if (!this.selectedBase) {
        this.$q.notify({ type: 'negative', message: `O campo Base de usuários é obrigatório.`, position: 'top-right' })
        return false
      } else {
        this.campaignModel.base_id = this.selectedBase.id
      }

      this.selectedQuestionnary = this.selectedQuestionnaireByName(this.selectedCampaignQuestionnary)
      if (!this.selectedQuestionnary) {
        this.$q.notify({ type: 'negative', message: `O campo Questionário é obrigatório.`, position: 'top-right' })
        return false
      } else {
        this.campaignModel.questionary_id = this.selectedQuestionnary.id
      }

      this.campaignModel.response_limit = String(this.campaignModel.response_limit)
      if (this.campaignModel.response_limit.trim() === '' || this.campaignModel.response_limit.trim() === 0 || this.campaignModel.response_limit.trim() === '0') {
        this.$q.notify({ type: 'negative', message: `O campo Limite de respostas é inválido.`, position: 'top-right' })
        return false
      }

      if (this.campaignModel.invitations_send_date.trim() === '') {
        this.$q.notify({ type: 'negative', message: `O campo Data para envio dos convites é obrigatório.`, position: 'top-right' })
        return false
      } else {
        check = validation.check('date2', this.campaignModel.invitations_send_date)
        if (check.success === false) {
          this.$q.notify({ type: 'negative', message: `A Data para envio dos convites é inválida.`, position: 'top-right' })
          return false
        } else {
          if (this.campaignModel.start_date < this.today) {
            this.$q.notify({ type: 'negative', message: `A Data de envio dos convites deve ser maior que a data atual.`, position: 'top-right' })
            return false
          }
        }
      }

      if (this.campaignModel.start_date.trim() === '') {
        this.$q.notify({ type: 'negative', message: `O campo Data de início da campanha é obrigatório.`, position: 'top-right' })
        return false
      } else {
        check = validation.check('date2', this.campaignModel.start_date)
        if (check.success === false) {
          this.$q.notify({ type: 'negative', message: `A Data de início da campanha é inválida.`, position: 'top-right' })
          return false
        } else {
          if (this.campaignModel.start_date <= this.campaignModel.invitations_send_date) {
            this.$q.notify({ type: 'negative', message: `A Data de início da campanha deve ser maior que a Data de envio dos convites.`, position: 'top-right' })
            return false
          }
        }
      }

      if (this.campaignModel.end_date.trim() === '') {
        this.$q.notify({ type: 'negative', message: `O campo Data de fim da campanha é obrigatório.`, position: 'top-right' })
        return false
      } else {
        check = validation.check('date2', this.campaignModel.end_date)
        if (check.success === false) {
          this.$q.notify({ type: 'negative', message: `A Data de fim da campanha é inválida.`, position: 'top-right' })
          return false
        } else {
          if (this.campaignModel.end_date <= this.campaignModel.start_date) {
            this.$q.notify({ type: 'negative', message: `A Data de fim da campanha deve ser maior que a Data de início.`, position: 'top-right' })
            return false
          }
        }
      }

      return true
    },

    now () {
      var d = new Date()
      var date = d.getDate()
      var month = d.getMonth() + 1
      month = (month < 11) ? '0' + month : month
      var year = d.getFullYear()
      // var hour = d.getHours()
      // var min = d.getMinutes()
      this.today = year + '-' + month + '-' + date + ' 00:00'
    },

    modelTimes () {
      var d = new Date()
      d.setDate(d.getDate() + 1)
      var date = d.getDate()
      var month = d.getMonth() + 1
      month = (month < 11) ? '0' + month : month
      var year = d.getFullYear()
      this.campaignModel.invitations_send_date = year + '-' + month + '-' + date + ' ' + '00:00'

      d = new Date()
      d.setDate(d.getDate() + 3)
      date = d.getDate()
      month = d.getMonth() + 1
      month = (month < 11) ? '0' + month : month
      year = d.getFullYear()
      this.campaignModel.start_date = year + '-' + month + '-' + date + ' ' + '00:00'

      d = new Date()
      d.setDate(d.getDate() + 8)
      date = d.getDate()
      month = d.getMonth() + 1
      month = (month < 11) ? '0' + month : month
      year = d.getFullYear()
      this.campaignModel.end_date = year + '-' + month + '-' + date + ' ' + '23:59'
    }

  },

  watch: {
  },

  beforeMount () {
    this.userLogged = this.$q.localStorage.getItem('user_data')
    if (this.userLogged.role_id > Roles.Admin) {
      this.$router.replace({ name: 'public.denied' })
    }

    this.getAdmins()
    this.getCampaignsStatus()
    this.getBases()
    this.getQuestionnaires()

    this.now()
    if (this.action === 'insert') {
      this.modelTimes()
    }
    if (this.action === 'edit') {
      this.prepareToUpdateCompany()
    }
  },

  mounted () {
  }
}
</script>

<style type="text/stylus" scoped>
  .my-p{
    padding: 1.2em;
  }
  .my-p2{
    padding: 0.6em;
  }
  .pointer-hover:hover{
    cursor: pointer;
  }
</style>
