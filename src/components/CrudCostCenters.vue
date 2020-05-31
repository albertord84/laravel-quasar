<template>
  <div class="row justify-left">
      <!-- Dados gerais -->
      <div class="col-12 flex q-mt-xs justify-between">
          <span class="q-mt-sm" style="font-size:1.2rem">Dados gerais</span>
      </div>
      <q-separator  class="col-12 q-pa-none q-ma-none"></q-separator>

      <!-- Nome do Centro de Custo -->
      <div class="col-6 q-px-xs q-mt-lg">
        <span>Nome do Centro de Custo (*)</span>
        <q-input filled square v-model="costCenterModel.name" label-color="orange-8" color="orange-8" class="col-12 q-mt-sm"/>
      </div>

      <!-- Administrador -->
      <div class="col-5 q-px-xs q-mt-lg">
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
      </div>

      <div class="col-1">
        <div class="q-mt-xl">
          <q-btn text-color="white" class="q-pa-sm q-mt-sm q-mb-sm bg-orange-8"
              label="" title="Criar administrador" icon="person_add" @click.prevent="isCreatingAdmin = false, modalCriateAdmin = true">
          </q-btn>
        </div>
      </div>

      <!-- ----------------------------------------------------------------------------------- -->
      <!-- Boton de salvar -->
      <div class="col-12 flex q-my-md justify-between">
        <span class="q-mt-sm" style="font-size:1.2rem">Finalizar {{(action === 'insert') ? 'criação' : 'edição'}} do Centro de Custo</span>
      </div>
      <q-separator  class="col-12 q-pa-none q-ma-none"></q-separator>
      <div class="q-my-md">
        <q-btn text-color="white" :loading="isCreatingCostCenter" class="q-pa-sm q-mb-sm bg-orange-8"
            label="Guardar Centro de Custo"  title="Guardar Centro de Custo" icon="save" @click.prevent="saveCostCenter">
          <template v-slot:loading>
            <q-spinner></q-spinner>
          </template>
        </q-btn>
      </div>

      <!-- ----------------------------------------------------------------------------------- -->
      <!-- Modal para adicionar Admin -->
      <q-dialog v-model="modalCriateAdmin" persistent transition-show="flip-down"  transition-hide="flip-up">
        <q-card>
          <q-card-section class="row items-center">
            <q-icon name="person" class="text-dark" style="font-size: 1.9rem;" />
            <span v-if="costCenter" class="q-ml-sm">Criando administrador da empresa</span>
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
            <div class="col-12 q-px-xs q-mt-lg">
              <span>Enviar email de cadastro? </span>
              <q-select v-model="sendRegisterEmail" :options="['Sim', 'Não']" filled class="col-6 q-mt-sm" label-color="orange-8" color="orange-8" fill-input input-debounce="0" label=" "></q-select>
            </div>
          </q-card-section>

          <q-card-actions align="right">
            <q-btn flat label="Criar" :loading="isCreatingAdmin" color="orange-8" style="width:120px" @click.prevent="createAdmin">
              <template v-slot:loading>
                <q-spinner></q-spinner>
              </template>
            </q-btn>
            <q-btn flat label="Cancelar" color="gray" style="width:120px" v-close-popup />
          </q-card-actions>

        </q-card>
      </q-dialog>

  </div>
</template>

<script>
import { WebService } from '../services/WebService.js'
import validation from '../services/ValidationService.js'
import { Roles } from '../helpers/userRoles.js'

