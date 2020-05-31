<template>
  <div class="row justify-left">
      <!-- Dados gerais -->
      <div class="col-12 flex q-mt-xs justify-between">
          <span class="q-mt-sm" style="font-size:1.2rem">Dados gerais</span>
      </div>
      <q-separator  class="col-12 q-pa-none q-ma-none"></q-separator>

      <!-- Para superadmins: Origem da base -->
      <div class="col-6 q-px-xs q-mt-lg" v-if="userLogged.role_id == 1">
        <span>Origem da base (*) </span>
        <q-select v-model="selectedBaseOrigin" :options="optionsBasesOrg" @filter="filterFnAutoselectBaseOrigin" @filter-abort="abortFilterFnBasesOrigin" filled class="col-12 q-mt-sm" label-color="orange-8" color="orange-8" hide-selected fill-input input-debounce="0" label=""  clearable use-input>
          <template v-slot:no-option>
            <q-item>
              <q-item-section class="text-grey">
                Origem das bases
              </q-item-section>
            </q-item>
          </template>
        </q-select>
      </div>

      <!-- Para superadmins: Empresa -->
      <div class="col-6 q-px-xs q-mt-lg" v-if="userLogged.role_id == 1">
        <span>Atribuir empresa (*) </span>
        <q-select v-model="selectedBaseCompany" :options="optionsCompanies" @filter="filterFnAutoselectCompany" @filter-abort="abortFilterFnCompany" filled class="col-12 q-mt-sm" label-color="orange-8" color="orange-8" hide-selected fill-input input-debounce="0" label=""  clearable use-input>
          <template v-slot:no-option>
            <q-item>
              <q-item-section class="text-grey">
                Empresas cadastradas
              </q-item-section>
            </q-item>
          </template>
        </q-select>
      </div>

      <!-- Nome -->
      <div class="col-6 q-px-xs q-mt-lg">
        <span>Nome (*)</span>
        <q-input filled square v-model="baseModel.name" label-color="orange-8" color="orange-8" class="col-12 q-mt-sm"/>
      </div>

      <!-- Descrição -->
      <div class="col-6 q-px-xs q-mt-lg">
        <span>Descrição</span>
        <q-input filled square v-model="baseModel.decription" label-color="orange-8" color="orange-8" class="col-12 q-mt-sm"/>
      </div>

      <!-- Arquivo csv para base -->
      <div class="col-5 q-px-xs q-mt-lg">
        <span>Selecionar arquivo CSV da base (*) <q-icon color="primary" size="1.2rem" name="help" class="q-mb-sm q-ml-xs" @click="modalHelpCSVFile = true"/></span>
        <q-input filled square v-model="fileInputCSVFullPath" label-color="orange-8" color="orange-8" class="col-12 q-mt-sm" >
          <template v-slot:append>
            <q-icon v-show="fileInputCSV" name="cancel" color="grey-8" style="font-size:1.7rem" class="pointer-hover" @click.prevent="fileInputCSV = null, fileInputCSVFullPath = ''"/>
          </template>
        </q-input>
      </div>
      <div class="col-1 q-mt-xl">
        <input ref="fileInputCSV" style="display:none" type="file" @change.prevent="getFileSelected" accept=".csv"/>
        <q-btn text-color="white" class="q-pa-sm q-mt-sm q-mb-sm bg-orange-8" style="margin-top: 0.8rem"
            label="" title="Selecionar arquivo CSV" icon="vertical_align_top" @click="triggerEvent">
        </q-btn>
      </div>

      <!-- ----------------------------------------------------------------------------------- -->
      <!-- Boton de salvar -->
      <div class="col-12 flex q-my-md justify-between">
        <span class="q-mt-sm" style="font-size:1.2rem">Finalizar {{(action === 'insert') ? 'criação' : 'edição'}} da base</span>
      </div>
      <q-separator  class="col-12 q-pa-none q-ma-none"></q-separator>
      <div class="q-my-md">
        <q-btn text-color="white" :loading="isCreatingBase" class="q-pa-sm q-mb-sm bg-orange-8"
            label="Guardar base"  title="Guardar base" icon="save" @click.prevent="saveBase">
          <template v-slot:loading>
            <q-spinner></q-spinner>
          </template>
        </q-btn>
      </div>

      <q-dialog v-model="modalHelpCSVFile" persistent transition-show="flip-down" transition-hide="flip-up">
        <q-card>
          <q-card-section class="row items-center">
            <q-icon name="info" class="text-primary" style="font-size: 1.9rem;" />
              <span class="q-ml-sm">Aqui você deve selecionar o arquivo com extensão .csv (<i>comma-separated-values</i>) com os dados dos usuários da base que está sendo criada.
              <br>Esse arquivo deve possuir uma formatação espefífica. Descarregue a planilha template e preencha com os dados dos usuários da base.</span>
          </q-card-section>

          <q-card-actions align="right">
            <a :href="'http://' + app_host + '/external_files/planilha_base_usuarios.csv'" ref="lnkDownloadTemplate" download></a>
            <q-btn flat label="Descarregar planilha" color="orange-8" @click="downloadTemplate">
            </q-btn>
            <q-btn flat label="Cancelar" color="gray" v-close-popup />
          </q-card-actions>

        </q-card>
      </q-dialog>

  </div>
