<template>
    <q-page class="bg-gray q-py-md">
      <div class="q-ml-sm q-mb-sm">
        <h6 class="q-mb-none gt-sm">Questionários</h6>
        <p class="q-mt-xl q-mb-none lt-md">Questionários</p>
      </div>
      <q-card no-bordered flat class="q-mt-none gt-sm">
        <q-tab-panels value="questionaries">
          <q-tab-panel name="questionaries" class="q-pa-none">
            <TableQuestionaries  :questionaries="allQuestionaries" @edit="editQuestionary" @delete="deleteQuestionary" @reload="reloadQuestionaries" ></TableQuestionaries>
          </q-tab-panel>
        </q-tab-panels>
      </q-card>

      <q-scroll-area :thumb-style="thumbStyle" :content-style="contentStyle"  :content-active-style="contentActiveStyle" style="max-width: 100%;" class="fill-window lt-md">
        <div  v-for="(questionary, index) in allQuestionaries" :key="index">
          <q-item bordered clickable class="q-py-md" style="border-bottom:solid 1px #f5f5f5" @click.prevent="">
            <q-item-section top avatar class="text-center">
              <q-avatar color="primary" text-color="white" square icon="block" />
              <span style="font-size:0.55rem">Respondido</span>
            </q-item-section>
            <q-item-section>
              <q-item-label>{{questionary.name}}</q-item-label>
              <q-item-label caption>Potenciado por: Johnson & Johnson</q-item-label>
              <!-- <q-item-label caption>{{questionary.description.substr(0,88)}}...</q-item-label> -->
            </q-item-section>
          </q-item>
        </div>
      </q-scroll-area>
    </q-page>
</template>

<script>
// import axios from 'axios'
import axios from 'axios'
// import { WebService } from '../../../services/WebService'

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

export default {
  name: 'Questionaries',

  components: {
    'TableQuestionaries': require('../../../components/TableQuestionaries.vue').default
  },

  data () {
    return {
      loader: false,
      questionniaresUrl: 'questionnaires',
      questionaryItem: null,
      allQuestionaries: [],

      thumbStyle: {
        right: '4px',
        borderRadius: '5px',
        backgroundColor: '#027be3',
        width: '5px',
        opacity: 0.75
      },
      contentStyle: {
        right: '4px',
        borderRadius: '5px',
        backgroundColor: '#027be3',
        width: '5px',
        opacity: 0.75
      },
      contentActiveStyle: {
        right: '4px',
        borderRadius: '5px',
        backgroundColor: '#027be3',
        width: '5px',
        opacity: 0.75
      }
    }
  },

  methods: {
    getQuestionaries () {
      this.action = 'edit'
      this.plane = this.getPlaneObjectById(questionaryItem.plane_id)
      this.tab = 'questionaries'

      this.allQuestionaries = []
      this.allQuestionaries.push(Object.assign({}, questionaryItem))
      this.allQuestionaries.push(Object.assign({}, questionaryItem))
      this.allQuestionaries.push(Object.assign({}, questionaryItem))
      this.allQuestionaries.push(Object.assign({}, questionaryItem))
      this.allQuestionaries.push(Object.assign({}, questionaryItem))
      this.allQuestionaries.push(Object.assign({}, questionaryItem))
      this.allQuestionaries.push(Object.assign({}, questionaryItem))
      this.allQuestionaries.push(Object.assign({}, questionaryItem))
      this.allQuestionaries.push(Object.assign({}, questionaryItem))

      this.loader = true
      axios.get('web/' + this.questionniaresUrl)
      // WebService.get(this.questionniaresUrl)
        .then(response => {
          console.log('wwwwwwwwwwwwwwwwwwwwwwwwww JR')
          console.log(response.data)
        })
        .catch(errors => {
          // let errArray = master.hasErrors(errors)
          // if (errArray) {
          //   master.setErrors(this.$refs.observer, errArray)
          // }
        })
        .then(() => {
          this.loader = false
        })
    },

    selectedPlane (plane) {
      this.initialPlane = plane
      this.plane = plane
      this.showSelectPlane = false
      this.showCrudQuestionary = true
    },

    restartPlaneCriation () {
      this.initialPlane.code = 0
      this.plane = []
      this.showSelectPlane = true
      this.showCrudQuestionary = false
    },

    changePlane () {
      this.showSelectPlane = true
      this.showCrudQuestionary = false
    },

    getPlaneObjectById (planeId) {
      var planes = [
        { 'code': 1, 'name': 'Starter' },
        { 'code': 2, 'name': 'Ideal' },
        { 'code': 3, 'name': 'Premium' }
      ]
      return planes[planeId - 1]
    },

    editQuestionary () {

    },

    deleteQuestionary () {

    },

    reloadQuestionaries () {

    }

  },

  watch: {
  },

  computed: {
  },

  beforeMount () {
    this.getQuestionaries()
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
      title: 'Questionários'
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
    .fill-window{
      height:calc(100vh - 140px)
    }

    @media screen and (max-width: 600px) {
    .fill-window{
      height:calc(100vh - 200px)
    }
  }
</style>
