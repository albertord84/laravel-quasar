<template>
  <div class="row justify-left">
      <q-banner class="bg-cyan-2  flex justify-between">
        Plano <b>{{plane.name}}</b> selecionado.
        <q-btn flat color="primary" label="Trocar plano" @click.prevent="emitQuestionaryChangePlane"/>
      </q-banner>
      <div class="col-12 flex q-my-md justify-between">
        <span class="q-mt-sm" style="font-size:1.2rem">Questionário</span>
      </div>

      <q-separator  class="col-12 q-pa-none q-ma-none"></q-separator>

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
            <q-btn text-color="orange-8" class="q-pa-sm q-mb-sm" flat dense title="Criar nova página" icon="note_add" label="Nova página" @click.prevent="showCriateNewPage"/>
            <q-btn text-color="orange-8" class="q-pa-sm q-mb-sm" flat dense title="Condicionar páginas" icon="account_tree" label="Condições" @click.prevent="showConditionsTab"/>
          </div>
      </div>

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
                <q-item v-for="(page,index) in questionary.pages" clickable v-ripple v-bind:key="index" @click.prevent="showSelectedPage(index)">
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

      <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7 col-md-6 q-mt-lg">
          <div v-if="questionary.pages && questionary.pages.length>0">
              <q-separator  class="col-12 q-ma-none" style="padding-top:2px"  color="orange-8"/>
              <div class="q-py-md">
                <q-card flat>
                    <q-tab-panels v-model="tab" animated dense active-color="orange-10" indicator-color="orange-10" align="left" caps inline-label>

                        <q-tab-panel name="contentTab" class="q-pa-none">
                          <div v-if="(selectedPageIndex>-1 || isCreatingNewPage)">

                              <span v-if="isCreatingNewPage" style="font-size:1.3rem" class="q-py-md">Página nova</span>
                              <span v-if="!isCreatingNewPage && selectedPageIndex > -1" style="font-size:1.3rem" class="q-py-md">Página {{selectedPageIndex+1}}</span>

                              <div v-if="plane.code === 3">
                                <div v-if="questionary.pages[selectedPageIndex].json_data === null || questionary.pages[selectedPageIndex].json_data === ''" class="flex justify-between q-pt-md">
                                  <b class="q-pt-md">Nenhuma mídia adicionada</b>
                                  <div>
                                    <q-btn text-color="orange-8" class="q-pa-sm" flat dense title="Adicionar mídia a essa página" label="Adicionar mídia" icon="add_circle" @click.prevent="isAddingMidia=!isAddingMidia"/>
                                  </div>
                                </div>
                                <div v-else class="flex justify-between q-pt-md">
                                  <b class="q-pt-md" v-if="questionary.pages[selectedPageIndex].json_data.type === 'image'">Mídia: Imagen</b>
                                  <b class="q-pt-md" v-if="questionary.pages[selectedPageIndex].json_data.type === 'video'">Mídia: Video</b>
                                  <div>
                                    <q-btn text-color="green" class="q-pa-sm" size="md" flat dense round title="Editar mídia" icon="edit" @click.prevent="isEditingMidia=!isEditingMidia"/>
                                    <q-btn text-color="red" class="q-pa-sm" flat dense round title="Eliminar mídia" icon="delete" @click="deleteMidia" />
                                  </div>
                                </div>
                                <div v-if="isEditingMidia || isAddingMidia">
                                    <span class="q-pt-md">Insira a URL da mídia ou Suba um arquivo</span>
                                    <div class="flex justify-between q-col-8 q-pt-xs">
                                        <q-input filled square v-model="questionary.json_data" label="URL da mídia online"  label-color="orange-8" class="q-col-8" style="width:100%" color="orange-8">
                                            <template v-slot:after>
                                                <q-btn color="orange-8" @click="triggerUploadMidia" class="q-py-sm"><i class="fas fa-upload" title="Selecionar arquivo a subir" style="font-size:1.3rem; padding:0.1rem"></i></q-btn>
                                            </template>
                                        </q-input>
                                        <input id="fileInputAudio" ref="fileInputMidia" style="display:none" type="file" @change.prevent="handleFileUploadContent" accept="image/*, video/*"/>
                                    </div>
                                </div>

                                <div class="q-pa-md bg-grey-3 q-mt-sm">
                                    <div class="q-col-gutter-md row items-start" >
                                        <div class="col-7 justify-center">
                                            <div v-if="questionary.pages[selectedPageIndex].json_data === null || questionary.pages[selectedPageIndex].json_data === ''"  style="padding-bottom:8rem">Nenhuma mídia adicionada</div>
                                            <q-img v-else-if="questionary.pages[selectedPageIndex].json_data.type === 'image'"  :src="questionary.pages[selectedPageIndex].json_data.src" :ratio="16/9"/>
                                            <q-video v-else-if="questionary.pages[selectedPageIndex].json_data.type === 'video'" :ratio="16/9" src="https://www.youtube.com/embed/k3_tw44QsZQ?rel=0"/>
                                        </div>
                                    </div>
                                </div>
                              </div>

                              <q-separator color="orange-8" style="padding-top:2px" class="q-mt-lg"/>

                              <div class="q-pt-md">
                                <b>Pergunta</b>
                                <q-input filled square autogrow v-model="questionary.pages[selectedPageIndex].question" label-color="orange-8" color="orange-8" class="col-12 q-mt-sm"/>
                              </div>

                              <div class="q-pt-md">
                                <b>Tipo de resposta</b>
                                <q-select filled square v-model="questionary.pages[selectedPageIndex].type_id"  :options="pageOptions" @input="configureResponseOptions" option-value="id" label-color="orange-8" option-label="desc" option-disable="inactive" emit-value map-options class="q-mt-sm" color="orange-8"></q-select>
                              </div>

                              <div v-if="[2, 3].includes(questionary.pages[selectedPageIndex].type_id)" >
                                <div class="flex justify-between q-pt-sm">
                                  <b class="q-pt-md">Opções de resposta</b>
                                  <div>
                                    <q-btn text-color="orange-8" class="q-pa-sm" flat dense title="Criar opção de resposta" label="Adicionar resposta" icon="add_circle" @click.prevent="isAddingResponseOption=!isAddingResponseOption"/>
                                  </div>
                                </div>

                                <div class="flex justify-between q-col-8 q-pt-xs">
                                  <div v-for="(option, index) in questionary.pages[selectedPageIndex].responseOptions" v-bind:key="index" style="width:100%">
                                      <q-input filled square autogrow v-model="option.response" label=" " label-color="orange-8" color="orange-8">
                                        <template v-slot:prepend>
                                          <div>
                                            <span style="font-size:1rem" >{{index + 1}}. </span>
                                            <q-checkbox  v-model="option.is_truth"  @input="(questionary.pages[selectedPageIndex].type_id === 2 && option.is_truth)? checkOnlyOption(index,1) : null" dense flat :title="option.is_truth ? 'Opção verdadeira': 'Opção falsa'" color="primary"/>
                                          </div>
                                        </template>
                                        <template v-slot:append>
                                          <q-btn flat dense rounded color="grey-3" text-color="red" @click="deleteResponseOption(index)" class="q-pa-sm" icon="delete"/>
                                        </template>
                                      </q-input>
                                      <q-separator></q-separator>
                                  </div>
                                  <div v-if="questionary.pages[selectedPageIndex].responseOptions.length === 0" class="q-pa-md bg-grey-3 q-mb-md" style="width:100%">
                                      <span style="font-size:0.9rem">Nenhuma opção de resposta criada</span>
                                  </div>
                                </div>

                                <div v-if="isAddingResponseOption">
                                    <div class="flex justify-between q-col-8 q-pt-sm">
                                      <q-input filled square v-model="newResponseOption.response" label=" " @keydown.enter.prevent="addResponseOption" label-color="orange-8" style="width:100%" color="orange-8">
                                        <template v-slot:prepend>
                                          <q-checkbox v-model="newResponseOption.is_truth" @input="(newResponseOption.is_truth)? checkOnlyOption(0,0) : null" title="Marcar somente se essa opção é verdadeira" dense color="primary" />
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

                              <div v-if="[4].includes(questionary.pages[selectedPageIndex].type_id)">
                                <div class="flex justify-between q-pt-sm">
                                  <b class="q-pt-md">{{(action === 'insert')? 'Estabelecer escala' : 'Escala estabelecida'}}</b>
                                  <div v-if="action === 'insert'">
                                    <q-btn text-color="blue" class="q-pa-sm" flat dense round title="Criar opção de resposta" icon="add_circle" @click.prevent="isAddingResponseOption=!isAddingResponseOption"/>
                                  </div>
                                </div>

                                <div class="flex justify-between align-bottom align-items-end">
                                    <div class="">
                                      <span style="font-size:0.9rem"> Limite inferior</span>
                                      <q-input filled square v-model="questionary.pages[selectedPageIndex].responseOptions[0].response" label=" " label-color="orange-8" color="orange-8">
                                          <template v-slot:prepend>
                                            <q-icon name="vertical_align_bottom" />
                                          </template>
                                        </q-input>
                                    </div>
                                    <div class="">
                                      <span style="font-size:0.9rem"> Limite superior</span>
                                      <q-input filled square v-model="questionary.pages[selectedPageIndex].responseOptions[1].response" label=" " label-color="orange-8" color="orange-8">
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

      <div class="col-12 flex q-my-md justify-between">
        <span class="q-mt-sm" style="font-size:1.2rem">Finalizar {{(action === 'insert') ? 'criação' : 'edição'}} do  questionário</span>
      </div>
      <q-separator  class="col-12 q-pa-none q-ma-none"></q-separator>
      <div class="q-my-md">
        <q-btn text-color="white" class="q-pa-sm q-mb-sm bg-orange-8" label="Guardar questionário"  title="Guardar questionário" icon="save" @click.prevent="showCriateNewPage"/>
      </div>
  </div>
