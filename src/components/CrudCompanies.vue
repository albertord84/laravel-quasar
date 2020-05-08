<template>
  <div class="row justify-left">
      <!-- Dados gerais -->
      <div class="col-12 flex q-mt-xl justify-between">
          <span class="q-mt-sm" style="font-size:1.2rem">Dados gerais</span>
      </div>
      <q-separator  class="col-12 q-pa-none q-ma-none"></q-separator>

      <!-- Razão social -->
      <div class="col-6 q-px-xs q-mt-lg">
        <b>Razão social (*) <q-icon color="primary" size="1.2rem" name="help" class="q-mb-sm q-ml-xs" @click="socialReason"/> </b>
        <q-input filled square v-model="companyModel.social_reason" label-color="orange-8" color="orange-8" class="col-12 q-mt-sm"/>
      </div>

      <!-- Nome de fantasia -->
      <div class="col-6 q-px-xs q-mt-lg">
        <b>Nome de fantasia (*) <q-icon color="primary" size="1.2rem" name="help" class="q-mb-sm q-ml-xs" @click="fantasyName"/> </b>
        <q-input filled square v-model="companyModel.fantasy_name" label-color="orange-8" color="orange-8" class="col-12 q-mt-sm"/>
      </div>

      <!-- Descrição -->
      <div class="col-6 q-px-xs q-mt-lg">
        <b>Descrição </b>
        <q-input autogrow filled square v-model="companyModel.decription" label-color="orange-8" color="orange-8" class="col-12 q-mt-sm"/>
      </div>

      <!-- Observação -->
      <div class="col-6 q-px-xs q-mt-lg">
        <b>Observação</b>
        <q-input autogrow filled square v-model="companyModel.observation" label-color="orange-8" color="orange-8" class="col-12 q-mt-sm"/>
      </div>

      <!-- CNPJ -->
      <div class="col-6 q-px-xs q-mt-lg">
        <b>CNPJ (*)</b>
        <q-input filled square v-model="companyModel.cnpj" label-color="orange-8" color="orange-8" class="col-12 q-mt-sm"/>
      </div>

      <!-- Administrador -->
      <div class="col-6 q-px-xs q-mt-lg">
        <b>Administrador (*)</b>
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

      <!-- Telefone 1 -->
      <div class="col-6 q-px-xs q-mt-lg">
        <b>Telefone principal (*)</b>
        <q-input filled square v-model="companyModel.phone" label-color="orange-8" color="orange-8" class="col-12 q-mt-sm"/>
      </div>

      <!-- Telefone 2 -->
      <div class="col-6 q-px-xs q-mt-lg">
        <b>Telefone secundário</b>
        <q-input filled square v-model="companyModel.phone2" label-color="orange-8" color="orange-8" class="col-12 q-mt-sm"/>
      </div>

      <!-- Endereço -->
      <div class="col-12 flex q-mt-xl justify-between">
          <span class="q-mt-sm" style="font-size:1.2rem">Endereço da empresa</span>
      </div>
      <q-separator  class="col-12 q-pa-none q-ma-none"></q-separator>

      <!-- CEP -->
      <div class="col-4 q-px-xs q-mt-lg">
        <b>CEP (*)</b>
        <q-input  v-model="addressModel.cep" class="col-12 q-mt-sm" filled label-color="orange-8" color="orange-8" placeholder="Digite o CEP">
          <template v-slot:append >
            <q-icon name="search" class="pointer-hover" @click.prevent="getAddressByCEP"/>
          </template>
        </q-input>
      </div>
      <!-- Rua -->
      <div class="col-8 q-px-xs q-mt-lg">
        <b>Rua (*)</b>
        <q-input filled square v-model="addressModel.street" label-color="orange-8" color="orange-8" class="col-12 q-mt-sm"/>
      </div>

      <!-- Número -->
      <div class="col-2 q-px-xs q-mt-lg">
        <b>Número (*)</b>
        <q-input filled square v-model="addressModel.street" label-color="orange-8" color="orange-8" class="col-12 q-mt-sm"/>
      </div>
      <!-- Complemento -->
      <div class="col-2 q-px-xs q-mt-lg">
        <b>Complemento</b>
        <q-input filled square v-model="addressModel.street" label-color="orange-8" color="orange-8" class="col-12 q-mt-sm"/>
      </div>
      <!-- Bairro -->
      <div class="col-3 q-px-xs q-mt-lg">
        <b>Bairro (*)</b>
        <q-input filled square v-model="addressModel.street" label-color="orange-8" color="orange-8" class="col-12 q-mt-sm"/>
      </div>
      <!-- Cidade -->
      <div class="col-4 q-px-xs q-mt-lg">
        <b>Cidade (*)</b>
        <q-input filled square v-model="addressModel.street" label-color="orange-8" color="orange-8" class="col-12 q-mt-sm"/>
      </div>
      <!-- Estado -->
      <div class="col-1 q-px-xs q-mt-lg">
        <b>Estado (*)</b>
        <q-input filled square v-model="addressModel.street" label-color="orange-8" color="orange-8" class="col-12 q-mt-sm"/>
      </div>

  </div>
</template>

<script>
import { WebService } from '../services/WebService.js'

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
        social_reason: '',
        fantasy_name: '',
        decription: '',
        observation: '',
        cnpj: '',
        responsible_id: 0,
        phone: '',
        phone2: '',
        address_id: 0
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

      stringOptions: [],
      options: [],
      selectedAdminEmail: '',

      isValidatingCEP: false,
      listUF: ['AC', 'AL', 'AP', 'AM', 'BA', 'CE', 'ES', 'GO', 'MA', 'MT', 'MS', 'MG', 'PA', 'PB', 'PR', 'PE', 'PI', 'RJ', 'RN', 'RS', 'RO', 'RR', 'SC', 'SP', 'SE', 'TO', 'DF']
    }
  },

  methods: {

    getAdmins () {
      WebService.get('web/' + 'getUsersByRole', {
        'filter': this.selectedAdminEmail,
        'role_id': 3
      })
        .then(response => {
          this.stringOptions = []
          response.data.some((item, i) => {
            this.stringOptions.push(item.email)
          })
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
      WebService.get('getAddressByCEP/' + CEP)
        .then(response => {
          if (response.data.erro && response.data.erro === true) {
            this.$q.notify({ type: 'warning', message: `O CEP inserido não existe.`, position: 'top-right' })
            return
          }
          this.addressModel.cep = response.data.cep
          this.companyModel.street = response.data.logradouro
          this.companyModel.district = response.data.bairro
          this.companyModel.city = response.data.localidade
          this.companyModel.uf = response.data.uf
        })
        .catch(error => {
          console.log(error)
          // this.processMessageError(error, "cep", "get")
        })
        .finally(() => {
          this.isValidatingCEP = false
        })
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