</template>

<script>
import { WebService } from '../services/WebService.js'
import { Roles, BasesOrigins } from '../helpers/constants.js'

export default {
  name: 'CrudCampaigns',

  props: {
    action: null,
    base: null
  },

  data () {
    return {
      baseModel: {
        id: 0,
        origin_id: 0,
        company_id: 0,
        criator_id: 0,
        name: '',
        description: '',
        json_data: '',
        created_at: '',
        updated_at: ''
      },
      fileInputCSV: null,
      fileInputCSVFullPath: '',
      modalHelpCSVFile: false,

      selectedBaseOrigin: '',
      selectedBaseOrg: {},
      listBasesOrg: [],
      stringOptionsBaseOrg: [],
      optionsBasesOrg: [],

      selectedBaseCompany: '',
      selectedCompany: {},
      listCompanies: [],
      stringOptionsCompanies: [],
      optionsCompanies: [],

      userLogged: {
        role_id: 1
      },

      isCreatingBase: false,
      app_host: ''
    }
  },

  methods: {

    saveBase () {
      if (!this.validateBaseModel() || this.isCreatingBase) {
        return
      }
      this.isCreatingBase = true
      this.$q.loading.show()
      if (this.action === 'insert') {
        if (this.userLogged.role_id === Roles.Admin) {
          this.baseModel.origin_id = BasesOrigins.PRIVATE
          this.baseModel.company_id = this.userLogged.company_id
        }
        this.baseModel.criator_id = this.userLogged.id
        WebService.post('web/bases', this.baseModel)
          .then(response => {
            this.sendSCVFile(response.data.id)
          })
          .catch(error => {
            this.$q.notify({ type: 'negative', message: `Erro criando base.`, position: 'top-right' })
            this.isCreatingBase = false
            console.log(error)
          })
          .finally(() => {
            this.isCreatingBase = false
          })
      } else {
        WebService.put('web/bases/' + this.baseModel.id, this.baseModel)
          .then(response => {
            if (this.fileInputCSV) {
              this.sendSCVFile(response.data.id)
            } else {
              this.isCreatingBase = false
              var text = (this.action === 'insert') ? 'criada' : 'atualizada'
              this.$q.notify({ type: 'positive', color: 'teal-3', message: `Base ` + text + ` com sucesso.`, position: 'top-right' })
              this.$emit('reloadBases')
            }
          })
          .catch(error => {
            this.$q.notify({ type: 'negative', message: `Erro atualizando base.`, position: 'top-right' })
            this.isCreatingBase = false
            console.log(error)
          })
          .finally(() => {
            this.isCreatingBase = false
          })
      }
    },

    sendSCVFile (baseId) {
      let formData = new FormData()
      formData.append('file', this.fileInputCSV)
      WebService.post('web/bases/' + baseId + '/baseFromCSV', formData, { headers: { 'Content-Type': 'multipart/form-data' } })
        .then(response => {
          this.isCreatingBase = false
          var text = (this.action === 'insert') ? 'criada' : 'atualizada'
          this.$q.notify({ type: 'positive', color: 'teal-3', message: `Base ` + text + ` com sucesso.`, position: 'top-right' })
          this.$emit('reloadBases')
        })
        .catch(error => {
          var text = (this.action === 'insert') ? 'criando' : 'atualizando'
          this.$q.notify({ type: 'negative', message: `Erro ` + text + ` base.`, position: 'top-right' })
          this.isCreatingBase = false
          console.log(error)
        })
        .finally(() => {
          this.isCreatingBase = false
          this.$q.loading.hide()
        })
    },

    prepareToUpdateBase () {
      this.baseModel = this.base
      this.selectedBaseOrigin = this.base.BaseOrigin.name
      this.selectedBaseCompany = this.base.Company.fantasy_name
    },

    getBasesOrigins () {
      WebService.get('web/' + 'basesOrigins')
        .then(response => {
          this.stringOptionsBaseOrg = []
          response.data.some((item, i) => {
            this.stringOptionsBaseOrg.push(item.name)
          })
          this.listBasesOrg = response.data
        })
        .catch(errors => {
        })
        .then(() => {
        })
    },

    getCompanies () {
      WebService.get('web/' + 'companies')
        .then(response => {
          this.stringOptionsCompanies = []
          response.data.some((item, i) => {
            this.stringOptionsCompanies.push(item.fantasy_name)
          })
          this.listCompanies = response.data
        })
        .catch(errors => {
        })
        .then(() => {
        })
    },

    selectedBaseOriginByName (BasesOrigins) {
      if (BasesOrigins.trim() === '') {
        return null
      }
      var resp = null
      this.listBasesOrg.some((item, i) => {
        if (item.name === BasesOrigins) {
          resp = item
        }
      })
      return resp
    },

    selectedCompanyByName (company) {
      if (company.trim() === '') {
        return null
      }
      var resp = null
      this.listCompanies.some((item, i) => {
        if (item.fantasy_name === company) {
          resp = item
        }
      })
      return resp
    },

    filterFnAutoselectBaseOrigin (val, update, abort) {
      // call abort() at any time if you can't retrieve data somehow
      setTimeout(() => {
        update(
          () => {
            if (val === '') {
              this.optionsBasesOrg = this.stringOptionsBaseOrg
            } else {
              const needle = val.toLowerCase()
              this.optionsBasesOrg = this.stringOptionsBaseOrg.filter(v => v.toLowerCase().indexOf(needle) > -1)
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

    abortFilterFnBasesOrigin () {
      this.selectedBaseOrigin = ''
    },

    filterFnAutoselectCompany (val, update, abort) {
      // call abort() at any time if you can't retrieve data somehow
      setTimeout(() => {
        update(
          () => {
            if (val === '') {
              this.optionsCompanies = this.stringOptionsCompanies
            } else {
              const needle = val.toLowerCase()
              this.optionsCompanies = this.stringOptionsCompanies.filter(v => v.toLowerCase().indexOf(needle) > -1)
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
      this.selectedBaseCompany = ''
    },

    validateBaseModel () {
      if (this.userLogged.role_id === 1) {
        this.selectedBaseOrg = this.selectedBaseOriginByName(this.selectedBaseOrigin)
        if (!this.selectedBaseOrg) {
          this.$q.notify({ type: 'negative', message: `O campo Origem da base é obrigatório.`, position: 'top-right' })
          return false
        } else {
          this.baseModel.origin_id = this.selectedBaseOrg.id
        }
      }

      if (this.userLogged.role_id === 1) {
        this.selectedCompany = this.selectedCompanyByName(this.selectedBaseCompany)
        if (!this.selectedCompany) {
          this.$q.notify({ type: 'negative', message: `O campo Atribuir empresa é obrigatório.`, position: 'top-right' })
          return false
        } else {
          this.baseModel.company_id = this.selectedCompany.id
        }
      }

      if (this.baseModel.name.trim() === '') {
        this.$q.notify({ type: 'negative', message: `O campo Nome é obrigatório.`, position: 'top-right' })
        return false
      }

      if (this.action === 'insert' && !this.fileInputCSV) {
        this.$q.notify({ type: 'negative', message: `Deve selecionar um arquivo CSV com a base de usuários.`, position: 'top-right' })
        return false
      }

      return true
    },

    triggerEvent () {
      this.fileInputCSV = null
      this.$refs.fileInputCSV.click()
    },

    getFileSelected (e) {
      this.fileInputCSV = e.target.files[0]
      if (this.fileInputCSV) {
        this.fileInputCSVFullPath = this.fileInputCSV.name
      }
    },

    downloadTemplate () {
      this.modalHelpCSVFile = false
      this.$refs.lnkDownloadTemplate.click()
    }
  },

  watch: {
  },

  beforeMount () {
    this.userLogged = this.$q.localStorage.getItem('user_data')
    if (this.userLogged.role_id > Roles.Admin) {
      this.$router.replace({ name: 'public.denied' })
    }
    this.getBasesOrigins()
    this.getCompanies()
    this.app_host = process.env.HOST

    if (this.action === 'edit') {
      this.prepareToUpdateBase()
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