</template>

<script>

export default {
  name: 'CrudQuestionary',

  props: {
    plane: null,
    action: null,
    questionaryItem: null
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
      editPage: null,
      newPage: {
        'id': 0,
        'type_id': 0, // 0: basic, 2: image, 3: video
        'question': '',
        'json_data': null
      },

      responseOptions: [],
      newResponseOptionScale: [
        { 'id': 0, 'question_id': 0, 'response': '', 'is_truth': true },
        { 'id': 0, 'question_id': 0, 'response': '', 'is_truth': true }
      ],
      newResponseOption: {
        'id': 0,
        'question_id': 0,
        'response': '',
        'is_truth': false
      },

      pageOptions: [
        { id: 1, desc: 'Resposta com seleção Sim ou Não' },
        { id: 2, desc: 'Resposta com seleção única' },
        { id: 3, desc: 'Resposta com múltipla escolha' },
        { id: 4, desc: 'Resposta em escala' },
        { id: 5, desc: 'Resposta em texto livre' }
      ],

      imageExtensions: ['.jpeg', '.jpg', '.pgn', '.bmp', '.gif', '.svg'],
      videoExtensions: ['.ogg', '.mkv', '.webm', '.ogv', '.vob', '.drc', '.avi', '.mov', '.wmv', '.yuv', '.rmvb', '.amv', '.m4p', '.mp4', '.mpg', '.mpeg', '.mpe', '.mpv', '.m2v', '.m4v', '.3gp'],
      isCreatingNewPage: false,
      isEditingMidia: false,
      isAddingMidia: false,
      isAddingResponseOption: false,
      selectedPageIndex: -1,
      showPainelPageList: false,
      tab: 'contentTab'
    }
  },

  methods: {
    // -------------------questionary functions-----------------------
    emitQuestionaryChangePlane () {
      this.$emit('onchangeplane')
    },

    // -------------------pages functions-----------------------------
    showCriateNewPage () {
      this.tab = 'contentTab'
      this.isCreatingNewPage = true
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

    // -------------------responseOptions functions-------------------
    configureResponseOptions () {

    },

    checkOnlyOption (index, isnew) {
      if (this.questionary.pages[this.selectedPageIndex].type_id === 2) {
        this.questionary.pages[this.selectedPageIndex].responseOptions.some((item, i) => {
          item.is_truth = false
        })
        if (isnew) {
          this.questionary.pages[this.selectedPageIndex].responseOptions[index].is_truth = true
          this.newResponseOption.is_truth = false
        } else {
          this.newResponseOption.is_truth = true
        }
      }
    },

    addResponseOption () {
      if (this.newResponseOption.response.trim() !== '') {
        this.questionary.pages[this.selectedPageIndex].responseOptions.push(Object.assign({}, this.newResponseOption))
        this.newResponseOption.response = ''
        this.newResponseOption.is_truth = false
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
        this.responseOptions.splice(index, 1)
        console.log(this.responseOptions)
        // console.log('>>>> OK')
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

    triggerPositive () {
      this.$q.notify({
        type: 'positive',
        message: `This is a "positive" type notification.`
      })
    },
    triggerNegative () {
      this.$q.notify({
        type: 'negative',
        message: `This is a "negative" type notification.`
      })
    },
    triggerWarning () {
      this.$q.notify({
        type: 'warning',
        message: `This is a "warning" type notification.`
      })
    },
    triggerInfo () {
      this.$q.notify({
        type: 'info',
        message: `This is a "info" type notification.`
      })
    }

  },

  watch: {
  },

  beforeMount () {
    if (this.action === 'display' || this.action === 'edit') {
      this.questionary = this.questionaryItem
    }
    if (this.questionary.pages && this.questionary.pages.length) {
      this.selectedPageIndex = 0
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
