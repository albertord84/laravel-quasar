<template>
    <q-page class="bg-gray q-pa-md">
      <h6 class="q-mb-none gt-sm">Contátenos</h6>
      <p class="q-mt-xl q-mb-none lt-md">Contátenos</p>

      <div class="col-12 q-mt-lg">
        <label>Assunto:</label>
        <q-input filled square v-model="message.subject" label-color="orange-8" color="orange-8" class="col-12 q-mt-sm"/>
      </div>
      <div class="col-12 q-mt-lg">
        <label>Mensagem:</label>
        <q-input filled square type="textarea" :input-style="{ minHeight: '300px'}" v-model="message.content" label-color="orange-8" color="orange-8" class="col-12 q-mt-sm"/>
      </div>
      <div class="col-12 q-mt-lg text-right">
        <q-btn text-color="white" class="q-pa-sm q-mb-sm bg-orange-8" label="Enviar mensagem"  title="Guardar questionário" icon="send" @click.prevent="showCriateNewPage"/>
      </div>

    </q-page>
</template>

<script>
export default {
  name: 'Questionaries',

  components: {
  },

  data () {
    return {
      loader: false,
      message: {
        subject: '',
        content: ''
      }
    }
  },

  methods: {

  },

  watch: {

  },

  computed: {
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
      title: this.$t('page_titles.login_title')
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
</style>
