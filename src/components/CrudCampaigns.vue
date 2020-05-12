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
        <q-input autogrow filled square v-model="campaignModel.decription" label-color="orange-8" color="orange-8" class="col-12 q-mt-sm"/>
      </div>

      <!-- Observação -->
      <div class="col-6 q-px-xs q-mt-lg">
        <span>Observação</span>
        <q-input autogrow filled square v-model="campaignModel.observation" label-color="orange-8" color="orange-8" class="col-12 q-mt-sm"/>
      </div>

      <!-- >Base de usuários -->
      <div class="col-6 q-px-xs q-mt-lg">
        <span>Base de usuários (*)</span>
        <q-input filled square v-model="campaignModel.base_id" label-color="orange-8" color="orange-8" class="col-12 q-mt-sm"/>
      </div>
      <!-- Questionário -->
      <div class="col-6 q-px-xs q-mt-lg">
        <span>Questionário (*)</span>
        <q-input filled square v-model="campaignModel.questionary_id" label-color="orange-8" color="orange-8" class="col-12 q-mt-sm"/>
      </div>

      <!-- Limite de respostas -->
      <div class="col-4 q-px-xs q-mt-lg">
        <span>Limite de respostas (*)</span>
        <q-input filled square v-model="campaignModel.response_limit" label-color="orange-8" color="orange-8" class="col-12 q-mt-sm"/>
      </div>

      <!-- Data de início -->
      <div class="col-4 q-px-xs q-mt-lg">
        <span>Data de início (*)</span>
        <q-input filled square v-model="campaignModel.start_date" label-color="orange-8" color="orange-8" class="col-12 q-mt-sm"/>
      </div>

      <!-- Data de fim -->
      <div class="col-4 q-px-xs q-mt-lg">
        <span>Data de fim (*)</span>
        <q-input filled square v-model="campaignModel.end_date" label-color="orange-8" color="orange-8" class="col-12 q-mt-sm"/>
      </div>

      <!-- Quantidade de respostas -->
      <!-- <div class="col-6 q-px-xs q-mt-lg">
        <span>Quantidade de respostas (*)</span>
        <q-input filled square v-model="campaignModel.response_amount" label-color="orange-8" color="orange-8" class="col-12 q-mt-sm"/>
      </div> -->

      <!-- Convites enviados -->
      <!-- <div class="col-6 q-px-xs q-mt-lg">
        <span>Convites enviados (*)</span>
        <q-input filled square v-model="campaignModel.invitations_sent" label-color="orange-8" color="orange-8" class="col-12 q-mt-sm"/>
      </div> -->

      <!-- Convites aceitos -->
      <!-- <div class="col-6 q-px-xs q-mt-lg">
        <span>Convites rejeitadas (*)</span>
        <q-input filled square v-model="campaignModel.invitations_accepted" label-color="orange-8" color="orange-8" class="col-12 q-mt-sm"/>
      </div> -->

      <!-- Convites aceitos -->
      <!-- <div class="col-6 q-px-xs q-mt-lg">
        <span>Convites rejeitadas (*)</span>
        <q-input filled square v-model="campaignModel.invitations_declined" label-color="orange-8" color="orange-8" class="col-12 q-mt-sm"/>
      </div> -->

      <!-- Solicitação de revisão -->
      <!-- <div class="col-6 q-px-xs q-mt-lg">
        <span>Solicitação de revisão (*)</span>
        <q-input filled square v-model="campaignModel.requested_date" label-color="orange-8" color="orange-8" class="col-12 q-mt-sm"/>
      </div> -->

      <!-- Data de revisão -->
      <!-- <div class="col-6 q-px-xs q-mt-lg">
        <span>Data de revisão (*)</span>
        <q-input filled square v-model="campaignModel.analyzed_date" label-color="orange-8" color="orange-8" class="col-12 q-mt-sm"/>
      </div> -->

      <!-- Administrador -->
      <!-- <div class="col-5 q-px-xs q-mt-lg">
        <span>Administrador (*)</span>
        <q-select v-model="selectedAdminEmail" :options="options" @filter="filterFnAutoselect" @filter-abort="abortFilterFn" filled class="col-12 q-mt-sm" label-color="orange-8" color="orange-8" hide-selected fill-input input-debounce="0" label=""  clearable use-input>
          <template v-slot:no-option>
            <q-item>
              <q-item-section class="text-grey">
                Não existem administradores cadastrados
              </q-item-section>
            </q-item>
          </template>
        </q-select>
      </div> -->

      <!-- ----------------------------------------------------------------------------------- -->
      <!-- Boton de salvar -->
      <!-- <div class="col-12 flex q-my-md justify-between">
        <span class="q-mt-sm" style="font-size:1.2rem">Finalizar {{(action === 'insert') ? 'criação' : 'edição'}} da empresa</span>
      </div>
      <q-separator  class="col-12 q-pa-none q-ma-none"></q-separator>
      <div class="q-my-md">
        <q-btn text-color="white" :loading="isCreatingCompany" class="q-pa-sm q-mb-sm bg-orange-8"
            label="Guardar empresa"  title="Guardar empresa" icon="save" @click.prevent="addCompany">
          <template v-slot:loading>
            <q-spinner></q-spinner>
          </template>
        </q-btn>
      </div> -->

      <!-- ----------------------------------------------------------------------------------- -->
      <!-- Modal para adicionar Admin -->
      <!-- <q-dialog v-model="modalCriateAdmin" persistent transition-show="flip-down"  transition-hide="flip-up">
        <q-card>
          <q-card-section class="row items-center">
            <q-icon name="person" class="text-dark" style="font-size: 1.9rem;" />
            <span v-if="company" class="q-ml-sm">Criando administrador da empresa</span>
          </q-card-section>

          <q-card-section class="text-left">
            <div class="col-12 q-px-xs">
              <span>Nome completo (*)</span>
              <q-input filled square v-model="userModel.username" style="min-width:400px; max-width:80%" label-color="orange-8" color="orange-8" class="col-12 q-mt-sm"/>
            </div>
            <div class="col-12 q-px-xs q-mt-lg">
              <span>Email (*)</span>
              <q-input filled square v-model="userModel.email" style="min-width:400px; max-width:80%" label-color="orange-8" color="orange-8" class="col-12 q-mt-sm"/>
            </div>
          </q-card-section>

          <q-card-actions align="right">
            <q-btn flat label="Criar" :loading="isCreatingAdmin" color="orange-9" style="width:120px" @click.prevent="createAdmin">
              <template v-slot:loading>
                <q-spinner></q-spinner>
              </template>
            </q-btn>
            <q-btn flat label="Cancelar" color="grey-9" style="width:120px" v-close-popup />
          </q-card-actions>

        </q-card>
      </q-dialog> -->
  </div>
