<template>
  <div class="row justify-left">
    <div v-if="tab === 'allQuestionnaires'" style="width:100%">
      <q-table title=" " :data="data" :columns="columns" row-key="name" binary-state-sort :card-container-style="{ backgroundColor: '#ff0000'}" >
        <template v-slot:body="props">
          <q-tr :props="props">
              <q-td key="questionayName" :props="props" class="q-pa-none q-ma-none">
                  {{ props.row.name }}
              </q-td>

              <q-td key="pages" :props="props" class="q-pa-none q-ma-none">
                {{ props.row.pages.length }}
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
                <div style="margin-left:-3px">
                  <q-icon color="primary" size="sm" class="pointer-hover q-mr-sm" title="Ver/Editar questionário" name="account_balance_wallet" @click="showSelectedQuestionary(props.row)" />
                  <q-icon color="red" size="sm" class="pointer-hover" name="delete" title="Eliminar questionário"/>
                </div>
              </q-td>

          </q-tr>
        </template>
      </q-table>
    </div>
    <div v-else-if="tab === 'selectedQuestionary'">
      <CrudQuestionary :action="action" :plane="plane" :questionaryItem="questionaryItem" @onchangeplane="changePlane"></CrudQuestionary>
    </div>
  </div>
</template>

<script>
export default {
  name: 'TableQuestionnaires',

  props: {
    questionnaires: null
  },

  components: {
    'CrudQuestionary': require('./CrudQuestionary.vue').default
  },

  data () {
    return {
      tab: 'allQuestionnaires',
      action: '',
      questionaryItem: null,

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
          label: 'Páginas',
          field: 'pages',
          name: 'pages',
          sortable: true,
          sort: (a, b) => parseInt(a, 10) - parseInt(b, 10),
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

      data: []

    }
  },

  methods: {
    showSelectedQuestionary (questionary) {
      this.action = 'edit'
      this.plane = this.getPlaneObjectById(questionary.plane_id)
      this.questionaryItem = Object.assign({}, questionary)
      this.tab = 'selectedQuestionary'
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
    this.data = this.questionnaires
  }
}
</script>

<style type="text/stylus" scoped>
  .pointer-hover:hover{
    cursor: pointer;
  }
</style>
