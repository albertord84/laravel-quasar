<template>
  <div class="row justify-left">
      <q-banner class="bg-cyan-2  flex justify-between">
        Plano <b>{{plane.name}}</b> selecionado.
        <q-btn flat color="primary" label="Trocar plano" @click.prevent="changePlane"/>
      </q-banner>
      <div class="row col-12 q-mt-lg">
        <b>Título do questionário</b>
        <q-input filled square v-model="questionary.name" label-color="orange-8" color="orange-8" class="col-12 q-mt-sm"/>
      </div>
      <div class="row col-12 q-mt-lg">
        <b>Introdução/Descrição</b>
        <q-input filled square autogrow v-model="questionary.description" label-color="orange-8" color="orange-8" class="col-12 q-mt-sm"/>
      </div>
      <div class="row col-12 q-mt-xl">
        <!-- <q-item clickable v-ripple class="flex"> -->
            <!-- <q-item-section avatar> -->
              <q-icon color="dark" size="md" name="file_copy" />
            <!-- </q-item-section> -->
              <p class="q-ml-md" style="font-size:1.5rem">Páginas</p>
            <!-- <q-item-section></q-item-section> -->
        <!-- </q-item> -->
      </div>
      <div class="row col-12">
            <q-separator inset spaced ></q-separator>
      </div>
      <div class="q-mt-lg">
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-md-3">
          <q-list bordered>

              <q-item clickable class="bg-orange-8" v-ripple>
                <q-item-section>Icon as avatar</q-item-section>
                <q-item-section avatar>
                  <!-- <q-icon color="primary" :name="keyboard_arrow_down" /> -->
                  <q-icon color="primary" :icon="[ {'keyboard_arrow_down': showPageQuestion ===true}, {'keyboard_arrow_down': showPageQuestion === false} ]"/>
                </q-item-section>
              </q-item>

              <q-item clickable v-ripple>
                <q-item-section>Avatar-type icon</q-item-section>
                <q-item-section avatar>
                  <q-avatar color="teal" text-color="white" icon="bluetooth" />
                </q-item-section>
              </q-item>

              <q-item clickable v-ripple>
                <q-item-section>Rounded avatar-type icon</q-item-section>
                <q-item-section avatar>
                  <q-avatar rounded color="purple" text-color="white" icon="bluetooth" />
                </q-item-section>
              </q-item>

              <q-item clickable v-ripple>
                <q-item-section>Letter avatar-type</q-item-section>
                <q-item-section avatar>
                  <q-avatar color="primary" text-color="white">
                    R
                  </q-avatar>
                </q-item-section>
              </q-item>
            </q-list>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-md-5">

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
        released: 0
      },
      showPageQuestion: true
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
