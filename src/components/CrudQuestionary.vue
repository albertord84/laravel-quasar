<template>
  <div class="row justify-left">
      <q-banner class="bg-cyan-2  flex justify-between">
        Plano <b>{{plane.name}}</b> selecionado.
        <q-btn flat color="primary" label="Trocar plano" @click.prevent="emitChangePlane"/>
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
          <div>
            <q-btn text-color="orange-8" class="q-pa-sm q-mb-sm" flat dense round title="Criar nova página" icon="note_add" @click.prevent="showCriateNewPage"/>
            <q-btn text-color="orange-8" class="q-pa-sm q-mb-sm" flat dense round title="Condicionar páginas" icon="account_tree" @click.prevent="showConditionsTab"/>
          </div>
      </div>

      <q-separator  class="col-12 q-pa-none q-ma-none"></q-separator>

      <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 col-md-3 q-mt-lg justify-center">
          <q-list bordered>
              <q-item clickable class="bg-orange-8" v-ripple @click="showPainelPageList=!showPainelPageList">
                <q-item-section><b style="font-size:1rem">Páginas criadas</b></q-item-section>
                <q-item-section avatar>
                  <i :class="[ {'fas fa-chevron-up': showPainelPageList ===true}, {'fas fa-chevron-down': showPainelPageList === false} ]"></i>
                </q-item-section>
              </q-item>
              <div v-show="showPainelPageList">
                <q-item v-for="(page,index) in questionary.pages" clickable v-ripple v-bind:key="index" @click.prevent="showSelectedPage(index)">
                  <q-item-section><span style="font-size:1.2rem">Página {{index+1}}</span></q-item-section>
                  <q-item-section avatar>
                    <div>
                      <q-btn text-color="green" class="q-pa-sm" size="md" flat dense round title="Editar página" icon="edit" @click.prevent="editSelectedPage(index)"/>
                      <q-btn text-color="red" class="q-pa-sm" flat dense round title="Eliminar página" icon="delete" @click.prevent="deleteSelectedPage(index)"/>
                    </div>
                  </q-item-section>
                </q-item>
              </div>
          </q-list>
      </div>
      <div class="col-1">
      </div>
      <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7 col-md-6 q-mt-lg">
          <div v-if="questionary.pages && questionary.pages.length>0">
              <q-separator  class="col-12 q-ma-none" style="padding-top:2px"  color="orange-8"/>

              <div class="q-py-md">
                <q-card flat>
                    <q-tab-panels v-model="tab" animated>
                      <q-tab-panel name="contentTab" class="q-pa-none">

                        <div v-if="(selectedPageIndex>-1 || isCreatingNewPage)">

                            <span v-if="isCreatingNewPage" style="font-size:1.3rem" class="q-py-md">Página nova</span>
                            <span v-if="!isCreatingNewPage && selectedPageIndex > -1" style="font-size:1.3rem" class="q-py-md">Página {{selectedPageIndex+1}}</span>

                            <div v-if="plane.code === 3">
                              <div v-if="showedPage.type_id<2" class="flex justify-between q-pt-md">
                                <b class="q-pt-md">Nenhuma mídia adicionada</b>
                                <div>
                                  <q-btn text-color="blue" class="q-pa-sm" flat dense round title="Adicionar mídia" icon="add_circle" @click.prevent="isAddingMidia=!isAddingMidia"/>
                                </div>
                              </div>
                              <div v-if="showedPage.type_id>=2" class="flex justify-between q-pt-md">
                                <b class="q-pt-md" v-if="showedPage.type_id===2">Mídia: Imagen</b>
                                <b class="q-pt-md" v-if="showedPage.type_id===3">Mídia: Video</b>
                                <div>
                                  <q-btn text-color="green" class="q-pa-sm" size="md" flat dense round title="Editar mídia" icon="edit" @click.prevent="isEditingMidia=!isEditingMidia"/>
                                  <q-btn text-color="red" class="q-pa-sm" flat dense round title="Eliminar mídia" icon="delete" @click="confirmDeleteMidia" />
                                </div>
                              </div>
                              <div v-if="isEditingMidia || isAddingMidia">
                                  <span class="q-pt-md">Insira a URL da mídia ou suba um arquivo</span>
                                  <div class="flex justify-between q-col-8 q-pt-xs">
                                    <q-input filled square v-model="questionary.description" label="Colar URL de mídia online" label-color="orange-8" class="q-col-8" style="width:65%" color="orange-8"/>
                                    <q-btn color="orange-8" @click="triggerUploadMidia" style="width:33%" class="q-py-sm" label="arquivo"/>
                                    <input id="fileInputAudio" ref="fileInputMidia" style="display:none"   type="file" @change.prevent="handleFileUploadContent" accept="audio/*"/>
                                  </div>
                              </div>

                              <div class="q-pa-md bg-grey-3 q-mt-sm">
                                  <div class="q-col-gutter-md row items-start" >
                                      <div class="col-7 justify-center">
                                          <!-- <div v-if="showedPage.type_id===1" style="height:100px"></div> -->
                                          <q-img v-if="showedPage.type_id<2"  :src="'showedPage.json_data'" :ratio="16/9"/>
                                          <q-img v-if="showedPage.type_id===2"  :src="showedPage.json_data" :ratio="16/9"/>
                                          <q-video v-if="showedPage.type_id===3" :ratio="16/9" src="https://www.youtube.com/embed/k3_tw44QsZQ?rel=0"/> <!-- :src="showedPage.json_data" -->
                                      </div>
                                  </div>
                              </div>
                            </div>

                            <q-separator color="orange-8" style="padding-top:2px" class="q-mt-lg"/>

                            <div class="q-pt-md">
                              <b>Pergunta</b>
                              <q-input filled square v-model="showedPage.question" label-color="orange-8" color="orange-8" class="col-12 q-mt-sm"/>
                            </div>

                            <div class="q-pt-md">
                              <b>Tipo de resposta</b>
                              <q-select filled square v-model="showedPage.response_type_id" :options="pageOptions" label-color="orange-8" class="q-mt-sm" color="orange-8" label=" " />
                            </div>

                            <div class="q-pt-md">
                              <b>Opções de resposta</b>
                              <q-select filled square v-model="showedPage.response_type_id" :options="pageOptions" label-color="orange-8" class="q-mt-sm" color="orange-8" label=" " />
                            </div>

                        </div>

                      </q-tab-panel>

                      <q-tab-panel name="conditionsTab" class="q-pa-none">
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
        pages: null
      },
      showedPage: null,
      editPage: null,
      newPage: {
        'id': 0,
        'type_id': 0,
        'response_type_id': 0,
        'question': '',
        'json_data': null
      },
      pageOptions: [
        'Resposta com seleção Sim - Não',
        'Resposta com seleção única',
        'Resposta com múltipla escolha',
        'Resposta em escala',
        'Resposta em texto livre'
      ],

      isCreatingNewPage: false,
      isEditingMidia: false,
      isAddingMidia: false,
      selectedPageIndex: -1,
      showPainelPageList: false,
      tab: 'contentTab'
    }
  },

  methods: {
    showSelectedPage (index) {
      this.isCreatingNewPage = false
      this.selectedPageIndex = index
      this.showedPage = this.questionary.pages[index]
      this.tab = 'contentTab'
    },

    editSelectedPage (index) {
      this.isCreatingNewPage = false
      this.selectedPageIndex = index
      this.showedPage = this.questionary.pages[index]
      this.tab = 'contentTab'
    },

    deleteSelectedPage (index) {
      this.isCreatingNewPage = false
      this.selectedPageIndex = index
      this.showedPage = this.questionary.pages[index]
      this.tab = 'contentTab'
    },

    confirmDeleteMidia () {
      this.$q.dialog({
        title: 'Verificação',
        message: 'Confirma que deseja eliminar essa mídia?',
        // cancel: true,
        cancel: 'Cancelar',
        ok: 'Confirmar',
        persistent: true
      }).onOk(() => {
        console.log('>>>> OK')
      }).onOk(() => {
        console.log('>>>> second OK catcher')
      }).onCancel(() => {
        console.log('>>>> Cancel')
      }).onDismiss(() => {
        console.log('I am triggered on both OK and Cancel')
      })
    },

    triggerUploadMidia () {
      this.$refs.fileInputMidia.click()
    },

    showCriateNewPage () {
      this.showedPage = this.newPage
      this.tab = 'contentTab'
      this.isCreatingNewPage = true
    },

    showConditionsTab () {
      this.tab = 'conditionsTab'
    },

    emitChangePlane () {
      this.$emit('onchangeplane')
    }

  },

  beforeMount () {
    var pagesExample = [
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
    this.questionary.pages = pagesExample

    if (this.questionary.pages && this.questionary.pages.length) {
      this.selectedPageIndex = 0
      this.showedPage = this.questionary.pages[this.selectedPageIndex]
    } else {
      this.selectedPageIndex = -1
    }
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
