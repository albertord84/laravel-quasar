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
            <q-input  v-model="filter" label-color="orange-8" color="orange-8" placeholder="Buscar ...">
              <!-- <template v-slot:append >
                <q-icon name="search" class="pointer-hover" @click.prevent="filterCampaigns"/>
              </template> -->
            </q-input>
          </div>

          <div class="col-4 text-center">
            <q-btn flat dense class="q-ml-lg" icon-right="navigate_before"  title="Página anterior" no-caps @click="getCampaigns(page-1)" :disable="page==0"/>
            <q-btn flat dense class="q-px-sm "  title="Página atual" no-caps>
              <span v-if="!isLoading" color="orange">{{page+1}}</span>
              <q-spinner-pie v-if="isLoading" color="orange" />
            </q-btn>
            <q-btn flat dense icon-right="navigate_next"  title="Página seguinte" no-caps @click="getCampaigns(page+1)" :disable="!hasMorePage"/>
          </div>

          <div class="col-4 text-right">
            <q-btn color="orange-8" icon-right="archive" label="Exportar" title="Exportar para CSV" no-caps @click="exportTable"/>
          </div>
        </template>

        <template v-slot:body="props">
          <q-tr :props="props">
              <q-td key="name" :props="props" class="q-pa-none q-ma-none">
                  {{ props.row.name }}
              </q-td>

              <q-td key="response_limit" :props="props" class="q-pa-none q-ma-none">
                  <span title="Quantidade"> {{ props.row.response_amount }} / </span>
                  <span title="Limite"> {{ props.row.response_limit }} </span>
              </q-td>

              <q-td key="invitations_sent" :props="props" class="q-pa-none q-ma-none">
                <span title="Aceitos" style="color:green !important"> {{ props.row.invitations_accepted }}</span> /
                <span title="Rejeitados" style="color:red !important"> {{ props.row.invitations_declined }}</span> /
                <span title="Enviados" > {{ props.row.invitations_sent }}</span>
              </q-td>

              <q-td key="requested_date" :props="props" class="q-pa-none q-ma-none">
                {{ props.row.requested_date.substr(0,10) }}
              </q-td>

              <q-td key="analyzed_date" :props="props" class="q-pa-none q-ma-none">
                {{ props.row.analyzed_date.substr(0,10) }}
              </q-td>

              <q-td key="start_date" :props="props" class="q-pa-none q-ma-none">
                {{ props.row.start_date.substr(0,10) }}
              </q-td>

              <q-td key="end_date" :props="props" class="q-pa-none q-ma-none">
                {{ props.row.end_date.substr(0,10) }}
              </q-td>

              <q-td key="created_at" :props="props" class="q-pa-none q-ma-none">
                {{ props.row.created_at.substr(0,10) }}
              </q-td>

              <q-td key="actions" :props="props" class="q-pa-none q-ma-none">
                <div style="margin-left:-3px">
                  <q-icon color="primary" size="sm" class="pointer-hover q-mr-sm" title="Ver/Editar" name="account_balance_wallet" @click="editCampaign(props.row)" />
                  <q-icon color="red" size="sm" class="pointer-hover" name="delete" title="Eliminar" @click="confirmDeleteCampaign(props.row)"/>
                </div>
              </q-td>
          </q-tr>
        </template>

        <template v-slot:bottom>
          <div class="col-12 text-center q-mt-md">
            <q-btn flat dense class="q-ml-lg" icon-right="navigate_before"  title="Página anterior" no-caps @click="getCampaigns(page-1)" :disable="page==0"/>
            <q-btn flat dense class="q-px-sm "  title="Página atual" no-caps>
              {{page+1}}
            </q-btn>
            <q-btn flat dense icon-right="navigate_next"  title="Página seguinte" no-caps @click="getCampaigns(page+1)" :disable="!hasMorePage"/>
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
            <span v-if="campaign" class="q-ml-sm">Confirma que deseja eliminar a campanha"{{campaign.name}}"?</span>
          </q-card-section>

          <q-card-section v-show="isDeleting" class="text-center">
            <q-spinner-ios color="orange-8" size="1.9rem" />
          </q-card-section>

          <q-card-actions align="right">
            <q-btn flat label="Eliminar" color="primary" @click.prevent="deleteCampaign">
            </q-btn>
            <q-btn flat label="Cancelar" color="primary" v-close-popup />
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
  name: 'TableCamapigns',

  props: {
  },

  components: {
  },

  data () {
    return {
      action: '',
      campaign: null,
      data: [],
      columns: [
        {
          label: 'Nome',
          field: 'name',
          name: 'name',
          required: true,
          align: 'left',
          format: val => `${val}`,
          sortable: true
        },
        {
          label: 'Respostas',
          field: 'response_limit',
          name: 'response_limit',
          align: 'center'
        },
        {
          label: 'Convites',
          field: 'invitations_sent',
          name: 'invitations_sent',
          align: 'center'
        },
        {
          label: 'Solicitado',
          field: 'requested_date',
          name: 'requested_date',
          align: 'center'
        },
        {
          label: 'Analizado',
          field: 'analyzed_date',
          name: 'analyzed_date',
          align: 'center'
        },
        {
          label: 'Início',
          field: 'start_date',
          name: 'start_date',
          align: 'center'
        },
        {
          label: 'Fim',
          field: 'end_date',
          name: 'end_date',
          align: 'center'
        },

        {
          label: 'Criado',
          field: 'created_at',
          name: 'created_at',
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
      isDeleting: false
    }
  },

  methods: {
    getCampaigns (page) {
      this.isLoading = true
      WebService.get('web/' + 'campaigns', {
        'filter': this.filter,
        'page': page
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

    filterCampaigns () {
      if (this.filter.trim().length) {
        this.getCampaigns(0)
      }
    },

    editCampaign (campaign) {
      this.$emit('editCampaign', campaign)
    },

    deleteCampaign () {
      if (this.campaign) {
        this.isDeleting = true
        WebService.delete('web/' + 'campaigns/' + this.campaign.id)
          .then(response => {
            this.modalConfirmDelete = false
            this.$q.notify({ type: 'positive', message: `Campanha eliminada com sucesso.`, position: 'top-right' })
            this.getCampaigns(this.page)
          })
          .catch(errors => {
          })
          .then(() => {
            this.isDeleting = false
          })
      }
    },

    confirmDeleteCampaign (campaign) {
      this.campaign = campaign
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

  watch: {
    filter (value) {
      this.getCampaigns(0)
    }
  },

  beforeMount () {
    this.getCampaigns(0)
  }
}
</script>

<style type="text/stylus" scoped>
  .pointer-hover:hover{
    cursor: pointer;
  }
</style>