export default {
  name: 'CrudCampaigns',

  props: {
    action: null,
    costCenter: null
  },

  data () {
    return {
      costCenterModel: {
        id: 0,
        company_id: 0,
        name: ''
      },
      userModel: {
        id: 0,
        company_id: 0,
        cost_center_id: 0,
        address_id: 0,
        role_id: 2,
        status_id: 1,
        username: '',
        email: ''
      },

      selectedAdminEmail: '',
      selectedAdmin: {},
      listAdmins: [],
      stringOptions: [],
      options: [],
      modalCriateAdmin: false,
      isCreatingAdmin: false,
      sendRegisterEmail: 'Não',

      userLogged: {},

      isCreatingCostCenter: false
    }
  },

  methods: {

    saveCostCenter () {
      if (!this.validateCostCenterModel() || this.isCreatingCostCenter) {
        return
      }
      this.isCreatingCostCenter = true
      this.$q.loading.show()
      if (this.costCenterModel.Admin) { delete this.costCenterModel.Admin }
      this.costCenterModel.company_id = this.userLogged.company_id
      if (this.action === 'insert') {
        WebService.post('web/costsCenters', this.costCenterModel)
          .then(response => {
            this.isCreatingCostCenter = false
            this.$q.notify({ type: 'positive', color: 'teal-3', message: `Centro de custo cadastrado com sucesso.`, position: 'top-right' })
            this.$emit('reloadCostCenters')
          })
          .catch(error => {
            this.$q.notify({ type: 'negative', message: `Erro cadastrando centro de custo.`, position: 'top-right' })
            this.isCreatingCostCenter = false
            console.log(error)
          })
          .finally(() => {
            this.isCreatingCostCenter = false
            this.$q.loading.hide()
          })
      } else {
        WebService.put('web/costsCenters', this.costCenterModel)
          .then(response => {
            this.isCreatingCostCenter = false
            this.$q.notify({ type: 'positive', color: 'teal-3', message: `Centro de custo atualizando com sucesso.`, position: 'top-right' })
            this.$emit('reloadCostCenters')
          })
          .catch(error => {
            this.$q.notify({ type: 'negative', message: `Erro atualizando centro de custo.`, position: 'top-right' })
            this.isCreatingCostCenter = false
            console.log(error)
          })
          .finally(() => {
            this.isCreatingCostCenter = false
            this.$q.loading.hide()
          })
      }
    },

    prepareToUpdateCostCenter () {
      // this.costCenterModel = this.base
      // this.selectedBaseOrigin = this.base.BaseOrigin.name
      // this.selectedBaseCompany = this.base.Company.fantasy_name
    },

    getAdmins () {
      WebService.get('web/' + 'users', {
        'userLogged': JSON.stringify(this.userLogged)
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

    createAdmin () {
      if (!this.validateUserModel()) {
        return
      }
      this.isCreatingAdmin = true
      this.userModel.password = 'tmp'
      delete this.userModel.address_id
      delete this.userModel.cost_center_id
      delete this.userModel.company_id
      WebService.put('web/criateFullUser', {
        'userModel': this.userModel,
        'sendRegisterEmail': this.sendRegisterEmail,
        'userLogged': JSON.stringify(this.userLogged)
      })
        .then(response => {
          this.isCreatingCompany = false
          this.userModel = response.data
          this.$q.notify({ type: 'positive', color: 'teal-3', message: `Administrador criado com sucesso.`, position: 'top-right' })
          this.modalCriateAdmin = false
          this.getAdmins()
        })
        .catch(error => {
          this.isCreatingCompany = false
          if (error.message.includes('Request failed with status code 500')) {
            this.$q.notify({ type: 'negative', message: `O nome ou o email informado já existe no banco de dados.`, position: 'top-right' })
          }
        })
        .finally(() => {
          this.isCreatingAdmin = false
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

    validateCostCenterModel () {
      if (this.costCenterModel.name.trim() === '') {
        this.$q.notify({ type: 'negative', message: `O campo Nome do Centro de Custo é obrigatório.`, position: 'top-right' })
        return false
      }
      this.selectedAdmin = this.selectUserByEmail(this.selectedAdminEmail)
      if (!this.selectedAdmin) {
        this.$q.notify({ type: 'negative', message: `Selecione um administrado válido ou crie um e selecione-o.`, position: 'top-right' })
        return false
      } else {
        this.costCenterModel.admin_id = this.selectedAdmin.id
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

    if (this.action === 'edit') {
      this.prepareToUpdateCostCenter()
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
