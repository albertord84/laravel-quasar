<template>
  <div class="row justify-left">
      <!-- Dados gerais -->
      <div class="col-12 flex q-mt-xs justify-between">
          <span class="q-mt-sm" style="font-size:1.2rem">Dados gerais</span>
      </div>
      <q-separator  class="col-12 q-pa-none q-ma-none"></q-separator>

      <!-- Status do pagamento -->
      <div class="col-6 q-px-xs q-mt-lg">
        <span>Status do pagamento</span>
        <q-select v-model="selectedExtractionsStatusModel" :options="optionsExtractionsStatus" @filter="filterFnAutoselectExtractionStatus" @filter-abort="abortFilterFnExtractionStatus" filled class="col-12 q-mt-sm" label-color="orange-8" color="orange-8" hide-selected fill-input input-debounce="0" label=""  clearable use-input>
          <template v-slot:no-option>
            <q-item>
              <q-item-section class="text-grey">
                Status do pagamento
              </q-item-section>
            </q-item>
          </template>
        </q-select>
      </div>

      <!-- Valor do pagamento -->
      <div class="col-6 q-px-xs q-mt-lg">
        <span>Valor do pagamento</span>
        <q-input filled square v-model="extractionModel.payed_value" label-color="orange-8" color="orange-8" class="col-12 q-mt-sm" disable/>
      </div>

      <!-- Para superadmins: Origem da base -->
      <div class="col-6 q-px-xs q-mt-lg">
        <span>Email do Target (*) </span>
        <q-input filled square v-model="extractionModel.User.email" label-color="orange-8" color="orange-8" class="col-12 q-mt-sm" disable/>
        <!-- <q-select v-model="selectedTargetEmail" @input="getPaymentDatasByUser" :options="optionsTargets" @filter="filterFnAutoselectTarget" @filter-abort="abortFilterFnTarget" filled class="col-12 q-mt-sm" label-color="orange-8" color="orange-8" hide-selected fill-input input-debounce="0" label=""  clearable use-input>
          <template v-slot:no-option>
            <q-item>
              <q-item-section class="text-grey">
                Email do target a ser recompensado
              </q-item-section>
            </q-item>
          </template>
        </q-select> -->
      </div>

      <!-- Nome do target -->
      <div class="col-6 q-px-xs q-mt-lg">
        <span>Nome do target</span>
        <q-input filled square v-model="extractionModel.User.username" label-color="orange-8" color="orange-8" class="col-12 q-mt-sm" disable/>
      </div>

      <!-- ----------------------------------------------------------------------------------- -->
      <!-- Dados bancários -->
      <div class="col-12 flex q-mt-lg justify-between">
          <span class="q-mt-sm" style="font-size:1.2rem">Dados bancários</span>
      </div>
      <q-separator  class="col-12 q-pa-none q-ma-none"></q-separator>

      <!-- Titular da conta -->
      <div class="col-6 q-px-xs q-mt-lg">
        <span>Titular da conta</span>
        <q-input filled square v-model="extractionModel.User.AccountBank.titular_name" label-color="orange-8" color="orange-8" class="col-12 q-mt-sm" disable/>
      </div>

      <!-- CPF do titular -->
      <div class="col-6 q-px-xs q-mt-lg">
        <span>CPF do titular</span>
        <q-input filled square v-model="extractionModel.User.AccountBank.titular_cpf" label-color="orange-8" color="orange-8" class="col-12 q-mt-sm" disable/>
      </div>

      <!-- Banco -->
      <div class="col-6 q-px-xs q-mt-lg">
        <span>Banco</span>
        <q-input filled square v-model="extractionModel.User.AccountBank.bank" label-color="orange-8" color="orange-8" class="col-12 q-mt-sm" disable/>
      </div>

      <!-- Tipo de conta -->
      <div class="col-6 q-px-xs q-mt-lg">
        <span>Agência</span>
        <q-input filled square v-model="extractionModel.User.AccountBank.agency" label-color="orange-8" color="orange-8" class="col-12 q-mt-sm" disable/>
      </div>

      <!-- Tipo de conta -->
      <div class="col-6 q-px-xs q-mt-lg">
        <span>Tipo de conta</span>
        <q-input filled square v-model="extractionModel.User.AccountBank.account_type" label-color="orange-8" color="orange-8" class="col-12 q-mt-sm" disable/>
      </div>

      <!-- Conta -->
      <div class="col-4 q-px-xs q-mt-lg">
        <span>Conta</span>
        <q-input filled square v-model="extractionModel.User.AccountBank.account" label-color="orange-8" color="orange-8" class="col-12 q-mt-sm" disable/>
      </div>

      <!-- Dígito -->
      <div class="col-2 q-px-xs q-mt-lg">
        <span>Dígito verificador</span>
        <q-input filled square v-model="extractionModel.User.AccountBank.dig" label-color="orange-8" color="orange-8" class="col-12 q-mt-sm" disable/>
      </div>

      <!-- ----------------------------------------------------------------------------------- -->
      <!-- Boton de salvar -->
      <div class="col-12 flex q-my-md justify-between">
        <span class="q-mt-sm" style="font-size:1.2rem">Finalizar {{(action === 'insert') ? 'criação' : 'edição'}} do pagamento</span>
      </div>
      <q-separator  class="col-12 q-pa-none q-ma-none"></q-separator>
      <div class="q-my-md">
        <q-btn text-color="white" :loading="isCreatingPayment" class="q-pa-sm q-mb-sm bg-orange-8"
            label="Guardar pagamento"  title="Guardar pagamento" icon="save" @click.prevent="saveRecompense">
          <template v-slot:loading>
            <q-spinner></q-spinner>
          </template>
        </q-btn>
      </div>

  </div>
