<template>
  <div class="row justify-left">
    <div style="width:100%">
      <q-table title=" "
            :data="data"
            :columns="columns"
            row-key="id"
            binary-state-sort
            :card-container-style="{ backgroundColor: '#ff0000' }"
            :dense="$q.screen.lt.md"
            :loading="isLoading"
            :pagination="pagination"
            :rows-per-page-options="[0]"
        >

        <template v-slot:top>
          <div class="col-4">
            <q-input  v-model="filter" label-color="orange-8" color="orange-8" placeholder="Buscar ..."/>
          </div>
          <div class="col-4 text-center">
            <q-btn flat dense class="q-ml-lg" icon-right="navigate_before"  title="Página anterior" no-caps @click="getQuestionnaires(page-1)" :disable="page==0"/>
            <q-btn flat dense class="q-px-sm "  title="Página atual" no-caps>
              <span v-if="!isLoading" color="orange">{{page+1}}</span>
              <q-spinner-pie v-if="isLoading" color="orange" />
            </q-btn>
            <q-btn flat dense icon-right="navigate_next"  title="Página seguinte" no-caps @click="getQuestionnaires(page+1)" :disable="!hasMorePage"/>
          </div>
          <div class="col-4 text-right">
            <q-btn color="orange-8" icon-right="archive" label="Exportar" title="Exportar para CSV" no-caps @click="exportTable"/>
          </div>
        </template>

        <template v-slot:body="props">
          <q-tr :props="props">
              <q-td key="questionayName" :props="props" class="q-pa-none q-ma-none" :title="props.row.name">
                  {{ props.row.name.substr(0, 40) + ' ...' }}
              </q-td>

              <q-td key="released" :props="props" class="q-pa-none q-ma-none">
                  {{ (props.row.released)? 'SIM' : 'NÃO' }}
              </q-td>

              <q-td key="criator_id" :props="props" class="q-pa-none q-ma-none">
                  {{ props.row.criator_id }}
              </q-td>

              <q-td key="created_at" :props="props" class="q-pa-none q-ma-none">
                {{ props.row.created_at }}
              </q-td>

              <q-td key="updater_id" :props="props" class="q-pa-none q-ma-none">
                {{ props.row.updater_id }}
              </q-td>

              <q-td key="updated_at" :props="props" class="q-pa-none q-ma-none">
                {{ props.row.updated_at }}
              </q-td>

              <q-td key="actions" :props="props" class="q-pa-none q-ma-none">
                <div style="margin-left:-3px; text-align: right">
                  <q-icon color="green-9" size="sm" v-show="props.row.released" class="pointer-hover q-mr-sm" title="Criar uma copia" name="dynamic_feed" @click="duplicateQuestionary(props.row)" />
                  <q-icon color="primary" size="sm" class="pointer-hover q-mr-sm" title="Ver/Editar" name="account_balance_wallet" @click="editQuestionary(props.row)" />
                  <q-icon color="red" size="sm" class="pointer-hover" name="delete" title="Eliminar" @click="confirmDeleteQuestionary(props.row)"/>
                </div>
              </q-td>

          </q-tr>
        </template>

        <template v-slot:bottom>
          <div class="col-12 text-center q-mt-md">
            <q-btn flat dense class="q-ml-lg" icon-right="navigate_before"  title="Página anterior" no-caps @click="getQuestionnaires(page-1)" :disable="page==0"/>
            <q-btn flat dense class="q-px-sm "  title="Página atual" no-caps>
              {{page+1}}
            </q-btn>
            <q-btn flat dense icon-right="navigate_next"  title="Página seguinte" no-caps @click="getQuestionnaires(page+1)" :disable="!hasMorePage"/>
          </div>
        </template>

        <template v-slot:pagination>
        </template>

        <template v-slot:no-data="{ icon, message, filter }">
          <div class="full-width row flex-center text-accent q-gutter-sm">
            <q-icon size="2em" name="sentiment_dissatisfied" />
            <span >
              Não existem dados para mostrar...
            </span>
            <q-icon size="2em" :name="filter ? 'filter_b_and_w' : icon" />
          </div>
        </template>
      </q-table>

      <q-dialog v-model="modalConfirmDelete" persistent transition-show="flip-down" transition-hide="flip-up">
        <q-card>
          <q-card-section class="row items-center">
            <q-icon name="warning" class="text-red" style="font-size: 1.9rem;" />
            <span v-if="questionary" class="q-ml-sm">Confirma que deseja eliminar o questionário "{{questionary.name}}"?</span>
          </q-card-section>

          <q-card-section v-show="isDeleting" class="text-center">
            <q-spinner-ios color="orange-8" size="1.9rem" />
          </q-card-section>

          <q-card-actions align="right">
            <q-btn flat label="Eliminar" color="orange-8" @click.prevent="deleteQuestionary">
            </q-btn>
            <q-btn flat label="Cancelar" color="gray" v-close-popup />
          </q-card-actions>

        </q-card>
      </q-dialog>
    </div>
  </div>
