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
      <div class="col-6 q-px-xs q-mt-lg">
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
  </div>
</template>

<script>
import { WebService } from '../services/WebService.js'
import { Roles } from '../helpers/constants.js'

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
        WebService.put('web/costsCenters/' + this.costCenterModel.id, this.costCenterModel)
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
      this.costCenterModel = this.costCenter
      this.selectedAdminEmail = this.costCenter.Admin.email
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