</template>

<script>
import { WebService } from '../services/WebService.js'
import validation from '../services/ValidationService.js'

export default {
  name: 'CrudCampaign',

  props: {
    action: null,
    company: null
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
        response_limit: 0,
        response_amount: 0,
        invitations_sent: 0,
        invitations_accepted: 0,
        invitations_declined: 0,
        requested_date: '',
        analyzed_date: '2000-04-29 00:00:00',
        start_date: '2000-04-29 00:00:00',
        end_date: '2000-04-29 00:00:00',
        created_at: '2000-04-29 00:00:00',
        updated_at: '2000-04-29 00:00:00'
      }

      // selectedAdminEmail: '',
      // selectedAdmin: {},
      // listAdmins: [],

      // modalCriateAdmin: false,

      // stringOptions: [],
      // options: [],
      // stringOptionsUF: ['AC', 'AL', 'AP', 'AM', 'BA', 'CE', 'ES', 'GO', 'MA', 'MT', 'MS', 'MG', 'PA', 'PB', 'PR', 'PE', 'PI', 'RJ', 'RN', 'RS', 'RO', 'RR', 'SC', 'SP', 'SE', 'TO', 'DF'],
      // optionsUF: [],

      // isValidatingCEP: false,
      // isCreatingCompany: false,
      // isCreatingAdmin: false
    }
  },

  methods: {

    addCompany () {
      if (!this.validateCompanyModel()) {
        return
      }
      if (!this.validateAddressModel()) {
        return
      }

      this.isCreatingCompany = true
      WebService.put('web/criateFullCompany', {
        company: this.campaignModel,
        address: this.addressModel,
        admin: this.selectedAdmin
      })
        .then(response => {
          console.log(response.data)
          this.isCreatingCompany = false
          this.$q.notify({ type: 'positive', color: 'teal-3', message: `Empresa cadastrada com sucesso.`, position: 'top-right' })
          this.$emit('reloadCompanies')
        })
        .catch(error => {
          this.$q.notify({ type: 'negative', message: `Erro cadastrando empresa.`, position: 'top-right' })
          this.isCreatingCompany = false
          console.log(error)
        })
        .finally(() => {
          this.isCreatingCompany = false
        })
    },

    prepareToUpdateCompany () {
      // --------------
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

    validateCompanyModel () {
      var check
      if (this.campaignModel.social_reason.trim() === '') {
        this.$q.notify({ type: 'negative', message: `O campo Razão social é obrigatório.`, position: 'top-right' })
        return false
      }

      if (this.campaignModel.fantasy_name.trim() === '') {
        this.$q.notify({ type: 'negative', message: `O campo Nome de fantasia é obrigatório.`, position: 'top-right' })
        return false
      }

      if (this.campaignModel.cnpj.trim() === '') {
        this.$q.notify({ type: 'negative', message: `O campo Nome de fantasia é obrigatório.`, position: 'top-right' })
        return false
      } else {
        check = validation.check('cnpj', this.campaignModel.cnpj)
        if (check.success === false) {
          this.$q.notify({ type: 'negative', message: check.error, position: 'top-right' })
          return false
        }
      }

      this.selectedAdmin = this.selectUserByEmail(this.selectedAdminEmail)
      if (!this.selectedAdmin) {
        this.$q.notify({ type: 'negative', message: `Selecione um administrado válido ou crie um e selecione-o.`, position: 'top-right' })
        return false
      } else {
        this.campaignModel.responsible_id = this.selectedAdmin.id
      }

      if (this.campaignModel.phone.trim() === '') {
        this.$q.notify({ type: 'negative', message: `Informe pelo menos um número de telefone.`, position: 'top-right' })
        return false
      } else {
        check = validation.check('phone', this.campaignModel.phone)
        if (check.success === false) {
          this.$q.notify({ type: 'negative', message: check.error, position: 'top-right' })
          return false
        }
      }
      return true
    },

    validateUserModel () {
      var check
      if (this.userModel.username.trim() === '') {
        this.$q.notify({ type: 'negative', message: `O campo Nome completo é obrigatório.`, position: 'top-right' })
        return false
      }

      if (this.userModel.email.trim() === '') {
        this.$q.notify({ type: 'negative', message: `O campo Email é obrigatório.`, position: 'top-right' })
        return false
      } else {
        check = validation.check('email', this.userModel.email)
        if (check.success === false) {
          this.$q.notify({ type: 'negative', message: `O email informado é inválido.`, position: 'top-right' })
          return false
        }
      }
      return true
    },

    validateAddressModel () {
      var check
      if (this.addressModel.cep.trim() === '') {
        this.$q.notify({ type: 'negative', message: `O campo CEP é obrigatório.`, position: 'top-right' })
        return false
      } else {
        check = validation.check('cep', this.addressModel.cep)
        if (check.success === false) {
          this.$q.notify({ type: 'negative', message: `O CEP informado é inválido.`, position: 'top-right' })
          return false
        }
      }

      if (this.addressModel.street.trim() === '') {
        this.$q.notify({ type: 'negative', message: `O campo Rúa é obrigatório.`, position: 'top-right' })
        return false
      }

      if (this.addressModel.number.trim() === '') {
        this.$q.notify({ type: 'negative', message: `O campo Número é obrigatório.`, position: 'top-right' })
        return false
      }

      if (this.addressModel.district.trim() === '') {
        this.$q.notify({ type: 'negative', message: `O campo Bairro é obrigatório.`, position: 'top-right' })
        return false
      }

      if (this.addressModel.city.trim() === '') {
        this.$q.notify({ type: 'negative', message: `O campo Cidade é obrigatório.`, position: 'top-right' })
        return false
      }

      if (this.addressModel.uf.trim() === '') {
        this.$q.notify({ type: 'negative', message: `O campo Estado é obrigatório.`, position: 'top-right' })
        return false
      }
      return true
    }
  },

  watch: {
  },

  beforeMount () {
    this.getAdmins()
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
