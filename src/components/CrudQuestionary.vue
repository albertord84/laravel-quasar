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
      <div class="col-12 q-mt-xl">
          <q-icon color="dark" size="md" name="file_copy" />
          <p class="q-ml-md" style="font-size:1.2rem">Páginas</p>
      </div>

      <q-separator  class="col-12 q-pa-none q-ma-none"></q-separator>

      <div class="col-xs-12 col-sm-5 col-md-4 col-lg-4 col-md-3 q-mt-lg">
          <q-list bordered  style="max-width: 290px">
              <q-item clickable class="bg-orange-8" v-ripple>
                <q-item-section><b style="font-size:1rem">Páginas</b></q-item-section>
                <q-item-section avatar @click="showPageQuestion=!showPageQuestion">
                  <i :class="[ {'fas fa-chevron-up': showPageQuestion ===true}, {'fas fa-chevron-down': showPageQuestion === false} ]"></i>
                </q-item-section>
              </q-item>
              <div v-show="showPageQuestion">
                <q-item v-for="(question,index) in question" clickable v-ripple v-bind:key="index">
                  <q-item-section><span style="font-size:1.2rem">{{'Página'}}</span></q-item-section>
                  <q-item-section avatar>
                    <q-avatar text-color="dark">{{index}}</q-avatar>
                  </q-item-section>
                </q-item>
              </div>
          </q-list>
      </div>
      <div class="col-xs-12 col-sm-7 col-md-8 col-lg-8 col-md-5 q-mt-lg">
        <q-separator  class="col-12 q-pa-none q-ma-none" color="orange-8"></q-separator>
        <div class="q-py-md q-pl-md">
          <b>Página 1</b>
        </div>
        <div class="q-py-md q-pl-md">
          <q-card flat>
            <q-tabs v-model="tab" dense class="text-grey" align="left" active-bg-color="grey-5" indicator-color="grey-5" no-caps inline-label>
              <q-tab name="content" class="text-dark" icon="horizontal_split" label="Conteúdo" />
              <q-tab name="condition" class="text-dark" icon="add" label="Condição" />
            </q-tabs>

            <q-separator color="orange-8" class="q-my-xs"/>

            <q-tab-panels v-model="tab" animated>
              <q-tab-panel name="content" class="q-pa-none">
                <div class="q-pt-md">
                  <span >Imagens</span>
                </div>
                <div class="q-pa-md bg-grey-3">
                  <div class="q-col-gutter-md row items-start">
                    <div v-for="(midia, index) in questionMidias" class="col-4" v-bind:key="index"><q-img src="https://placeimg.com/500/300/nature" :ratio="16/9"/></div>
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
        <!-- <q-separator  class="col-12 q-pa-none q-ma-none" color="orange-8"></q-separator> -->
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
        questions: [
          { 'id': 1,
            'type_id': '',
            'response_type_id': 1,
            'question': 'Q1 -por que el mar não seca',
            'midias': 'json_data'
          },
          { 'id': 1,
            'type_id': '',
            'response_type_id': 1,
            'question': 'Q1 -por que el mar não seca',
            'midias': 'json_data'
          },
          { 'id': 1,
            'type_id': '',
            'response_type_id': 1,
            'question': 'Q1 -por que el mar não seca',
            'midias': 'json_data'
          }
        ]
      },
      showPageQuestion: false,
      question: [
        { 'dumpyName': 'Página 1' },
        { 'dumpyName': 'Página 2' },
        { 'dumpyName': 'Página 3' },
        { 'dumpyName': 'Página 4' },
        { 'dumpyName': 'Página 5' }
      ],
      tab: 'content',
      questionMidias: [ 1, 2, 3 ]
    }
  },

  methods: {
    selectAAA () {
    },

    changePlane () {
      this.$emit('onchangeplane')
    }

  },

  beforeMount () {

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
