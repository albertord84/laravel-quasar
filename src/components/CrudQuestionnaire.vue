<template>
  <div class="row justify-left">
    <div v-if="showPlanesComponent">
        <Planes :plane="plane" @selectedPlane="selectedPlane"></Planes>
    </div>
    <div v-else class="row">
          <!-- ------------------------------------------------------------------------------------------- -->
          <!-- Plano selecionado -->
          <q-banner class="bg-cyan-2  flex justify-between">
            Plano <b>{{plane.name}}</b> selecionado.
            <q-btn flat color="primary" label="Trocar plano" @click.prevent="emitQuestionnaireChangePlane"/>
          </q-banner>
          <div class="col-12 flex q-my-md justify-between">
            <span class="q-mt-sm" style="font-size:1.2rem">Questionário <q-icon v-if="questionnaireModel.released" color="red" title="Questionário já liberado" size="1.2rem" name="info" class="q-mb-sm q-ml-xs pointer-hover" @click="releasedQuestionnaireExplanation"/></span>
          </div>
          <!-- Título do questionário -->
          <q-separator  class="col-12 q-pa-none q-ma-none"></q-separator>
          <div class="col-12 q-mt-lg">
            <b>Título do questionário (*)</b>
            <q-input filled square v-model="questionnaireModel.name" label-color="orange-8" color="orange-8" class="col-12 q-mt-sm" :disable="questionnaireModel.released === 1"/>
          </div>
          <!-- Introdução/Descrição -->
          <div class="col-12 q-mt-lg">
            <b>Introdução/Descrição</b>
            <q-input filled square autogrow v-model="questionnaireModel.description" label-color="orange-8" color="orange-8" class="col-12 q-mt-sm" :disable="questionnaireModel.released === 1"/>
          </div>

          <!-- ------------------------------------------------------------------------------------------- -->
          <!-- Seção de Páginas -->
          <div class="col-12 flex q-mt-xl justify-between">
              <span class="q-mt-sm" style="font-size:1.2rem">Páginas</span>
              <div>
                <q-btn text-color="orange-8" class="q-pa-sm q-mb-sm" flat dense title="Criar nova página"
                        icon="note_add" label="Nova página" @click.prevent="showCriateNewPage"/>
                <q-btn text-color="orange-8" class="q-pa-sm q-mb-sm" flat dense title="Condicionar páginas"
                        icon="account_tree" label="Condições" @click.prevent="showConditionsTab"/>
              </div>
          </div>

          <!-- Selector de páginas criadas -->
          <q-separator  class="col-12 q-pa-none q-ma-none"></q-separator>
          <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 col-md-3 q-mt-lg justify-center">
              <q-list bordered>
                  <q-item clickable class="bg-orange-8" style="color: white" v-ripple @click="showPainelPageList=!showPainelPageList">
                    <q-item-section><b style="font-size:1rem">Páginas criadas</b></q-item-section>
                    <q-item-section avatar>
                      <i :class="[ {'fas fa-chevron-up': showPainelPageList ===true}, {'fas fa-chevron-down': showPainelPageList === false} ]"></i>
                    </q-item-section>
                  </q-item>
                  <div v-show="showPainelPageList">
                    <q-item v-for="(page,index) in questionnaireModel.Pages" clickable v-ripple v-bind:key="index" @click.prevent="showSelectedPage(index)">
                      <q-item-section><span style="font-size:0.95rem">Página {{index+1}}</span></q-item-section>
                      <q-item-section avatar>
                        <div>
                          <q-btn text-color="red" class="q-pa-sm" flat dense round title="Eliminar página" icon="delete" @click.prevent="deleteSelectedPage(index)"/>
                        </div>
                      </q-item-section>
                    </q-item>
                  </div>
              </q-list>
          </div>
          <div class="col-1"></div>

          <!-- Conteúdo das páginas criadas -->
          <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7 col-md-6 q-mt-lg">
              <div v-if="questionnaireModel.Pages.length>0">
                  <q-separator  class="col-12 q-ma-none" style="padding-top:2px"  color="orange-8"/>
                  <div class="q-py-md">
                    <q-card flat>
                        <q-tab-panels v-model="tab" animated dense active-color="orange-10" indicator-color="orange-10" align="left" caps inline-label>

                            <q-tab-panel name="contentTab" class="q-pa-none">
                              <div v-if="(selectedPageIndex>-1 || isCreatingNewPage)">

                                  <span v-if="isCreatingNewPage" style="font-size:1.3rem" class="q-py-md">Página nova</span>
                                  <span v-if="!isCreatingNewPage && selectedPageIndex > -1" style="font-size:1.3rem" class="q-py-md">Página {{selectedPageIndex+1}}</span>

                                  <!-- Container para gerenciamento das mídias para o Plano 3 -->
                                  <div v-if="plane.code === 3">
                                        <div v-if="questionnaireModel.Pages[selectedPageIndex].json_data === null || questionnaireModel.Pages[selectedPageIndex].json_data === ''" class="flex justify-between q-pt-md">
                                          <b class="q-pt-md">Nenhuma mídia adicionada</b>
                                          <div>
                                            <q-btn text-color="orange-8" class="q-pa-sm" flat dense title="Adicionar mídia a essa página" label="Adicionar mídia" icon="add_circle" @click.prevent="isAddingMidia=!isAddingMidia"/>
                                          </div>
                                        </div>
                                        <div v-else class="flex justify-between q-pt-md">
                                          <b class="q-pt-md" v-if="questionnaireModel.Pages[selectedPageIndex].json_data.type === 'image'">Mídia: Imagen</b>
                                          <b class="q-pt-md" v-if="questionnaireModel.Pages[selectedPageIndex].json_data.type === 'video'">Mídia: Video</b>
                                          <div>
                                            <q-btn text-color="green" class="q-pa-sm" size="md" flat dense round title="Editar mídia" icon="edit" @click.prevent="isEditingMidia=!isEditingMidia"/>
                                            <q-btn text-color="red" class="q-pa-sm" flat dense round title="Eliminar mídia" icon="delete" @click="deleteMidia" />
                                          </div>
                                        </div>
                                        <div v-if="isEditingMidia || isAddingMidia">
                                            <span class="q-pt-md">Insira a URL da mídia ou Suba um arquivo</span>
                                            <div class="flex justify-between q-col-8 q-pt-xs">
                                                <q-input filled square v-model="pageMidia" label="URL da mídia online"  label-color="orange-8" class="q-col-8" style="width:100%" color="orange-8" :disable="questionnaireModel.released === 1">
                                                    <template v-slot:after>
                                                        <q-btn color="orange-8" @click="triggerUploadMidia" class="q-py-sm">
                                                          <i class="fas fa-upload" title="Selecionar arquivo a subir" style="font-size:1.3rem; padding:0.1rem"></i>
                                                        </q-btn>
                                                    </template>
                                                </q-input>
                                                <input id="fileInputAudio" ref="fileInputMidia" style="display:none" type="file" @change.prevent="handleFileUploadContent" accept="image/*, video/*"/>
                                            </div>
                                        </div>

                                        <div class="q-pa-md bg-grey-3 q-mt-sm">
                                            <div class="q-col-gutter-md row items-start" >
                                                <div class="col-7 justify-center">
                                                    <div v-if="questionnaireModel.Pages[selectedPageIndex].json_data === null || questionnaireModel.Pages[selectedPageIndex].json_data === ''"  style="padding-bottom:8rem">
                                                      {{verifiedMidia}}
                                                    </div>
                                                    <q-img v-else-if="questionnaireModel.Pages[selectedPageIndex].json_data.type === 'image'"  :src="questionnaireModel.Pages[selectedPageIndex].json_data.src" :ratio="16/9"/>
                                                    <q-video v-else-if="questionnaireModel.Pages[selectedPageIndex].json_data.type === 'video'" :ratio="16/9" src="https://www.youtube.com/embed/k3_tw44QsZQ?rel=0"/>
                                                </div>
                                            </div>
                                        </div>
                                  </div>
                                  <q-separator color="orange-8" style="padding-top:2px" class="q-mt-lg"/>

                                  <!-- Container para o mostrar e editar cada pergunta -->
                                  <!-- Pergunta -->
                                  <div class="q-pt-md">
                                      <b>Pergunta</b>
                                      <q-input filled square autogrow v-model="questionnaireModel.Pages[selectedPageIndex].question" label-color="orange-8" color="orange-8" class="col-12 q-mt-sm" :disable="questionnaireModel.released === 1"/>
                                  </div>

                                  <!-- Selecção do tipo de resposta -->
                                  <div class="q-pt-md">
                                      <b>Tipo de resposta</b>
                                      <q-select filled square v-model="questionnaireModel.Pages[selectedPageIndex].response_type_id" :options="pageOptions"
                                                @input="configureResponseOptions" option-value="id" label-color="orange-8" option-label="desc"
                                                option-disable="inactive" emit-value map-options class="q-mt-sm" color="orange-8" :disable="questionnaireModel.released === 1">
                                      </q-select>
                                  </div>

                                  <!-- Tipo de resposta: UNIQUE and MULTIPLE SELECTION -->
                                  <div v-if="[2, 3].includes(questionnaireModel.Pages[selectedPageIndex].response_type_id)" >
                                    <div class="flex justify-between q-pt-sm">
                                      <span class="q-pt-md"><b>Opções de resposta</b> <q-icon color="primary" size="1.2rem" name="help" class="q-mb-sm q-ml-xs pointer-hover" @click="responseOptionExplanation"/> </span>
                                      <div>
                                        <q-btn text-color="orange-8" class="q-pa-sm" flat dense title="Criar opção de resposta" label="Adicionar resposta" icon="add_circle" @click.prevent="isAddingResponseOption=!isAddingResponseOption"/>
                                      </div>
                                    </div>

                                    <div class="flex justify-between q-col-8 q-pt-xs">
                                      <div v-for="(option, index) in questionnaireModel.Pages[selectedPageIndex].ResponseOptions" v-bind:key="index" style="width:100%">
                                          <q-input filled square autogrow v-model="option.response" label=" " label-color="orange-8" color="orange-8" :disable="questionnaireModel.released === 1">
                                            <template v-slot:prepend>
                                              <div>
                                                <span style="font-size:1rem">{{index + 1}}. </span>
                                                <!-- <q-checkbox v-model="option.truth" dense flat :title="option.truth ? 'Opção verdadeira': 'Opção falsa'" color="primary"
                                                            @input="(questionnaireModel.Pages[selectedPageIndex].response_type_id === 2 && option.truth)? checkOnlyOption(index,1) : null"/> -->
                                              </div>
                                            </template>
                                            <template v-slot:append>
                                              <q-btn flat dense rounded color="grey-3" text-color="red" @click="deleteResponseOption(index)" class="q-pa-sm" icon="delete"/>
                                            </template>
                                          </q-input>
                                          <q-separator></q-separator>
                                      </div>
                                      <div v-if="questionnaireModel.Pages[selectedPageIndex].ResponseOptions.length === 0" class="q-pa-md bg-grey-3 q-mb-md" style="width:100%">
                                          <span style="font-size:0.9rem">Nenhuma opção de resposta criada</span>
                                      </div>
                                    </div>

                                    <div v-if="isAddingResponseOption">
                                        <div class="flex justify-between q-col-8 q-pt-sm">
                                          <q-input filled square v-model="newResponseOption.response" label=" " @keydown.enter.prevent="addResponseOption" label-color="orange-8" style="width:100%" color="orange-8" :disable="questionnaireModel.released === 1">
                                            <template v-slot:prepend>
                                              <!-- <q-checkbox v-model="newResponseOption.truth" @input="(newResponseOption.truth)? checkOnlyOption(0,0) : null" title="Marcar somente se essa opção é verdadeira" dense color="primary" /> -->
                                            </template>
                                            <template v-slot:after>
                                              <q-btn color="orange-8" @click.prevent="addResponseOption" class="q-py-sm" title="Adicionar opção de resposta">
                                                <i class="fas fa-check-circle" style="font-size:1.3rem; padding:0.1rem"></i>
                                              </q-btn>
                                            </template>
                                          </q-input>
                                        </div>
                                    </div>
                                  </div>

                                  <!-- Tipo de resposta: SCALE -->
                                  <div v-if="[4].includes(questionnaireModel.Pages[selectedPageIndex].response_type_id)">
                                    <div class="flex justify-between q-pt-sm">
                                      <b class="q-pt-md">{{(action === 'insert')? 'Estabelecer escala' : 'Escala estabelecida'}}</b>
                                      <div v-if="action === 'insert'">
                                        <q-btn text-color="blue" class="q-pa-sm" flat dense round title="Criar opção de resposta" icon="add_circle" @click.prevent="isAddingResponseOption=!isAddingResponseOption"/>
                                      </div>
                                    </div>

                                    <div class="flex justify-between align-bottom align-items-end">
                                        <div class="">
                                          <span style="font-size:0.9rem"> Limite inferior</span>
                                          <q-input filled square v-model="questionnaireModel.Pages[selectedPageIndex].ResponseOptions[0].response" label=" " label-color="orange-8" color="orange-8" :disable="questionnaireModel.released === 1">
                                              <template v-slot:prepend>
                                                <q-icon name="vertical_align_bottom" />
                                              </template>
                                            </q-input>
                                        </div>
                                        <div class="">
                                          <span style="font-size:0.9rem"> Limite superior</span>
                                          <q-input filled square v-model="questionnaireModel.Pages[selectedPageIndex].ResponseOptions[1].response" label=" " label-color="orange-8" color="orange-8" :disable="questionnaireModel.released === 1">
                                              <template v-slot:prepend>
                                                <q-icon name="vertical_align_top" />
                                              </template>
                                          </q-input>
                                        </div>
                                        <div class="">
                                          <q-btn color="orange-8" @click.prevent="addResponseOption" class="q-py-sm q-mt-lg" :title="(action === 'insert') ? 'Adicionar escala' : 'Atualizar escala'">
                                            <i class="fas fa-check-circle" style="font-size:1.3rem; padding:0.1rem"></i>
                                          </q-btn>
                                        </div>
                                    </div>
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

          <!-- ------------------------------------------------------------------------------------------- -->
          <div class="col-12 flex q-my-md justify-between">
            <span class="q-mt-sm" style="font-size:1.2rem">Finalizar {{(action === 'insert') ? 'criação' : 'edição'}} do  questionário</span>
          </div>
          <q-separator  class="col-12 q-pa-none q-ma-none"></q-separator>
          <div class="q-my-md">
            <q-btn text-color="white" class="q-pa-sm q-mb-sm bg-orange-8" label="Guardar questionário"  title="Guardar questionário" icon="save" @click.prevent="saveQuestionnaire"/>
          </div>
    </div>
  </div>