</template>

<script>
import { WebService } from '../services/WebService.js'
import { exportFile } from 'quasar'

function wrapCsvValue (val, formatFn) {
  let formatted = formatFn !== void 0
    ? formatFn(val)
    : val
  formatted = formatted === void 0 || formatted === null
    ? ''
    : String(formatted)
  formatted = formatted.split('"').join('""')
  /**
   * Excel accepts \n and \r in strings, but some other CSV parsers do not
   * Uncomment the next two lines to escape new lines
   */
  // .split('\n').join('\\n')
  // .split('\r').join('\\r')
  return `"${formatted}"`
}

export default {
  name: 'TableQuestionnaires',

  props: {
  },

  components: {
  },

  data () {
    return {
      questionary: null,
      action: '',
      data: [],
      columns: [
        {
          label: 'Nome',
          field: name,
          name: 'questionayName',
          required: true,
          align: 'left',
          format: val => `${val}`,
          sortable: true
        },
        {
          label: 'Liberado',
          field: 'released',
          name: 'released',
          align: 'center'
        },
        {
          label: 'Criador',
          field: 'criator_id',
          name: 'criator_id',
          align: 'center'
        },
        {
          label: 'Data de criação',
          field: 'created_at',
          name: 'created_at',
          align: 'center'
        },
        {
          label: 'Atualizador',
          field: 'updater_id',
          name: 'updater_id',
          align: 'center'
        },
        {
          label: 'Data de atualização',
          field: 'updated_at',
          name: 'updated_at',
          sortable: true,
          sort: (a, b) => parseInt(a, 10) - parseInt(b, 10),
          align: 'center'
        },
        {
          label: 'Ações',
          field: 'actions',
          name: 'actions',
          align: 'center'
        }
      ],
      filter: '',
      isLoading: false,
      page: 0,
      hasMorePage: false,
      strFilter: 0,
      pagination: { rowsPerPage: 0 },
      modalConfirmDelete: false,
      isDeleting: false,
      usersStatuses: [],
      userLogged: {}
    }
  },

  methods: {
    getQuestionnaires (page) {
      this.isLoading = true
      WebService.get('web/' + 'questionnaires', {
        'filter': this.filter,
        'page': page,
        'userLogged': this.userLogged
      })
        .then(response => {
          let tmp = Object.values(response.data)
          this.data = tmp
          this.page = page
          this.hasMorePage = tmp.length
        })
        .catch(errors => {
        })
        .then(() => {
          this.isLoading = false
        })
    },

    duplicateQuestionary () {
    },

    editQuestionary (questionary) {
      this.$emit('editQuestionary', questionary)
    },

    deleteQuestionary () {
      if (this.questionary) {
        this.isDeleting = true
        WebService.delete('web/' + 'questionnaires/' + this.questionary.id)
          .then(response => {
            this.modalConfirmDelete = false
            this.$q.notify({ type: 'positive', message: `Questionário eliminado com sucesso.`, position: 'top-right' })
            this.getQuestionnaires(this.page)
          })
          .catch(errors => {
          })
          .then(() => {
            this.isDeleting = false
          })
      }
    },

    confirmDeleteQuestionary (questionary) {
      this.questionary = questionary
      this.modalConfirmDelete = true
    },

    exportTable () {
      // naive encoding to csv format
      const content = [ this.columns.map(col => wrapCsvValue(col.label)) ].concat(
        this.data.map(row => this.columns.map(col => wrapCsvValue(
          typeof col.field === 'function'
            ? col.field(row)
            : row[col.field === void 0 ? col.name : col.field],
          col.format
        )).join(','))
      ).join('\r\n')
      const status = exportFile('table-export.csv', content, 'text/csv')
      if (status !== true) {
        this.$q.notify({ message: 'Download do arquivo negado pelo navegador...', color: 'negative', icon: 'warning' })
      }
    }
  },

  watch: {
    filter (value) {
      this.getQuestionnaires(0)
    }
  },

  beforeMount () {
    this.userLogged = this.$q.localStorage.getItem('user_data')
    this.getQuestionnaires(0)
  }
}
</script>

<style type="text/stylus" scoped>
  .pointer-hover:hover{
    cursor: pointer;
  }
</style>
