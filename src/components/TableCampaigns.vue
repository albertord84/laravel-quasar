<template>
  <div class="row justify-left">
    <div style="width:100%">
      <q-table title=" " :data="data" :columns="columns" row-key="id" binary-state-sort :card-container-style="{ backgroundColor: '#ff0000' }" >
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
                  <q-icon color="primary" size="sm" class="pointer-hover q-mr-sm" title="Ver/Editar" name="account_balance_wallet" @click="showSelectedQuestionary(props.row)" />
                  <q-icon color="red" size="sm" class="pointer-hover" name="delete" title="Eliminar"/>
                </div>
              </q-td>

          </q-tr>
        </template>
      </q-table>
    </div>
  </div>
</template>

<script>
export default {
  name: 'TableCompanies',

  props: {
    campaigns: null
  },

  components: {
  },

  data () {
    return {
      action: '',
      campaignItem: null,

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

      data: []
    }
  },

  methods: {

  },

  beforeMount () {
    this.data = this.campaigns
  }
}
</script>

<style type="text/stylus" scoped>
  .pointer-hover:hover{
    cursor: pointer;
  }
</style>
