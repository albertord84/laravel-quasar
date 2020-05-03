<template>
  <div class="row justify-left">
    <div style="width:100%">
      <q-table title=" " :data="data" :columns="columns" row-key="id" binary-state-sort :card-container-style="{ backgroundColor: '#ff0000' }" >
        <template v-slot:body="props">
          <q-tr :props="props">
              <q-td key="email" :props="props" class="q-pa-none q-ma-none">
                {{ props.row.email }}
              </q-td>

              <q-td key="status_id" :props="props" class="q-pa-none q-ma-none">
                  {{ props.row.status_id }}
              </q-td>

              <q-td key="company_id" :props="props" class="q-pa-none q-ma-none">
                  {{ props.row.company_id }}
              </q-td>

              <q-td key="cost_center_id" :props="props" class="q-pa-none q-ma-none">
                  {{ props.row.cost_center_id }}
              </q-td>

              <q-td key="address_id" :props="props" class="q-pa-none q-ma-none">
                  {{ props.row.address_id }}
              </q-td>

              <q-td key="role_id" :props="props" class="q-pa-none q-ma-none">
                  {{ props.row.role_id }}
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
    users: null
  },

  components: {
  },

  data () {
    return {
      action: '',
      userItem: null,

      columns: [
        {
          label: 'Email',
          field: 'email',
          name: 'email',
          required: true,
          align: 'left',
          format: val => `${val}`,
          sortable: true
        },
        {
          label: 'Estatus',
          field: 'status_id',
          name: 'status_id',
          align: 'center'
        },
        {
          label: 'Empresa',
          field: 'company_id',
          name: 'company_id',
          align: 'center'
        },
        {
          label: 'Centro Custo',
          field: 'cost_center_id',
          name: 'cost_center_id',
          align: 'center'
        },
        {
          label: 'Endereço',
          field: 'address_id',
          name: 'address_id',
          align: 'center'
        },
        {
          label: 'Role',
          field: 'role_id',
          name: 'role_id',
          align: 'center'
        },
        {
          label: 'Criação',
          field: 'created_at',
          name: 'created_at',
          align: 'center'
        },
        // {
        //   label: 'Atualização',
        //   field: 'updated_at',
        //   name: 'updated_at',
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

      data: []
    }
  },

  methods: {

  },

  beforeMount () {
    console.log(this.users)
    this.data = this.users
  }
}
</script>

<style type="text/stylus" scoped>
  .pointer-hover:hover{
    cursor: pointer;
  }
</style>
