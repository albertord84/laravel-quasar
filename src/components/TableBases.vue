<template>
  <div class="row justify-left">
    <div style="width:100%">
      <q-table title=" " :data="data" :columns="columns" row-key="id" binary-state-sort :card-container-style="{ backgroundColor: '#ff0000' }" >
        <template v-slot:body="props">
          <q-tr :props="props">
              <q-td key="origin_id" :props="props" class="q-pa-none q-ma-none">
                  {{ props.row.origin_id }}
              </q-td>

              <q-td key="company_id" :props="props" class="q-pa-none q-ma-none">
                  {{ props.row.company_id }}
              </q-td>

              <q-td key="criator_id" :props="props" class="q-pa-none q-ma-none">
                  {{ props.row.criator_id }}
              </q-td>

              <q-td key="name" :props="props" class="q-pa-none q-ma-none">
                {{ props.row.name }}
              </q-td>

              <q-td key="decription" :props="props" class="q-pa-none q-ma-none">
                {{ props.row.decription }}
              </q-td>

              <q-td key="created_at" :props="props" class="q-pa-none q-ma-none">
                {{ props.row.created_at.substr(0,10) }}
              </q-td>

              <q-td key="actions" :props="props" class="q-pa-none q-ma-none">
                <div style="margin-left:-3px">
                  <q-icon color="primary" size="sm" class="pointer-hover q-mr-sm" title="Ver/Editar questionário" name="account_balance_wallet" @click="showSelectedQuestionary(props.row)" />
                  <q-icon color="red" size="sm" class="pointer-hover" name="delete" title="Eliminar questionário"/>
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
    bases: null
  },

  components: {
  },

  data () {
    return {
      action: '',
      companyItem: null,

      columns: [
        {
          label: 'Origem',
          field: 'origin_id',
          name: 'origin_id',
          required: true,
          align: 'left',
          format: val => `${val}`,
          sortable: true
        },
        {
          label: 'Empresa',
          field: 'company_id',
          name: 'company_id',
          align: 'center'
        },
        {
          label: 'Criador',
          field: 'criator_id',
          name: 'criator_id',
          align: 'center'
        },
        {
          label: 'Nome',
          field: 'name',
          name: 'name',
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
          align: 'center'
        },
        {
          label: 'Ações',
          field: 'actions',
          name: 'actions',
          align: 'center'
        }
      ],

      data: [
      ]
    }
  },

  methods: {
    showSelectedQuestionary (questionary) {
      this.action = 'edit'
      this.plane = this.getPlaneObjectById(questionary.plane_id)
      this.companyItem = Object.assign({}, questionary)
    },

    getPlaneObjectById (planeId) {
      var planes = [
        { 'code': 1, 'name': 'Starter' },
        { 'code': 2, 'name': 'Ideal' },
        { 'code': 3, 'name': 'Premium' }
      ]
      return planes[planeId - 1]
    }
  },

  beforeMount () {
    this.data = this.bases
  }
}
</script>

<style type="text/stylus" scoped>
  .pointer-hover:hover{
    cursor: pointer;
  }
</style>
