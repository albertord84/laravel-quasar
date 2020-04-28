<template>
    <q-page class="bg-gray q-pa-md">
      <div class="flex justify-between">
        <h6>Campanhas</h6>
        <!-- <q-btn flat rounded class="q-pa-xs  q-my-lg" color="primary" icon="help"/> -->
      </div>

      <q-card no-bordered flat>
        <q-tabs v-model="tab" dense class="text-grey" active-color="orange-10" indicator-color="orange-10" align="left" caps inline-label>
            <q-tab name="campaigns" class="text-dark" @click="1"  icon="horizontal_split"  label="Campanhas" />
            <q-tab name="crudCampaigns" class="text-dark" icon="add" label="Nova campanha" />
        </q-tabs>

        <q-separator/>

        <q-tab-panels v-model="tab" animated>
            <q-tab-panel name="campaigns" class="q-pa-none">
              <TableCampaigns :campaigns="allCampaigns" @edit="editCampaign" @delete="deleteCampaign" @reload="reloadCampaigns" ></TableCampaigns>
            </q-tab-panel>

            <q-tab-panel name="crudCampaigns">
              <CrudCampaigns :action="'insert'" :campaignItem="{}"></CrudCampaigns>
            </q-tab-panel>
        </q-tab-panels>
      </q-card>
    </q-page>
</template>

<script>

const questionaryItem = {
  plane_id: 3,
  criator_id: 1,
  updater_id: 2,
  created_at: '2020-01-08 13:10:58',
  updated_at: '2020-01-04 10:51:58',
  name: 'Impato do coronavírus na economia',
  description: 'Questionario para avaliar o posível impato do coronavirus na economia mundial dirigido a insestidores e economistas do mercado Forex',
  observation: 'Esse questionário deve ser aplicado em quatro campanhas diferentes para avaliar as mudanças nas respostas dos targets',
  released: 0,
  pages: [
    { 'id': 1,
      'type_id': 1, // Boolean
      'question': 'Você já ouviu falar do coronavirus?',
      'json_data': null,
      'responseOptions': []
    },
    { 'id': 2,
      'type_id': 1, // Boolean
      'question': 'O coranavirus contagia somente animais?',
      'json_data': null,
      'responseOptions': []
    },
    { 'id': 3,
      'type_id': 2, // Unique selection
      'question': 'Selecione a opção correta relacionada com a organização biológica do coronavirus',
      'json_data': null,
      'responseOptions': [
        { 'id': 1, 'question_id': 3, 'response': 'Coronavirus é uma molécula', 'is_truth': false },
        { 'id': 2, 'question_id': 3, 'response': 'Coronavirus é uma bactéria', 'is_truth': false },
        { 'id': 2, 'question_id': 3, 'response': 'Coronavirus é uma gripezinha', 'is_truth': false },
        { 'id': 3, 'question_id': 3, 'response': 'Coronavirus é um virus', 'is_truth': true },
        { 'id': 4, 'question_id': 3, 'response': 'Coronavirus é um organismo pluricelular', 'is_truth': false }
      ]
    },
    { 'id': 4,
      'type_id': 3, // Multiple selection
      'question': 'Selecione as opções corretas sobre o impato do coronavirus',
      'json_data': '',
      'responseOptions': [
        { 'id': 5, 'question_id': 4, 'response': 'Coronavirus somente contagia idosos', 'is_truth': false },
        { 'id': 6, 'question_id': 4, 'response': 'Coronavirus é uma pandemia de alta prioridade somente para China', 'is_truth': false },
        { 'id': 7, 'question_id': 4, 'response': 'Coronavirus é uma preocupação para todos os países do mundo', 'is_truth': true },
        { 'id': 8, 'question_id': 4, 'response': 'Coronavirus vai provocar uma grande recessão económica mundial', 'is_truth': true },
        { 'id': 9, 'question_id': 4, 'response': 'Coronavirus somente afeta a países desenvolvidos', 'is_truth': false }
      ]
    },
    { 'id': 5,
      'type_id': 2, // Scale selection
      'question': 'Analise a seguinte imagem e escolha a opção que você acha que representa',
      'json_data': {
        'type': 'image', // dummy field constructed in frontend side
        'ClientOriginalExtension': 'jpg',
        'src': 'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcS3Ko2lxKDMsaiySiQlZO_iopwktOlDrVB3574DS44SLLcGqBRV'
      },
      'responseOptions': [
        { 'id': 10, 'question_id': 5, 'response': 'Uma molécula de agua', 'is_truth': false },
        { 'id': 11, 'question_id': 5, 'response': 'Um eletron', 'is_truth': false },
        { 'id': 12, 'question_id': 5, 'response': 'Uma gripezinha', 'is_truth': false },
        { 'id': 13, 'question_id': 5, 'response': 'O Coronavirus', 'is_truth': true },
        { 'id': 14, 'question_id': 5, 'response': 'Um sorvete com cabelo black', 'is_truth': false }
      ]
    },
    { 'id': 6,
      'type_id': 4, //  response
      'question': 'Avalie do 1 até o 10 a atitude dos governadores estaduais brasileiro enquanto a medida de isolamento social adotadas para prevenir a expensão do coronavirus, onde 1 é RUIM e 10 é ECXELENTE',
      'json_data': null,
      'responseOptions': [
        { 'id': 15, 'question_id': 6, 'response': '1', 'is_truth': true }, // inferior limit
        { 'id': 16, 'question_id': 6, 'response': '10', 'is_truth': true } // superior limit
      ]
      // response to question will be in Responses table
    },
    { 'id': 7,
      'type_id': 5, // Scale selection
      'question': 'Analise o seguinte video e discurse sobre o que você entendeu',
      'json_data': {
        'type': 'video', // dummy field constructed in frontend side
        'ClientOriginalExtension': 'mp4',
        'src': 'https://www.youtube.com/watch?v=hfkDdD_rFj8'
      },
      'responseOptions': null
    }
  ]
}

