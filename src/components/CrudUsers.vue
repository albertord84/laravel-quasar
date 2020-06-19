<template>
  <div class="row justify-left">
      <!-- Dados gerais -->
      <div class="col-12 flex q-mt-xs justify-between">
          <span class="q-mt-sm" style="font-size:1.2rem">Dados gerais</span>
      </div>
      <q-separator  class="col-12 q-pa-none q-ma-none"></q-separator>

      <!-- Nome -->
      <div class="col-6 q-px-xs q-mt-lg">
        <span>Nome completo (*)</span>
        <q-input filled square v-model="userModel.username" label-color="orange-8" color="orange-8" class="col-12 q-mt-sm"/>
      </div>

      <!-- Email -->
      <div class="col-6 q-px-xs q-mt-lg">
        <span>Email (*)</span>
        <q-input filled square v-model="userModel.email" label-color="orange-8" color="orange-8" class="col-12 q-mt-sm"/>
      </div>

      <!-- Role -->
      <div class="col-6 q-px-xs q-mt-lg">
        <span>Tipo de usuário (*) </span>
        <q-select v-model="selectedUserRole" :options="optionsUsersRoles" @filter="filterFnAutoselectUsersRoles" @filter-abort="abortFilterFnUsersRoles" filled class="col-12 q-mt-sm" label-color="orange-8" color="orange-8" hide-selected fill-input input-debounce="0" label=""  clearable use-input>
          <template v-slot:no-option>
            <q-item>
              <q-item-section class="text-grey">
                Tipo de usuários
              </q-item-section>
            </q-item>
          </template>
        </q-select>
      </div>

      <!-- Status -->
      <div class="col-6 q-px-xs q-mt-lg">
        <span>Status do usuário (*) </span>
        <q-select v-model="selectedUserStatus" :options="optionsUsersStatuses" @filter="filterFnAutoselectUsersStatuses" @filter-abort="abortFilterFnUsersStatuses" filled class="col-12 q-mt-sm" label-color="orange-8" color="orange-8" hide-selected fill-input input-debounce="0" label=""  clearable use-input>
          <template v-slot:no-option>
            <q-item>
              <q-item-section class="text-grey">
                Status do usuário
              </q-item-section>
            </q-item>
          </template>
        </q-select>
      </div>

      <!-- Empresa -->
      <div class="col-6 q-px-xs q-mt-lg" v-if="userLogged.role_id === 1">
        <span>Atribuir empresa (*) </span>
        <q-select v-model="selectedUserCompany" :options="optionsCompanies" @filter="filterFnAutoselectCompany" @filter-abort="abortFilterFnCompany" filled class="col-12 q-mt-sm" label-color="orange-8" color="orange-8" hide-selected fill-input input-debounce="0" label=""  clearable use-input>
          <template v-slot:no-option>
            <q-item>
              <q-item-section class="text-grey">
                Empresas cadastradas
              </q-item-section>
            </q-item>
          </template>
        </q-select>
      </div>

      <!-- Eviar email de cadastro -->
      <div class="col-6 q-px-xs q-mt-lg" v-if="action === 'insert'">
        <span>Enviar email de cadastro? </span>
        <q-select v-model="sendRegisterEmail" :options="['Sim', 'Não']" filled class="col-6 q-mt-sm" label-color="orange-8" color="orange-8" fill-input input-debounce="0" label=" "></q-select>
      </div>

      <!-- Endereço -->
      <!-- ----------------------------------------------------------------------------------- -->
      <div class="col-12 flex q-mt-lg justify-between">
          <span class="q-mt-sm" style="font-size:1.2rem">Endereço do usuário (Opcional)</span>
      </div>
      <q-separator  class="col-12 q-pa-none q-ma-none"></q-separator>

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
        <span class="q-mt-sm" style="font-size:1.2rem">Finalizar {{(action === 'insert') ? 'criação' : 'edição'}} do usuário</span>
      </div>
      <q-separator  class="col-12 q-pa-none q-ma-none"></q-separator>
      <div class="q-my-md">
        <q-btn text-color="white" :loading="isCreatingUser" class="q-pa-sm q-mb-sm bg-orange-8"
            label="Guardar usuário"  title="Guardar usuário" icon="save" @click.prevent="saveUser">
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
import { Roles } from '../helpers/constants.js'

