<template>
  <div class="row justify-left">
      <!-- Dados gerais -->
      <div class="col-12 flex q-mt-xs justify-between">
          <span class="q-mt-sm" style="font-size:1.2rem">Dados gerais</span>
      </div>
      <q-separator  class="col-12 q-pa-none q-ma-none"></q-separator>

      <!-- Para superadmins: Origem da base -->
      <div class="col-6 q-px-xs q-mt-lg" v-if="userLogged.role_id == 1">
        <span>Email do Target (*) </span>
        <q-select v-model="selectedTargetEmail" :options="optionsTargets" @filter="filterFnAutoselectTarget" @filter-abort="abortFilterFnTarget" filled class="col-12 q-mt-sm" label-color="orange-8" color="orange-8" hide-selected fill-input input-debounce="0" label=""  clearable use-input>
          <template v-slot:no-option>
            <q-item>
              <q-item-section class="text-grey">
                Email do target a ser recompensado
              </q-item-section>
            </q-item>
          </template>
        </q-select>
      </div>

      <!-- Campanha -->
      <div class="col-6 q-px-xs q-mt-lg">
        <span>Campanha respondida (*)</span>
        <q-select v-model="selectedCampaignRecompense" :options="optionsCampaign" @input="getFullQuestionaryByCampaignId" @filter="filterFnAutoselectCompany" @filter-abort="abortFilterFnCompany" filled class="col-12 q-mt-sm" label-color="orange-8" color="orange-8" hide-selected fill-input input-debounce="0" label=""  clearable use-input>
          <template v-slot:no-option>
            <q-item>
              <q-item-section class="text-grey">
                Campanha respondida
              </q-item-section>
            </q-item>
          </template>
        </q-select>
      </div>

      <!-- Questionário -->
      <div class="col-6 q-px-xs q-mt-lg">
        <span>Questionário desta campanha</span>
        <q-input filled square v-model="questionary.name" label-color="orange-8" color="orange-8" class="col-12 q-mt-sm" disable/>
      </div>

      <!-- Valor -->
      <div class="col-3 q-px-xs q-mt-lg">
        <span>Plano do questionário</span>
        <q-input filled square v-model="questionary.Plane.name" label-color="orange-8" color="orange-8" class="col-12 q-mt-sm" disable/>
      </div>

      <!-- Valor -->
      <div class="col-3 q-px-xs q-mt-lg">
        <span>Valor da recompensa</span>
        <q-input filled square v-model="questionary.Plane.recompense" label-color="orange-8" color="orange-8" class="col-12 q-mt-sm" disable/>
      </div>

      <!-- ----------------------------------------------------------------------------------- -->
      <!-- Boton de salvar -->
      <div class="col-12 flex q-my-md justify-between">
        <span class="q-mt-sm" style="font-size:1.2rem">Finalizar {{(action === 'insert') ? 'criação' : 'edição'}} da recompensa</span>
      </div>
      <q-separator  class="col-12 q-pa-none q-ma-none"></q-separator>
      <div class="q-my-md">
        <q-btn text-color="white" :loading="isCreatingRecompense" class="q-pa-sm q-mb-sm bg-orange-8"
            label="Guardar recompensa"  title="Guardar base" icon="save" @click.prevent="saveRecompense">
          <template v-slot:loading>
            <q-spinner></q-spinner>
          </template>
        </q-btn>
      </div>

  </div>
</template>

<script>
import { WebService } from '../services/WebService.js'
import { Roles } from '../helpers/userRoles.js'

