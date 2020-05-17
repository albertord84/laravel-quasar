<template>
  <div class="row justify-left">
      <!-- Dados gerais -->
      <div class="col-12 flex q-mt-xs justify-between">
          <span class="q-mt-sm" style="font-size:1.2rem">Dados gerais</span>
      </div>
      <q-separator  class="col-12 q-pa-none q-ma-none"></q-separator>

      <!-- Razão social -->
      <div class="col-6 q-px-xs q-mt-lg">
        <span>Razão social (*) <q-icon color="primary" size="1.2rem" name="help" class="q-mb-sm q-ml-xs" @click="socialReason"/> </span>
        <q-input filled square v-model="companyModel.social_reason" label-color="orange-8" color="orange-8" class="col-12 q-mt-sm"/>
      </div>

      <!-- Nome de fantasia -->
      <div class="col-6 q-px-xs q-mt-lg">
        <span>Nome de fantasia (*) <q-icon color="primary" size="1.2rem" name="help" class="q-mb-sm q-ml-xs" @click="fantasyName"/> </span>
        <q-input filled square v-model="companyModel.fantasy_name" label-color="orange-8" color="orange-8" class="col-12 q-mt-sm"/>
      </div>

      <!-- Descrição -->
      <div class="col-6 q-px-xs q-mt-lg">
        <span>Descrição </span>
        <q-input autogrow filled square v-model="companyModel.decription" label-color="orange-8" color="orange-8" class="col-12 q-mt-sm"/>
      </div>

      <!-- Observação -->
      <div class="col-6 q-px-xs q-mt-lg">
        <span>Observação</span>
        <q-input autogrow filled square v-model="companyModel.observation" label-color="orange-8" color="orange-8" class="col-12 q-mt-sm"/>
      </div>

      <!-- cnpj -->
      <div class="col-6 q-px-xs q-mt-lg">
        <span>CNPJ (*)</span>
        <q-input filled square v-model="companyModel.cnpj" label-color="orange-8" color="orange-8" class="col-12 q-mt-sm"/>
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

      <!-- Telefone 1 -->
      <div class="col-6 q-px-xs q-mt-lg">
        <span>Telefone principal (*)</span>
        <q-input filled square v-model="companyModel.phone" label-color="orange-8" color="orange-8" class="col-12 q-mt-sm"/>
      </div>

      <!-- Telefone 2 -->
      <div class="col-6 q-px-xs q-mt-lg">
        <span>Telefone secundário</span>
        <q-input filled square v-model="companyModel.phone2" label-color="orange-8" color="orange-8" class="col-12 q-mt-sm"/>
      </div>

      <!-- Endereço -->
      <div class="col-12 flex q-mt-lg justify-between">
          <span class="q-mt-sm" style="font-size:1.2rem">Endereço da empresa</span>
      </div>
      <q-separator  class="col-12 q-pa-none q-ma-none"></q-separator>

      <!-- ----------------------------------------------------------------------------------- -->
      <!-- CEP -->
      <div class="col-4 q-px-xs q-mt-lg">
        <span>CEP (*)</span>
        <q-input  v-model="addressModel.cep" class="col-12 q-mt-sm" filled label-color="orange-8" color="orange-8" placeholder="Digite o CEP">
          <template v-slot:append >
            <q-icon v-if="!isValidatingCEP" name="search" class="pointer-hover" @click.prevent="getAddressByCEP"/>
            <q-spinner-pie v-if="isValidatingCEP" color="orange" />
          </template>
        </q-input>
      </div>

      <!-- Rua -->
      <div class="col-8 q-px-xs q-mt-lg">
        <span>Rua (*)</span>
        <q-input filled square v-model="addressModel.street" label-color="orange-8" color="orange-8" class="col-12 q-mt-sm"/>
      </div>

      <!-- Número -->
      <div class="col-2 q-px-xs q-mt-lg">
        <span>Número (*)</span>
        <q-input filled square v-model="addressModel.number" label-color="orange-8" color="orange-8" class="col-12 q-mt-sm"/>
      </div>

      <!-- Complemento -->
      <div class="col-2 q-px-xs q-mt-lg">
        <span>Complemento</span>
        <q-input filled square v-model="addressModel.complement" label-color="orange-8" color="orange-8" class="col-12 q-mt-sm"/>
      </div>

      <!-- Bairro -->
      <div class="col-3 q-px-xs q-mt-lg">
        <span>Bairro (*)</span>
        <q-input filled square v-model="addressModel.district" label-color="orange-8" color="orange-8" class="col-12 q-mt-sm"/>
      </div>

      <!-- Cidade -->
      <div class="col-3 q-px-xs q-mt-lg">
        <span>Cidade (*)</span>
        <q-input filled square v-model="addressModel.city" label-color="orange-8" color="orange-8" class="col-12 q-mt-sm"/>
      </div>

      <!-- Estado -->
      <div class="col-2 q-px-xs q-mt-lg">
        <span>Estado (*)</span>
        <q-select v-model="addressModel.uf" :options="optionsUF" @filter="filterFnAutoselectUF" @filter-abort="abortFilterFnUF" filled class="col-12 q-mt-sm" label-color="orange-8" color="orange-8" hide-selected fill-input input-debounce="0" label=""  clearable use-input>
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
      </div>

      <!-- ----------------------------------------------------------------------------------- -->
      <!-- Modal para adicionar Admin -->
      <q-dialog v-model="modalCriateAdmin" persistent transition-show="flip-down"  transition-hide="flip-up">
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
      </q-dialog>
  </div>
