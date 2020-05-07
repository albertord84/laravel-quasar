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
          :loading="loading"
          :pagination="pagination"
          :rows-per-page-options="[0]"
          >

        <template v-slot:top>
          <div class="col-4">
            <q-input  v-model="filter" label-color="orange-8" color="orange-8" placeholder="Buscar ...">
              <template v-slot:append >
                <q-icon name="search" class="pointer-hover"/>
              </template>
            </q-input>
          </div>
          <div class="col-4 text-right">
            <q-btn flat dense icon-right="first_page" title="Página inicial" no-caps @click="getCompanies(0)" :disable="page==0"/>
            <q-btn flat dense icon-right="navigate_before"  title="Página anterior" no-caps @click="getCompanies(page-1)" :disable="page==0"/>
            <q-btn flat dense class="q-px-sm"  title="Página atual" no-caps>{{page+1}}</q-btn>
            <q-btn flat dense icon-right="navigate_next"  title="Página seguinte" no-caps @click="getCompanies(page+1)" :disable="page==lastPage"/>
            <q-btn flat dense icon-right="last_page"  title="Página final" no-caps @click="getCompanies('last')" :disable="page==lastPage"/>
          </div>
          <div class="col-4 text-right">
            <q-btn color="orange-8" icon-right="archive" label="Exportar" title="Exportar para CSV" no-caps @click="exportTable"/>
          </div>
        </template>

        <template v-slot:body="props">
          <q-tr :props="props">
              <q-td key="fantasy_name" :props="props" class="q-pa-none q-ma-none">
                  {{ props.row.fantasy_name }}
              </q-td>

              <q-td key="social_reason" :props="props" class="q-pa-none q-ma-none">
                  {{ props.row.social_reason }}
              </q-td>
              <q-td key="cnpj" :props="props" class="q-pa-none q-ma-none">
                  {{ props.row.cnpj }}
              </q-td>

              <q-td key="phone" :props="props" class="q-pa-none q-ma-none">
                {{ props.row.phone }}
              </q-td>

              <q-td key="decription" :props="props" class="q-pa-none q-ma-none">
                {{ props.row.decription }}
              </q-td>

              <q-td key="created_at" :props="props" class="q-pa-none q-ma-none">
                {{ props.row.created_at.substr(0,10) }}
              </q-td>

              <q-td key="actions" :props="props" class="q-pa-none q-ma-none">
                <div style="margin-left:-3px">
                  <q-icon color="primary" size="sm" class="pointer-hover q-mr-sm" title="Ver/Editar questionário" name="account_balance_wallet" @click="editCompany(props.row)" />
                  <q-icon color="red" size="sm" class="pointer-hover" name="delete" title="Eliminar questionário" @click.prevent="deleteCompany(props.row)"/>
                </div>
              </q-td>

          </q-tr>
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
    </div>
  </div>
</template>

<script>
import axios from 'axios'
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
  name: 'TableCompanies',

  props: {
    companies: null
  },

  components: {
  },

  data () {
    return {
      action: '',
      companyItem: null,

      data: [],
      columns: [
        {
          label: 'Nome fantasia',
          field: 'fantasy_name',
          name: 'fantasy_name',
          required: true,
          align: 'left',
          format: val => `${val}`,
          sortable: true
        },
        {
          label: 'Razão social',
          field: 'social_reason',
          name: 'social_reason',
          align: 'center'
        },
        {
          label: 'CNPJ',
          field: 'cnpj',
          name: 'cnpj',
          align: 'center'
        },
        {
          label: 'Telefone',
          field: 'phone',
          name: 'phone',
          align: 'center'
        },
        {
          label: 'Descrição',
          field: 'decription',
          name: 'decription',
          align: 'center'
        },
        {
          label: 'Criação',
          field: 'created_at',
          name: 'created_at',
          align: 'center',
          sortable: true
        },
        // {
        //   label: 'Páginas',
        //   field: 'pages',
        //   name: 'pages',
        //   sortable: true,
        //   sort: (a, b) => parseInt(a, 10) - parseInt(b, 10),
        //   align: 'center'
        // },
        {
          label: 'Ações',
          field: 'actions',
          name: 'actions',
          align: 'center'
        }
      ],
      filter: '',
      loading: false,
      page: 0,
      lastPage: 0,
      pagination: {
        rowsPerPage: 0
        // prevPage: this.getCompanies(this.page - 1),
        // nextPage: this.getCompanies(this.page + 1)
      }
    }
  },

  methods: {
    getCompanies (page) {
      this.loading = true
      axios.get('web/' + 'companies', {
        'filter': this.filter,
        'page': page
      })
        .then(response => {
          this.data = response.data.companies
          if (response.data.total % process.env.MIX_APP_PAGE_LENGTH > 0) {
            this.lastPage = parseInt(response.data.total / process.env.MIX_APP_PAGE_LENGTH)
          } else {
            this.lastPage = parseInt(response.data.total / process.env.MIX_APP_PAGE_LENGTH) - 1
          }
        })
        .catch(errors => {
        })
        .then(() => {
          this.loading = false
        })
    },

    editCompany () {
    },

    deleteCompany () {
    },

    reloadCompanies () {
    },

    showSelectedCompany (company) {
      this.action = 'edit'
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
      const status = exportFile(
        'table-export.csv',
        content,
        'text/csv'
      )
      if (status !== true) {
        this.$q.notify({
          message: 'Browser denied file download...',
          color: 'negative',
          icon: 'warning'
        })
      }
    }

  },

  beforeMount () {
    this.getCompanies()
  }
}
</script>

<style type="text/stylus" scoped>
  .pointer-hover:hover{
    cursor: pointer;
  }
</style>
