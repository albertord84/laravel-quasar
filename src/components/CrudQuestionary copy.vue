<template>
  <div class="row justify-left">
      <q-banner class="bg-cyan-2  flex justify-between">
        Plano <b>{{plane.name}}</b> selecionado.
        <q-btn flat color="primary" label="Trocar plano" @click.prevent="changePlane"/>
      </q-banner>
      <div class="col-12 q-mt-lg">
        <b>Título do questionário</b>
        <q-input filled square v-model="questionary.name" label-color="orange-8" color="orange-8" class="col-12 q-mt-sm"/>
      </div>
      <div class="col-12 q-mt-lg">
        <b>Introdução/Descrição</b>
        <q-input filled square autogrow v-model="questionary.description" label-color="orange-8" color="orange-8" class="col-12 q-mt-sm"/>
      </div>
      <div class="col-12 flex q-mt-xl justify-between">
          <span class="q-mt-sm" style="font-size:1.2rem">Páginas</span>
          <q-btn text-color="blue" class="q-pa-sm q-mb-sm" flat dense round title="Adicionar questão" icon="note_add"/>
      </div>
      <q-separator  class="col-12 q-pa-none q-ma-none"></q-separator>

      <div class="col-xs-12 col-sm-5 col-md-4 col-lg-4 col-md-3 q-mt-lg">
          <q-list bordered  style="max-width: 290px">
              <q-item clickable class="bg-orange-8" v-ripple @click="showPageQuestion=!showPageQuestion">
                <q-item-section><b style="font-size:1rem">Páginas</b></q-item-section>
                <q-item-section avatar>
                  <i :class="[ {'fas fa-chevron-up': showPageQuestion ===true}, {'fas fa-chevron-down': showPageQuestion === false} ]"></i>
                </q-item-section>
              </q-item>

              <div v-show="showPageQuestion">
                <q-item v-for="(question,index) in questionary.questions" clickable v-ripple v-bind:key="index" @click.prevent="showQuestion(index)">
                  <q-item-section><span style="font-size:1.2rem">{{'Página'}}</span></q-item-section>
                  <q-item-section avatar>
                    <q-avatar text-color="dark">{{index+1}}</q-avatar>
                  </q-item-section>
                </q-item>
              </div>
          </q-list>
      </div>

      <div class="col-xs-12 col-sm-7 col-md-8 col-lg-8 col-md-5 q-mt-lg">
          <div v-if="questionary.questions && questionary.questions.length>0">
              <q-separator  class="col-12 q-ma-none" style="padding-top:2px"  color="orange-8"/>

              <div class="q-py-md q-pl-md"><b>Página {{selectedPageQuestion+1}}</b></div>

              <div class="q-py-md q-pl-md">
                <q-card flat>
                    <q-tabs v-model="tab" dense class="text-grey" align="left" active-bg-color="grey-5" indicator-color="grey-5" no-caps inline-label>
                      <q-tab name="content" class="text-dark" icon="horizontal_split" label="Conteúdo" />
                      <q-tab name="condition" class="text-dark" icon="add" label="Condição" />
                    </q-tabs>

                    <q-tab-panels v-model="tab" animated>
                      <q-tab-panel name="content" class="q-pa-none">
                        <div v-if="selectedPageQuestion>-1">
                            <div class="q-pt-md">
                              <!-- <span v-if="questionary.questions[selectedPageQuestion].type_id===1">Basico</span> -->
                              <span style="font-size:1.2rem" v-if="questionary.questions[selectedPageQuestion].type_id===2">Imagen</span>
                              <span style="font-size:1.2rem" v-if="questionary.questions[selectedPageQuestion].type_id===3">Video</span>
                            </div>

                            <div v-if="questionary.questions[selectedPageQuestion].type_id>1" class="q-pa-md bg-grey-3">
                                <div class="q-col-gutter-md row items-start" v-if="questionary.questions[selectedPageQuestion].type_id===2">
                                    <div class="col-7 justify-center" v-bind:key="index">
                                        <q-img  :src="questionary.questions[selectedPageQuestion].json_data" :ratio="16/9"/>
                                    </div>
                                </div>
                                <div class="q-col-gutter-md row items-start" v-if="questionary.questions[selectedPageQuestion].type_id===3">
                                    <div class="col-7 justify-center" v-bind:key="index">
                                        <q-video :ratio="16/9" src="https://www.youtube.com/embed/k3_tw44QsZQ?rel=0"/> <!-- :src="questionary.questions[selectedPageQuestion].json_data" -->
                                    </div>
                                </div>
                            </div>

                            <q-separator color="orange-8" style="padding-top:2px" class="q-mt-lg"/>

                            <div class="q-mt-xs">
                              <span style="font-size:1.2rem">Pergunta</span>
                            </div>

                            <div class="q-pt-md q-pl-lg">
                              <b>Pergunta</b>
                              <q-input filled square v-model="questionary.name" label-color="orange-8" color="orange-8" class="col-12 q-mt-sm"/>
                            </div>

                            <div class="q-pt-md q-pl-lg">
                              <b>Tipo de resposta</b>
                              <q-select filled square v-model="newQuestion.response_type_id" :options="questionOptions" label-color="orange-8" color="orange-8" label=" " />
                            </div>

                            <div class="q-pt-md q-pl-lg">
                              <b>Opções de resposta</b>
                              <q-select filled square v-model="newQuestion.response_type_id" :options="questionOptions" label-color="orange-8" color="orange-8" label=" " />
                            </div>

                        </div>
                      </q-tab-panel>

                      <q-tab-panel name="condition" class="q-pa-none">
                        <div class="text-h6">Condição</div>
                          Lorem ipsum dolor sit amet consectetur adipisicing elit. <br>
                          Lorem ipsum dolor sit amet consectetur adipisicing elit. <br>
                          Lorem ipsum dolor sit amet consectetur adipisicing elit. <br>
                          Lorem ipsum dolor sit amet consectetur adipisicing elit. <br>
                          Lorem ipsum dolor sit amet consectetur adipisicing elit. <br>
                      </q-tab-panel>
                    </q-tab-panels>
                </q-card>
              </div>
          </div>
      </div>

  </div>