</template>

<script>
// import { WebService } from '../services/WebService.js'
// import validation from '../services/ValidationService.js'
import { Roles, ResponsesTypes, QuestionsTypes } from '../helpers/constants.js'

export default {
  name: 'CrudQuestionnaire',

  props: {
    action: null,
    questionnaire: null
  },

  components: {
    'Planes': require('./Planes.vue').default
  },

  data () {
    return {
      showPlanesComponent: null,
      plane: { 'code': 0, 'name': 'None' },

      questionnaireModel: {
        id: 0,
        plane_id: 0,
        criator_id: 0,
        updater_id: 0,
        company_id: 0,
        name: 'Questionário novo name',
        description: 'Questionário novo descrição',
        observation: 'Questionário observação',
        released: 0,
        Pages: []
      },

      pageModel: {
        id: 0,
        questionnaire_id: 0,
        content_type_id: 0, // 0: basic, 2: image, 3: video, 4: url
        response_type_id: 0,
        question: '',
        json_data: '',
        ResponseOptions: [],
        validated: false
      },

      newResponseOptionScale: [
        { 'id': 0, 'question_id': 0, 'response': 0, 'truth': true },
        { 'id': 0, 'question_id': 0, 'response': 10, 'truth': true }
      ],

      newResponseOption: {
        'id': 0,
        'question_id': 0,
        'response': '',
        'truth': false
      },
      pageMidia: '',
      verifiedMidia: 'Nenhuma mídia adicionada',
      file: null,
      pageOptions: [],

      imageExtensions: ['.jpeg', '.jpg', '.pgn', '.bmp', '.gif', '.svg'],
      videoExtensions: ['.ogg', '.mkv', '.webm', '.ogv', '.vob', '.drc', '.avi', '.mov', '.wmv', '.yuv', '.rmvb', '.amv', '.m4p', '.mp4', '.mpg', '.mpeg', '.mpe', '.mpv', '.m2v', '.m4v', '.3gp'],

      isCreatingQuestionnary: false,
      isCreatingNewPage: false,
      isEditingMidia: false,
      isAddingMidia: false,
      isAddingResponseOption: false,

      selectedPageIndex: -1,
      showPainelPageList: false,
      tab: 'contentTab',
      userLogged: {}
    }
  },

  methods: {
    // -------------------questionnaire functions-----------------------
    saveQuestionnaire () {
      console.log(this.questionnaireModel)
      if (this.userLogged.role_id > Roles.Admin) {
        this.$router.replace({ name: 'public.denied' })
      }
      if (this.action === 'edit' && this.questionnaireModel.released) {
        this.releasedQuestionnaireExplanation()
        return
      }
      if (!this.validateQuestionnaryModel()) {
        return
      }
      if (!this.validateQuestionnaryPages()) {
        return
      }

      // this.isCreatingQuestionnary = true
      // this.$q.loading.show()

      // var url = (this.action === 'insert') ? 'criateFullCampaign' : 'updateFullCampaign'
      if (this.action === 'insert') {
        this.questionnaireModel.released = 0
        this.questionnaireModel.criator_id = (!this.questionnaireModel.criator_id) ? this.userLogged.id : this.questionnaireModel.criator_id
        this.questionnaireModel.updater_id = (!this.questionnaireModel.updater_id) ? this.userLogged.id : this.questionnaireModel.updater_id
        this.questionnaireModel.company_id = (!this.questionnaireModel.company_id) ? this.userLogged.company_id : this.questionnaireModel.company_id
      }
      this.questionnaireModel.plane_id = this.plane.code
      alert('this.questionnaireModel')
      // WebService.put('web/' + url, {
      //   campaign: this.campaignModel
      // })
      //   .then(response => {
      //     var text = (this.action === 'insert') ? 'criado' : 'atualizado'
      //     this.$q.notify({ type: 'positive', color: 'teal-3', message: `Questionário ` + text + ` com sucesso.`, position: 'top-right' })
      //     this.$emit('reloadQuestionnaires')
      //   })
      //   .catch(error => {
      //     var text = (this.action === 'insert') ? 'cadastrando' : 'atualizando'
      //     this.$q.notify({ type: 'negative', message: `Erro ` + text + ` questionário.`, position: 'top-right' })
      //     console.log(error)
      //   })
      //   .finally(() => {
      //     this.isCreatingQuestionnary = false
      //     this.$q.loading.hide()
      //   })
    },

    validateQuestionnaryModel () {
      if (this.questionnaireModel.name.trim() === '') {
        this.$q.notify({ type: 'negative', message: `O campo Título do questionário é obrigatório.`, position: 'top-right' })
        return false
      }

      if (this.questionnaireModel.description.trim() === '') {
        this.$q.notify({ type: 'negative', message: `O campo Introdução/Descrição é obrigatório.`, position: 'top-right' })
        return false
      }

      return true
    },

    validateQuestionnaryPages () {
      if (this.questionnaireModel.Pages.length === 0) {
        this.$q.notify({ type: 'negative', message: `Você deve adicionar paǵinas de questões a esse questionário.`, position: 'top-right' })
        return false
      }
      var flag = true
      this.questionnaireModel.Pages.some((item, i) => {
        console.log('verificando página ' + i)
        if (!this.validatePage(item, i)) {
          flag = false
          return false
        }
      })
      return flag
    },

    validatePage (page, i) {
      var dummyPageName = 'Página ' + (i + 1)
      if (page.question.trim() === '') {
        this.$q.notify({ type: 'negative', message: `O campo Pergunta da ` + dummyPageName + ` é um campo orbigatório.`, position: 'top-right' })
        return false
      }

      // validar a midia segundo plano
      if (this.plane.code === 3) {
        if (this.file) {
          var t = QuestionsTypes.SINGLE
          var str
          var ext
          if (this.isImage(this.file.name)) {
            t = QuestionsTypes.IMAGE
            str = 'image'
          } else
          if (this.isVideo(this.file.name)) {
            t = QuestionsTypes.VIDEO
            str = 'video'
          }
          if (str === 'image' || str === 'video') {
            ext = this.file.name.split('.')
            ext = ext[ext.length - 1]
            this.questionnaireModel.Pages[this.selectedPageIndex].json_data = {
              type: str,
              ClientOriginalExtension: ext,
              src: ''
            }
          }
          page.content_type_id = t
          this.verifiedMidia = 'Mídia verificada'
        } else
        if (this.isURL(this.pageMidia)) {
          ext = this.file.name.split('.')
          ext = ext[ext.length - 1]
          this.questionnaireModel.Pages[this.selectedPageIndex].json_data = {
            type: QuestionsTypes.URL,
            ClientOriginalExtension: ext,
            src: this.pageMidia
          }
          page.content_type_id = QuestionsTypes.URL
          this.verifiedMidia = 'Mídia verificada'
        }
      } else {
        page.content_type_id = QuestionsTypes.SINGLE
        page.json_data = ''
      }

      switch (page.response_type_id) {
        case ResponsesTypes.BOOLEAN:
          break
        case ResponsesTypes.UNIQUE_SELECTION:
          if (page.ResponseOptions.length < 2) {
            this.$q.notify({ type: 'negative', message: `A ` + dummyPageName + ` deve ter pelo menos duas opções de resposta.`, position: 'top-right' })
            return false
          } else {
            var checked = 0
            page.ResponseOptions.some((item, i) => {
              if (item.truth) {
                checked++
              }
            })
            if (checked === 0) {
              this.$q.notify({ type: 'negative', message: `A ` + dummyPageName + ` deve ter pelo uma das pções de resposta marcadas como Correta.`, position: 'top-right' })
              return false
            } else
            if (checked > 1) {
              this.$q.notify({ type: 'negative', message: `A ` + dummyPageName + ` deve ter somente uma opção de resposta marcada como Correta.`, position: 'top-right' })
              return false
            }
          }
          break

        case ResponsesTypes.MULTIPLE_SELECTION:
          if (page.ResponseOptions.length < 2) {
            this.$q.notify({ type: 'negative', message: `A ` + dummyPageName + ` deve ter pelo menos duas opções de resposta.`, position: 'top-right' })
            return false
          } else {
            checked = 0
            page.ResponseOptions.some((item, i) => {
              if (item.truth) {
                checked++
              }
            })
            if (checked === 0) {
              this.$q.notify({ type: 'negative', message: `A ` + dummyPageName + ` deve ter pelo uma das pções de resposta marcadas como Correta.`, position: 'top-right' })
              return false
            }
          }
          break
        case ResponsesTypes.SCALE_SELECTION:
          if (page.ResponseOptions[0].response === '' || page.ResponseOptions[1].response === '' || page.ResponseOptions[0].response > page.ResponseOptions[1].response) {
            this.$q.notify({ type: 'negative', message: `Indique limites válidos para a questão da página ` + dummyPageName + `.`, position: 'top-right' })
            return false
          }
          break
        case ResponsesTypes.DISCURSIVE:
          break
      }
      page.validated = true
      return true
    },

    emitQuestionnaireChangePlane () {
      if (this.questionnaireModel.released) {
        this.releasedQuestionnaireExplanation()
      } else {
        this.$emit('changePlane')
      }
    },

    // -------------------pages functions-----------------------------
    showCriateNewPage () {
      if (this.questionnaireModel.released) {
        this.releasedQuestionnaireExplanation()
      } else {
        var flag = true
        if (this.questionnaireModel.Pages.length && !this.questionnaireModel.Pages[this.questionnaireModel.Pages.length - 1].validated) {
          flag = false
          if (this.validatePage(this.questionnaireModel.Pages[this.questionnaireModel.Pages.length - 1], this.questionnaireModel.Pages.length - 1)) {
            flag = true
          }
        }
        if (flag) {
          this.tab = 'contentTab'
          this.questionnaireModel.Pages.push({
            id: 0,
            questionnaire_id: 0,
            content_type_id: 0,
            response_type_id: 0,
            question: '',
            json_data: null,
            ResponseOptions: [],
            validated: false
          })
          this.isCreatingNewPage = true
          this.showPainelPageList = true
          this.selectedPageIndex = this.questionnaireModel.Pages.length - 1
        }
      }
    },

    showSelectedPage (index) {
      this.isCreatingNewPage = false
      this.selectedPageIndex = index
      this.tab = 'contentTab'
    },

    deleteSelectedPage (index) {
      this.$q.dialog({
        title: 'Verificação',
        message: 'Confirma que deseja eliminar a Página ' + (index + 1) + '?',
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

    // -------------------midia functions-------------------
    deleteMidia () {
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

    handleFileUploadContent () {
      this.file = null
      if (this.$refs.fileInputMidia !== undefined) {
        this.file = this.$refs.fileInputMidia.files[0]
        this.pageMidia = this.file.name
        this.verifiedMidia = 'Mídia verificada'
        // TODO: fazer midia preview
      }
    },

    // -------------------ResponseOptions functions-------------------
    configureResponseOptions () {
      if (this.questionnaireModel.Pages[this.selectedPageIndex].response_type_id === ResponsesTypes.SCALE_SELECTION) {
        this.questionnaireModel.Pages[this.selectedPageIndex].ResponseOptions = this.newResponseOptionScale
      }
    },

    checkOnlyOption (index, isnew) {
      if (this.questionnaireModel.Pages[this.selectedPageIndex].response_type_id === ResponsesTypes.UNIQUE_SELECTION) {
        this.questionnaireModel.Pages[this.selectedPageIndex].ResponseOptions.some((item, i) => {
          item.truth = false
        })
        if (isnew) {
          this.questionnaireModel.Pages[this.selectedPageIndex].ResponseOptions[index].truth = true
          this.newResponseOption.truth = false
        } else {
          this.newResponseOption.truth = true
        }
      }
    },

    addResponseOption () {
      if (this.newResponseOption.response.trim() !== '') {
        this.questionnaireModel.Pages[this.selectedPageIndex].ResponseOptions.push(Object.assign({}, this.newResponseOption))
        this.newResponseOption.response = ''
        this.newResponseOption.truth = false
      }
    },

    deleteResponseOption (index) {
      this.$q.dialog({
        title: 'Verificação',
        message: 'Confirma que deseja eliminar essa opção de resposta?',
        // cancel: true,
        cancel: 'Cancelar',
        ok: 'Confirmar',
        persistent: true
      }).onOk(() => {
        this.ResponseOptions.splice(index, 1)
        console.log(this.ResponseOptions)
      }).onOk(() => {
        console.log('>>>> second OK catcher')
      }).onCancel(() => {
        console.log('>>>> Cancel')
      }).onDismiss(() => {
        console.log('I am triggered on both OK and Cancel')
      })
    },

    // -------------------general functions-------------------
    showConditionsTab () {
      this.tab = 'conditionsTab'
    },

    isImage (str) {
      if (this.imageExtensions.some((ext, i) => {
        if (str.includes(ext)) {
          return true
        }
      })) return true
      else return false
    },

    isVideo (str) {
      if (this.videoExtensions.some((ext, i) => {
        if (str.includes(ext)) {
          return true
        }
      })) return true
      else return false
    },

    isURL (str) {
      var pattern = new RegExp('^(https?:\\/\\/)?' + // protocol
          '((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.)+[a-z]{2,}|' + // domain name
          '((\\d{1,3}\\.){3}\\d{1,3}))' + // OR ip (v4) address
          '(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*' + // port and path
          '(\\?[;&a-z\\d%_.~+=-]*)?' + // query string
          '(\\#[-a-z\\d_]*)?$', 'i') // fragment locator
      return !!pattern.test(str)
    },

    responseOptionExplanation () {
      this.$q.dialog({
        title: 'Sobre as Opções de resposta',
        color: 'orange-8',
        message: 'Aqui você pode criar várias opções de resposta para a pergunta formulada, segunbdo o tipo de resposta selecionado. Marque a opção (ou as opções) certa para facilitar a revisão automática das respostas.',
        transitionShow: 'flip-down',
        transitionHide: 'flip-up',
        ok: 'Aceitar'
      })
    },

    releasedQuestionnaireExplanation () {
      this.$q.dialog({
        title: 'Questionário já liberado',
        color: 'orange-8',
        message: 'Esse questionário já foi liberado em uma campanha anterior e não pode ser editado. Para modificar esse questionário você deve "Criar uma cópia" dele. Para isso, clique no botão "Criar uma cópia" do respeitivo questionário na tabela de Questionários. ',
        transitionShow: 'flip-down',
        transitionHide: 'flip-up',
        ok: 'Aceitar'
      })
    },

    // -------------------plane functions--------------------
    selectedPlane (plane) {
      this.plane = plane
      this.pageOptionsByPlane()
      this.showPlanesComponent = false
    },

    pageOptionsByPlane () {
      if (this.plane.code === 1) {
        this.pageOptions = [
          { id: 1, desc: 'Resposta com seleção Sim ou Não' },
          { id: 2, desc: 'Resposta com seleção única' }
        ]
      } else {
        this.pageOptions = [
          { id: 1, desc: 'Resposta com seleção Sim ou Não' },
          { id: 2, desc: 'Resposta com seleção única' },
          { id: 3, desc: 'Resposta com múltipla escolha' },
          { id: 4, desc: 'Resposta em escala' },
          { id: 5, desc: 'Resposta em texto livre' }
        ]
      }
    },

    getPlaneArrayByPlaneId (planeId) {
      var plane
      switch (planeId) {
        case 0:
          plane = { 'code': 0, 'name': 'None' }
          break
        case 1:
          plane = { 'code': 1, 'name': 'Starter' }
          break
        case 2:
          plane = { 'code': 2, 'name': 'Ideal' }
          break
        case 3:
          plane = { 'code': 3, 'name': 'Premium' }
          break
      }
      return plane
    }
  },

  watch: {
    pageMidia (value) {
      if (this.isURL(value) || this.file) {
        this.verifiedMidia = 'Mídia verificada'
      } else {
        this.verifiedMidia = 'Nenhuma mídia adicionada'
      }
    }
  },

  beforeMount () {
    this.userLogged = this.$q.localStorage.getItem('user_data')
    if (this.userLogged.role_id > Roles.Admin) {
      this.$router.replace({ name: 'public.denied' })
    }
    if (this.action === 'edit') {
      this.selectedPageIndex = (this.questionnaire.Pages && this.questionnaire.Pages.length) ? 0 : -1
      this.plane = this.getPlaneArrayByPlaneId(this.questionnaire.plane_id)
      this.pageOptionsByPlane()
      this.questionnaire.Pages.some((page, i) => {
        page.json_data = (page.json_data && page.json_data !== '') ? JSON.parse(page.json_data) : ''
      })
      this.questionnaireModel = this.questionnaire
      this.questionnaireModel.Pages.some((item, i) => {
        item.validated = true
      })
      this.showPlanesComponent = false
    } else
    if (this.action === 'insert') {
      this.plane = this.getPlaneArrayByPlaneId(0)
      this.showPlanesComponent = true
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
  .pointer-hover:hover{
    cursor: pointer;
  }
</style>