export default {
  name: 'CrudCampaigns',

  props: {
    action: null,
    recompense: null
  },

  data () {
    return {
      recompenseModel: {
        id: 0,
        user_id: 0,
        questionnaire_id: 0,
        campaign_id: 0,
        value: ''
      },

      questionary: {
        Plane: {
          name: '',
          recompense: ''
        }
      },

      selectedTargetEmail: '',
      selectedTarget: {},
      listTargets: [],
      stringOptionsTargets: [],
      optionsTargets: [],

      selectedCampaignRecompense: '',
      selectedCampaign: {},
      listCampaign: [],
      stringOptionsCampaign: [],
      optionsCampaign: [],

      userLogged: {
        role_id: 1
      },

      isCreatingRecompense: false
    }
  },

  methods: {

    saveRecompense () {
      if (!this.validateRecompenseModel() || this.isCreatingRecompense) {
        return
      }

      delete this.recompenseModel.User
      delete this.recompenseModel.Campaign
      delete this.recompenseModel.Questionary
      delete this.recompenseModel.User
      delete this.recompenseModel.Company
      delete this.recompenseModel.updated_at
      delete this.recompenseModel.created_at
      delete this.recompenseModel.deleted_at
      this.isCreatingRecompense = true
      this.$q.loading.show()
      if (this.action === 'insert') {
        WebService.post('web/recompenses', this.recompenseModel)
          .then(response => {
            this.isCreatingRecompense = false
            this.$q.notify({ type: 'positive', color: 'teal-3', message: `Recompensa criada com sucesso.`, position: 'top-right' })
            this.$emit('reloadRecompenses')
          })
          .catch(error => {
            this.$q.notify({ type: 'negative', message: `Erro criando recompensa.`, position: 'top-right' })
            this.isCreatingRecompense = false
            console.log(error)
          })
          .finally(() => {
            this.isCreatingRecompense = false
          })
      } else if (this.action === 'edit') {
        WebService.put('web/recompenses/' + this.recompenseModel.id, this.recompenseModel)
          .then(response => {
            this.isCreatingRecompense = false
            this.$q.notify({ type: 'positive', color: 'teal-3', message: `Recompensa atualizada com sucesso.`, position: 'top-right' })
            this.$emit('reloadRecompenses')
          })
          .catch(error => {
            this.$q.notify({ type: 'negative', message: `Erro atualizando recompensa.`, position: 'top-right' })
            this.isCreatingRecompense = false
            console.log(error)
          })
          .finally(() => {
            this.isCreatingRecompense = false
            this.$q.loading.false()
          })
      }
    },

    prepareToUpdateRecompense () {
      this.selectedTargetEmail = this.recompense.User.email
      this.selectedCampaignRecompense = this.recompense.Campaign.name
      this.questionary = this.recompense.Questionary
      this.recompenseModel = this.recompense
    },

    getFullQuestionaryByCampaignId () {
      this.selectedCampaign = this.selectedCampaignByName(this.selectedCampaignRecompense)
      WebService.get('web/' + 'questionnaires', {
        id: this.selectedCampaign.id
      })
        .then(response => {
          this.questionary = response.data[0]
        })
        .catch(errors => {
        })
        .then(() => {
        })
    },

    getTargets () {
      WebService.get('web/' + 'users', {
        role_id: 3
      })
        .then(response => {
          this.stringOptionsTargets = []
          response.data.some((item, i) => {
            this.stringOptionsTargets.push(item.email)
          })
          this.listTargets = response.data
        })
        .catch(errors => {
        })
        .then(() => {
        })
    },

    getCampaigns () {
      WebService.get('web/' + 'campaigns')
        .then(response => {
          this.stringOptionsCampaign = []
          response.data.some((item, i) => {
            this.stringOptionsCampaign.push(item.name)
          })
          this.listCampaign = response.data
        })
        .catch(errors => {
        })
        .then(() => {
        })
    },

    selectedTargetByEmail (email) {
      if (email.trim() === '') {
        return null
      }
      var resp = null
      this.listTargets.some((item, i) => {
        if (item.email === email) {
          resp = item
        }
      })
      return resp
    },

    selectedCampaignByName (name) {
      if (name.trim() === '') {
        return null
      }
      var resp = null
      this.listCampaign.some((item, i) => {
        if (item.name === name) {
          resp = item
        }
      })
      return resp
    },

    filterFnAutoselectTarget (val, update, abort) {
      // call abort() at any time if you can't retrieve data somehow
      setTimeout(() => {
        update(
          () => {
            if (val === '') {
              this.optionsTargets = this.stringOptionsTargets
            } else {
              const needle = val.toLowerCase()
              this.optionsTargets = this.stringOptionsTargets.filter(v => v.toLowerCase().indexOf(needle) > -1)
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

    abortFilterFnTarget () {
      this.selectedTargetEmail = ''
    },

    filterFnAutoselectCompany (val, update, abort) {
      // call abort() at any time if you can't retrieve data somehow
      setTimeout(() => {
        update(
          () => {
            if (val === '') {
              this.optionsCampaign = this.stringOptionsCampaign
            } else {
              const needle = val.toLowerCase()
              this.optionsCampaign = this.stringOptionsCampaign.filter(v => v.toLowerCase().indexOf(needle) > -1)
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

    abortFilterFnCompany () {
      this.selectedCampaignRecompense = ''
    },

    validateRecompenseModel () {
      this.selectedTarget = this.selectedTargetByEmail(this.selectedTargetEmail)
      if (!this.selectedTarget) {
        this.$q.notify({ type: 'negative', message: `Selecione um Target válido.`, position: 'top-right' })
        return false
      } else {
        this.recompenseModel.user_id = this.selectedTarget.id // user_id
      }
      this.selectedCampaign = this.selectedCampaignByName(this.selectedCampaignRecompense)
      if (!this.selectedCampaign) {
        this.$q.notify({ type: 'negative', message: `O campo Atribuir empresa é obrigatório.`, position: 'top-right' })
        return false
      } else {
        this.recompenseModel.campaign_id = this.selectedCampaign.id // campaign_id
        this.recompenseModel.questionnaire_id = this.questionary.id
        this.recompenseModel.value = this.questionary.Plane.recompense
      }

      return true
    }
  },

  watch: {
  },

  beforeMount () {
    this.getTargets()
    this.getCampaigns()

    if (this.action === 'edit') {
      this.prepareToUpdateRecompense()
    }

    this.userLogged = this.$q.localStorage.getItem('user_data')
    if (this.userLogged.role_id > Roles.Superdmin) {
      this.$router.replace({ name: 'public.denied' })
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