</template>

<script>
import { WebService } from '../services/WebService.js'
import validation from '../services/ValidationService.js'

export default {
  name: 'CrudQuestionary',

  props: {
    action: null,
    company: null
  },

  data () {
    return {
      companyModel: {
        id: 0,
        social_reason: '', // 'Empresa de produtos digitais',
        fantasy_name: '', // 'SocialHub',
        decription: '', // 'Producção de software',
        observation: '',
        cnpj: '', // '73426420000108',
        responsible_id: 0,
        phone: '', // '5521965913089',
        phone2: '',
        address_id: 0
      },
      addressModel: {
        id: 0,
        cep: '', // '24020206',
        street: '',
        number: '',
        complement: '',
        district: '',
        city: '',
        uf: ''
      },
      userModel: {
        id: 0,
        company_id: 1,
        cost_center_id: 1,
        address_id: 1,
        role_id: 2,
        status_id: 1,
        username: '', // 'Jose Ramón',
        email: '', // 'jgonzalez@id.uff.br',
        password: '' // 'tmp'
      },

      selectedAdminEmail: '',
      selectedAdmin: {},
      listAdmins: [],

      modalCriateAdmin: false,

      stringOptions: [],
      options: [],
      stringOptionsUF: ['AC', 'AL', 'AP', 'AM', 'BA', 'CE', 'ES', 'GO', 'MA', 'MT', 'MS', 'MG', 'PA', 'PB', 'PR', 'PE', 'PI', 'RJ', 'RN', 'RS', 'RO', 'RR', 'SC', 'SP', 'SE', 'TO', 'DF'],
      optionsUF: [],

      isValidatingCEP: false,
      isCreatingCompany: false,
      isCreatingAdmin: false
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
        company: this.companyModel,
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

    createAdmin () {
      if (!this.validateUserModel()) {
        return
      }
      this.isCreatingAdmin = true
      this.userModel.password = 'tmp'
      WebService.put('web/signInUser', this.userModel)
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

    filterFnAutoselectUF (val, update, abort) {
      // call abort() at any time if you can't retrieve data somehow
      setTimeout(() => {
        update(
          () => {
            if (val === '') {
              this.optionsUF = this.stringOptionsUF
            } else {
              const needle = val.toLowerCase()
              this.optionsUF = this.stringOptionsUF.filter(v => v.toLowerCase().indexOf(needle) > -1)
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

    abortFilterFnUF () {
      this.addressModel.uf = ''
    },

    socialReason () {
      this.$q.dialog({
        title: 'Razão social',
        color: 'orange-8',
        message: 'É o nome de registro de uma empresa. Também conhecido como Nome Comercial, Denominação Social ou Firma Empresarial, é o nome dado à pessoa jurídica, que consta em documentos legais, contratos e escrituras.',
        transitionShow: 'flip-down',
        transitionHide: 'flip-up',
        ok: 'Aceitar'
      })
    },

    fantasyName () {
      this.$q.dialog({
        title: 'Nome de fantasia',
        color: 'orange-8',
        message: 'Também conhecido como Nome de Fachada ou Marca Empresarial, é o nome popular de uma empresa, e pode ou não ser igual à sua razão social.',
        transitionShow: 'flip-down',
        transitionHide: 'flip-up',
        ok: 'Aceitar'
      })
    },

    getAddressByCEP () {
      if (this.addressModel.cep.trim() === '') {
        this.$q.notify({ type: 'warning', message: `O CEP da empresa é obrigatório.`, position: 'top-right' })
        this.isValidatingCEP = false
        return
      }
      this.isValidatingCEP = true
      this.addressModel.cep = this.addressModel.cep.trim()
      let CEP = this.addressModel.cep.trim().replace(/-/i, '')
      WebService.get('web/getAddressByCEP/' + CEP)
        .then(response => {
          if (response.data.erro && response.data.erro === true) {
            this.$q.notify({ type: 'warning', message: `O CEP inserido não existe.`, position: 'top-right' })
            return
          }
          this.addressModel.cep = response.data.cep.replace(/-/i, '')
          this.addressModel.street = response.data.logradouro
          this.addressModel.district = response.data.bairro
          this.addressModel.city = response.data.localidade
          this.addressModel.uf = response.data.uf
        })
        .catch(error => {
          this.$q.notify({ type: 'negative', message: `O CEP inserido não existe.`, position: 'top-right' })
          console.log(error)
        })
        .finally(() => {
          this.isValidatingCEP = false
        })
    },

    validateCompanyModel () {
      var check
      if (this.companyModel.social_reason.trim() === '') {
        this.$q.notify({ type: 'negative', message: `O campo Razão social é obrigatório.`, position: 'top-right' })
        return false
      }

      if (this.companyModel.fantasy_name.trim() === '') {
        this.$q.notify({ type: 'negative', message: `O campo Nome de fantasia é obrigatório.`, position: 'top-right' })
        return false
      }

      if (this.companyModel.cnpj.trim() === '') {
        this.$q.notify({ type: 'negative', message: `O campo Nome de fantasia é obrigatório.`, position: 'top-right' })
        return false
      } else {
        check = validation.check('cnpj', this.companyModel.cnpj)
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
        this.companyModel.responsible_id = this.selectedAdmin.id
      }

      if (this.companyModel.phone.trim() === '') {
        this.$q.notify({ type: 'negative', message: `Informe pelo menos um número de telefone.`, position: 'top-right' })
        return false
      } else {
        check = validation.check('phone', this.companyModel.phone)
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