</template>

<script>

export default {
  name: 'CrudQuestionary',

  props: {
    // plane: {
    //   type: Array,
    //   default: function (e) {
    //     console.log('22222222222222222222222222222222222222')
    //     console.log(e)
    //     return [{
    //       'plane': 1,
    //       'planeName': 'Starter'
    //     }]
    //   }
    // }
    plane: null
  },

  data () {
    return {
      questionary: {
        plane_id: 0,
        criator_id: 0, // userLoggued.id
        updater_id: 0, // userLoggued.id
        name: '',
        description: '',
        observation: '',
        released: 0,
        questions: null
      },

      questionOptions: [
        'Resposta com seleção Sim - Não',
        'Resposta com seleção única',
        'Resposta com múltipla escolha',
        'Resposta em escala',
        'Resposta em texto livre'
      ],
      newQuestion: {
        'id': 1,
        'type_id': 1,
        'response_type_id': 1,
        'question': '',
        'json_data': null
      },

      selectedPageQuestion: -1,
      showPageQuestion: false,
      tab: 'content',

      questionsExample: [
        { 'id': 1, // question 1
          'type_id': 1, // Single
          'response_type_id': 1, // sim ou não
          'question': 'Você já viajou para o Nordeste brasileiro',
          'json_data': null
        },
        { 'id': 2, // question 2
          'type_id': 3, // Videos
          'response_type_id': 1,
          'question': 'O que vocề achou do avião em que viajou?',
          'json_data': 'https://www.youtube.com/watch?v=PF_yP7Q0z6k'
        },
        { 'id': 3, // question 3
          'type_id': 2, // images
          'response_type_id': 1,
          'question': 'O que achau dessas trilhas?',
          'json_data': 'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQzb_HSBZr5vRyAMcod9V9D5WT6cTpBZNfq2CS62izMSlKhb5sX'
        },
        { 'id': 4, // question 4
          'type_id': 2, // images
          'response_type_id': 1,
          'question': 'Descreva o que achou dessas praias',
          'json_data': 'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSHHIpjeWVN4cUHwA3LFIJodDF5WammosV_gYiZ9T-V32IWwJ8O'
        },
        { 'id': 5, // question 5
          'type_id': 1, // Single
          'response_type_id': 5,
          'question': 'Q1 -por que el mar não seca',
          'json_data': null
        }
      ]
    }
  },

  methods: {
    showQuestion (index) {
      this.selectedPageQuestion = index
    },

    changePlane () {
      this.$emit('onchangeplane')
    }

  },

  beforeMount () {
    this.questionary.questions = this.questionsExample
    this.selectedPageQuestion = 2
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
</style>
