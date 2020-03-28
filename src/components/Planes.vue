<template>
  <div class="row justify-left">
      <div class="col-xs-12 col-md-4 col-lg-3 col-lg-2 my-p2 q-py-md-xl">
          <div class="text-center my-p bg-light-green-1">
            <h5 class="q-ma-none">Starter</h5>
          </div>
          <q-list>
              <q-separator />
              <q-item >
                <q-item-section><q-item-label >Resposta com seleção Sim - Não</q-item-label></q-item-section>
                <q-item-section avatar><q-icon color="green" name="check_circle" /></q-item-section>
              </q-item>
              <q-separator />
              <q-item >
                <q-item-section><q-item-label>Resposta com seleção única</q-item-label></q-item-section>
                <q-item-section avatar><q-icon color="green" name="check_circle" /></q-item-section>
              </q-item>
              <q-separator />
              <q-item >
                <q-item-section><q-item-label>Resposta com múltipla escolha</q-item-label></q-item-section>
                <q-item-section avatar><q-icon color="red-7" name="cancel" /></q-item-section>
              </q-item>
              <q-separator />
              <q-item >
                <q-item-section><q-item-label>Resposta em escala</q-item-label></q-item-section>
                <q-item-section avatar><q-icon color="red-7" name="cancel" /></q-item-section>
              </q-item>
              <q-separator />
              <q-item >
                <q-item-section><q-item-label>Resposta em texto livre</q-item-label></q-item-section>
                <q-item-section avatar><q-icon color="red-7" name="cancel" /></q-item-section>
              </q-item>
              <q-separator />
              <q-item >
                <q-item-section><q-item-label>Adição de imagens</q-item-label></q-item-section>
                <q-item-section avatar><q-icon color="red-7" name="cancel" /></q-item-section>
              </q-item>
              <q-separator />
              <q-item >
                <q-item-section><q-item-label>Adição de videos</q-item-label></q-item-section>
                <q-item-section avatar><q-icon color="red-7" name="cancel" /></q-item-section>
              </q-item>
              <q-separator />
          </q-list>
          <div>
            <q-btn v-show="plane.code !== 1" class="q-pa-xs full-width" label="Selecionar" @click="selectPlane(1,'Starter')" color="orange-8" />
            <q-btn v-show="plane.code === 1"  class="q-pa-xs full-width" icon="check" label="Selecionado" color="green" />
          </div>
      </div>
      <div class="col-xs-12 col-md-4 col-lg-3 col-lg-2 my-p2 q-py-md-xl">
          <div class="text-center my-p bg-orange-2">
            <h5 class="q-ma-none">Ideal</h5>
          </div>
          <q-list>
              <q-separator />
              <q-item >
                <q-item-section><q-item-label >Resposta com seleção Sim - Não</q-item-label></q-item-section>
                <q-item-section avatar><q-icon color="green" name="check_circle" /></q-item-section>
              </q-item>
              <q-separator />
              <q-item >
                <q-item-section><q-item-label>Resposta com seleção única</q-item-label></q-item-section>
                <q-item-section avatar><q-icon color="green" name="check_circle" /></q-item-section>
              </q-item>
              <q-separator />
              <q-item >
                <q-item-section><q-item-label>Resposta com múltipla escolha</q-item-label></q-item-section>
                <q-item-section avatar><q-icon color="green" name="check_circle" /></q-item-section>
              </q-item>
              <q-separator />
              <q-item >
                <q-item-section><q-item-label>Resposta em escala</q-item-label></q-item-section>
                <q-item-section avatar><q-icon color="green" name="check_circle" /></q-item-section>
              </q-item>
              <q-separator />
              <q-item >
                <q-item-section><q-item-label>Resposta em texto livre</q-item-label></q-item-section>
                <q-item-section avatar><q-icon color="green" name="check_circle" /></q-item-section>
              </q-item>
              <q-separator />
              <q-item >
                <q-item-section><q-item-label>Adição de imagens</q-item-label></q-item-section>
                <q-item-section avatar><q-icon color="red-7" name="cancel" /></q-item-section>
              </q-item>
              <q-separator />
              <q-item >
                <q-item-section><q-item-label>Adição de videos</q-item-label></q-item-section>
                <q-item-section avatar><q-icon color="red-7" name="cancel" /></q-item-section>
              </q-item>
              <q-separator />
          </q-list>
          <div>
            <q-btn v-show="plane.code !== 2" class="q-pa-xs full-width" label="Selecionar" @click="selectPlane(2,'Ideal')" color="orange-8" />
            <q-btn v-show="plane.code === 2"  class="q-pa-xs full-width" icon="check" label="Selecionado" color="green" />
          </div>
      </div>
      <div class="col-xs-12 col-md-4 col-lg-3 col-lg-2 my-p2 q-py-md-xl">
          <div class="text-center my-p bg-orange-7">
            <h5 class="q-ma-none">Premium</h5>
          </div>
          <q-list>
              <q-separator />
              <q-item >
                <q-item-section><q-item-label >Resposta com seleção Sim - Não</q-item-label></q-item-section>
                <q-item-section avatar><q-icon color="green" name="check_circle" /></q-item-section>
              </q-item>
              <q-separator />
              <q-item >
                <q-item-section><q-item-label>Resposta com seleção única</q-item-label></q-item-section>
                <q-item-section avatar><q-icon color="green" name="check_circle" /></q-item-section>
              </q-item>
              <q-separator />
              <q-item >
                <q-item-section><q-item-label>Resposta com múltipla escolha</q-item-label></q-item-section>
                <q-item-section avatar><q-icon color="green" name="check_circle" /></q-item-section>
              </q-item>
              <q-separator />
              <q-item >
                <q-item-section><q-item-label>Resposta em escala</q-item-label></q-item-section>
                <q-item-section avatar><q-icon color="green" name="check_circle" /></q-item-section>
              </q-item>
              <q-separator />
              <q-item >
                <q-item-section><q-item-label>Resposta em texto livre</q-item-label></q-item-section>
                <q-item-section avatar><q-icon color="green" name="check_circle" /></q-item-section>
              </q-item>
              <q-separator />
              <q-item >
                <q-item-section><q-item-label>Adição de imagens</q-item-label></q-item-section>
                <q-item-section avatar><q-icon color="green" name="check_circle" /></q-item-section>
              </q-item>
              <q-separator />
              <q-item >
                <q-item-section><q-item-label>Adição de videos</q-item-label></q-item-section>
                <q-item-section avatar><q-icon color="green" name="check_circle" /></q-item-section>
              </q-item>
              <q-separator />
          </q-list>
          <div>
            <q-btn v-show="plane.code !== 3" class="q-pa-xs full-width" label="Selecionar" @click="selectPlane(3,'Premium')" color="orange-8" />
            <q-btn v-show="plane.code === 3"  class="q-pa-xs full-width" icon="check" label="Selecionado" color="green" />
          </div>
      </div>
  </div>
</template>

<script>
export default {
  name: 'Planes',

  props: {
    plane: { 'code': 0, 'name': 'Ideal' }
  },

  data () {
    return {

    }
  },

  methods: {
    selectPlane (code, name) {
      this.plane.code = code
      this.plane.name = name
      this.$emit('onselectedplane', this.plane)
    }
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