const campaignItem = {
  id: 1,
  status_id: 1,
  criator_id: 1,
  updater_id: 1,
  questionary_id: 1,
  base_id: 1,
  name: 'Influência do coronavirus',
  objetive: '',
  description: '',
  observation: '',
  response_limit: 50,
  response_amount: 23,
  invitations_sent: 100,
  invitations_accepted: 80,
  invitations_declined: 13,
  requested_date: '2020-10-10 10:10',
  analyzed_date: '2020-10-10 10:10',
  start_date: '2020-10-20 10:10',
  end_date: '2020-10-25 10:10',
  created_at: '2020-10-10 10:10',
  updated_at: '2020-10-10 10:10',

  questionaries: [
    questionaryItem
  ]
}

export default {
  name: 'Questionaries',

  components: {
    'CrudCampaigns': require('../../../components/CrudCampaigns.vue').default,
    'TableCampaigns': require('../../../components/TableCampaigns.vue').default
  },

  data () {
    return {
      tab: 'questionaries',
      showCrudCampaign: false,

      campaignModel: null,
      allCampaigns: [],

      loader: false
    }
  },

  methods: {

    getCampaigns () {
      this.tab = 'campaigns'
      this.allCampaigns = []
      this.allCampaigns.push(Object.assign({}, campaignItem))
      this.allCampaigns.push(Object.assign({}, campaignItem))
      this.allCampaigns.push(Object.assign({}, campaignItem))

      // this.loader = true
      // ApiService.login(this.form)
      // .then(response => {
      //   this.storeToken(response)
      //   this.setAuthStatus(true)
      //   this.setUserData(_.get(response, ['data', 'user_data'], {}))
      //   let redirect = _.get(this.$route, ['query', 'redirect'])
      //   if (redirect) {
      //     this.$router.replace(redirect)
      //   } else {
      //     this.$router.replace({ name: 'auth.user' })
      //   }
      // })
      // .catch(errors => {
      //   let errArray = master.hasErrors(errors)
      //   if (errArray) {
      //     master.setErrors(this.$refs.observer, errArray)
      //   }
      // })
      // .then(() => {
      //   this.loader = false
      // })
    },

    editCampaign () {
    },

    deleteCampaign () {
    },

    reloadCampaigns () {
    }
  },

  watch: {
  },

  computed: {
  },

  beforeMount () {
    this.showCrudCampaign = false
    this.getCampaigns()
  },

  created () {
  },

  destroyed () {
  },

  beforeRouteEnter (to, from, next) {
    next(vm => {
      if (vm.isAuth) {
        vm.$router.replace({ name: 'public.index' })
      }
    })
  },

  meta () {
    return {
      title: 'Campanhas'
      // title: this.$t('page_titles.login_title')
    }
  }

}
</script>

<style type="text/stylus" scoped>
    .image-background {
      background-image: url('../../../assets/custom/login-background.jpg');
    }
    .login-form {
      width: 350px;
    }
    .page-background{
      background-color: #f5f5f5;
    }
    .m-text-muted{
      color:#6c757d
    }
    .my-p{
      padding: 1.2em;
    }
    .my-p2{
      padding: 0.6em;
    }
</style>