export default {
  name: 'CrudUsers',

  props: {
    action: null,
    user: null
  },

  data () {
    return {
      userModel: {
        id: 1,
        company_id: 0,
        cost_center_id: 0,
        address_id: 0,
        role_id: 0,
        status_id: 0,
        username: '',
        email: '',
        json_datas: ''
      },
      addressModel: {
        id: 0,
        cep: '',
        street: '',
        number: '',
        complement: '',
        district: '',
        city: '',
        uf: ''
      },

      fileInputCSV: null,
      fileInputCSVFullPath: '',
      modalHelpCSVFile: false,

      selectedUserRole: '',
      selectedUserRol: {},
      listUserRole: [],
      stringOptionsUserRol: [],
      optionsUsersRoles: [],

      selectedUserStatus: '',
      selectedUserStatu: {},
      listUserStatu: [],
      stringOptionsUserStatu: [],
      optionsUsersStatuses: [],

      selectedUserCompany: '',
      selectedCompany: {},
      listCompanies: [],
      stringOptionsCompanies: [],
      optionsCompanies: [],

      stringOptionsUF: ['AC', 'AL', 'AP', 'AM', 'BA', 'CE', 'ES', 'GO', 'MA', 'MT', 'MS', 'MG', 'PA', 'PB', 'PR', 'PE', 'PI', 'RJ', 'RN', 'RS', 'RO', 'RR', 'SC', 'SP', 'SE', 'TO', 'DF'],
      optionsUF: [],
      isValidatingCEP: false,

      userLogged: {
        role_id: 1
      },

      isCreatingUser: false,
      sendRegisterEmail: 'Não'
    }
  },

  methods: {

    saveUser () {
      if (!this.validateUserModel() || this.isCreatingUser) {
        return
      }
      if ((this.addressModel.cep.trim() !== '' && !this.validateAddressModel())) {
        return
      }
      this.isCreatingUser = true
      this.$q.loading.show()
      let url = (this.action === 'insert') ? 'criateFullUser' : 'updateFullUser'
      WebService.put('web/' + url, {
        'userModel': this.userModel,
        'addressModel': this.addressModel,
        'sendRegisterEmail': this.sendRegisterEmail,
        'userLogged': JSON.stringify(this.userLogged)
      })
        .then(response => {
          this.isCreatingUser = false
          let text = (this.action === 'insert') ? 'criado' : 'atualizado'
          this.$q.notify({ type: 'positive', color: 'teal-3', message: `Usuário ` + text + ` com sucesso.`, position: 'top-right' })
          this.$emit('reloadUsers')
        })
        .catch(error => {
          let text = (this.action === 'insert') ? 'criando' : 'atualizando'
          this.$q.notify({ type: 'negative', message: `Erro ` + text + ` usuário.`, position: 'top-right' })
          this.isCreatingUser = false
          console.log(error)
        })
        .finally(() => {
          this.isCreatingUser = false
          this.$q.loading.hide()
        })
    },

    prepareUserToUpdate () {
      if (this.user.Address) {
        this.addressModel = this.user.Address
      }
      if (this.user.Address) {
        this.addressModel = this.user.Address
      }
      if (this.user.UsersRole) {
        this.selectedUserRole = this.user.UsersRole.name
      }
      if (this.user.UsersStatus) {
        this.selectedUserStatus = this.user.UsersStatus.name
      }
      if (this.user.Company) {
        this.selectedUserCompany = this.user.Company.fantasy_name
      }
      this.userModel = this.user
    },

    updateUser () {
      // --------------
    },

    getUsersRoles () {
      WebService.get('web/' + 'usersRoles')
        .then(response => {
          this.stringOptionsUserRol = []
          response.data.some((item, i) => {
            if (item.id === 1) {
              if (this.userLogged.role_id === 1) {
                this.stringOptionsUserRol.push(item.name)
              }
            } else {
              this.stringOptionsUserRol.push(item.name)
            }
          })
          this.listUserRole = response.data
        })
        .catch(errors => {
        })
        .then(() => {
        })
    },

    getUsersStatus () {
      WebService.get('web/' + 'usersStatuses')
        .then(response => {
          this.stringOptionsUserStatu = []
          response.data.some((item, i) => {
            this.stringOptionsUserStatu.push(item.name)
          })
          this.listUserStatu = response.data
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

    selectUserRoleByName (role) {
      if (role.trim() === '') {
        return null
      }
      var resp = null
      this.listUserRole.some((item, i) => {
        if (item.name === role) {
          resp = item
        }
      })
      return resp
    },

    selectedUserStatuByName (statu) {
      if (statu.trim() === '') {
        return null
      }
      var resp = null
      this.listUserStatu.some((item, i) => {
        if (item.name === statu) {
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

    filterFnAutoselectUsersRoles (val, update, abort) {
      // call abort() at any time if you can't retrieve data somehow
      setTimeout(() => {
        update(
          () => {
            if (val === '') {
              this.optionsUsersRoles = this.stringOptionsUserRol
            } else {
              const needle = val.toLowerCase()
              this.optionsUsersRoles = this.stringOptionsUserRol.filter(v => v.toLowerCase().indexOf(needle) > -1)
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

    abortFilterFnUsersRoles () {
      this.selectedUserRole = ''
    },

    filterFnAutoselectUsersStatuses (val, update, abort) {
      // call abort() at any time if you can't retrieve data somehow
      setTimeout(() => {
        update(
          () => {
            if (val === '') {
              this.optionsUsersStatuses = this.stringOptionsUserStatu
            } else {
              const needle = val.toLowerCase()
              this.optionsUsersStatuses = this.stringOptionsUserStatu.filter(v => v.toLowerCase().indexOf(needle) > -1)
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

    abortFilterFnUsersStatuses () {
      this.selectedUserStatus = ''
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
      this.selectedUserCompany = ''
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

    getAddressByCEP () {
      if (this.addressModel.cep.trim() === '') {
        this.$q.notify({ type: 'warning', message: `O campo CEP não pode ser vazio.`, position: 'top-right' })
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

      this.selectedUserRol = this.selectUserRoleByName(this.selectedUserRole)
      if (!this.selectedUserRol) {
        this.$q.notify({ type: 'negative', message: `O campo Tipo de usuário é obrigatório.`, position: 'top-right' })
        return false
      } else {
        this.userModel.role_id = this.selectedUserRol.id
      }

      this.selectedUserStatu = this.selectedUserStatuByName(this.selectedUserStatus)
      if (!this.selectedUserStatu) {
        this.$q.notify({ type: 'negative', message: `O campo Status do usuário é obrigatório.`, position: 'top-right' })
        return false
      } else {
        this.userModel.status_id = this.selectedUserStatu.id
      }

      if (this.userLogged.role_id === Roles.Superadmin) {
        this.selectedCompany = this.selectedCompanyByName(this.selectedUserCompany)
        if (!this.selectedCompany) {
          this.$q.notify({ type: 'negative', message: `O campo Atribuir empresa é obrigatório.`, position: 'top-right' })
          return false
        } else {
          this.userModel.company_id = this.selectedCompany.id
        }
      } else {
        this.userModel.company_id = this.userLogged.company_id
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
    this.userLogged = this.$q.localStorage.getItem('user_data')
    this.getUsersRoles()
    this.getUsersStatus()
    this.getCompanies()

    if (this.action === 'edit') {
      this.prepareUserToUpdate()
    }
    if (this.userLogged.role_id > Roles.Admin) {
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