</template>

<script>
import { WebService } from '../services/WebService.js'
import { AccountBanks } from '../services/AccountBanks.js'
import { Roles } from '../helpers/userRoles.js'

export default {
  name: 'CrudCampaigns',

  props: {
    action: null,
    payment: null
  },

  data () {
    return {
      extractionModel: {
        id: 0,
        status_id: 0,
        user_id: 0,
        requested_value: 0,
        payed_value: 0,
        AccountBank: {
          id: 0,
          user_id: 0,
          bank: '',
          agency: '',
          account: '',
          account_type: '',
          dig: '',
          titular_name: '',
          titular_cpf: ''
        },
        ExtractionsStatus: {
          id: 0,
          name: 0
        },
        User: {
          username: ''
        }
      },

      selectedTargetEmail: '',
      selectedTarget: {},
      listTargets: [],
      stringOptionsTargets: [],
      optionsTargets: [],

      selectedExtractionsStatusModel: '',
      selectedExtractionsStatus: {},
      listExtractionsStatus: [],
      stringExtractionsStatus: [],
      optionsExtractionsStatus: [],

      userLogged: {},
      AccountBanks: {},
      isCreatingPayment: false
    }
  },

  methods: {

    saveRecompense () {
      if (this.userLogged.role_id > Roles.Superdmin) {
        this.$router.replace({ name: 'public.denied' })
      }
      if (!this.validateExtractionModel() || this.isCreatingPayment) {
        return
      }
      // delete this.extractionModel.ExtractionsStatus
      // delete this.extractionModel.User
      // delete this.extractionModel.statusName
      this.extractionModel.payed_value = this.extractionModel.requested_value
      this.isCreatingPayment = true
      this.$q.loading.show()
      WebService.put('web/extractions/' + this.extractionModel.id, this.extractionModel)
        .then(response => {
          this.isCreatingPayment = false
          this.$q.notify({ type: 'positive', color: 'teal-3', message: `Pagamento atualizada com sucesso.`, position: 'top-right' })
          this.$emit('reloadPayments')
        })
        .catch(error => {
          this.$q.notify({ type: 'negative', message: `Erro atualizando pagamento.`, position: 'top-right' })
          this.isCreatingPayment = false
          console.log(error)
        })
        .finally(() => {
          this.isCreatingPayment = false
          this.$q.loading.hide()
        })
    },

    prepareToUpdatePayment () {
      this.selectedExtractionsStatusModel = this.payment.ExtractionsStatus.name
      this.extractionModel = this.payment
    },

    getExtractionsStatus () {
      WebService.get('web/' + 'extractionsStatuses')
        .then(response => {
          this.stringExtractionsStatus = []
          response.data.some((item, i) => {
            this.stringExtractionsStatus.push(item.name)
          })
          this.listExtractionsStatus = response.data
        })
        .catch(errors => {
        })
        .then(() => {
        })
    },

    filterFnAutoselectExtractionStatus (val, update, abort) {
      // call abort() at any time if you can't retrieve data somehow
      setTimeout(() => {
        update(
          () => {
            if (val === '') {
              this.optionsExtractionsStatus = this.stringExtractionsStatus
            } else {
              const needle = val.toLowerCase()
              this.optionsExtractionsStatus = this.stringExtractionsStatus.filter(v => v.toLowerCase().indexOf(needle) > -1)
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

    abortFilterFnExtractionStatus () {
      this.selectedExtractionsStatusModel = ''
    },

    selectedExtractionsStatusByName (name) {
      if (name.trim() === '') {
        return null
      }
      var resp = null
      this.listExtractionsStatus.some((item, i) => {
        if (item.name === name) {
          resp = item
        }
      })
      return resp
    },

    validateExtractionModel () {
      this.selectedExtractionsStatus = this.selectedExtractionsStatusByName(this.selectedExtractionsStatusModel)
      if (!this.selectedExtractionsStatus) {
        this.$q.notify({ type: 'negative', message: `Selecione um Status válido.`, position: 'top-right' })
        return false
      } else {
        this.extractionModel.status_id = this.selectedExtractionsStatus.id // user_id
      }

      return true
    }
  },

  watch: {
  },

  beforeMount () {
    this.userLogged = this.$q.localStorage.getItem('user_data')
    if (this.userLogged.role_id > Roles.Superdmin) {
      this.$router.replace({ name: 'public.denied' })
    }

    this.getExtractionsStatus()
    if (this.action === 'edit') {
      this.prepareToUpdatePayment()
    }
    this.AccountBanks = AccountBanks
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
