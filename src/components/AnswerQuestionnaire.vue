<template>
    <div style="margin-top:22px;">
      respondendo questionario
    </div>
</template>

<script>
// import { WebService } from '../../../services/WebService.js'

export default {
  name: 'AnswerQuestionnaire',

  props: {
    questionnaire: null
  },

  components: {
  },

  data () {
    return {
      loader: false,
      userLogged: {}
    }
  },

  methods: {
    showAllInvitations () {
      this.$emit('showAllInvitations')
    },

    aceptInvitation () {
      this.isAceptingInvitation = true
      this.isAceptingInvitation = false
      this.modalAceptInvitation = false
    }
  },

  watch: {
  },

  computed: {
  },

  beforeMount () {
    this.userLogged = this.$q.localStorage.getItem('user_data')
    console.log(this.selectedInvitation)
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
    }
  }

}
</script>

<style type="text/stylus" scoped>
    .image-background {
      /* background-image: url('../../../assets/custom/login-background.jpg'); */
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

    .title{
      font-size: 1.2em;
    }

    @media screen and (max-width: 600px) {
    .fill-window{
      height:calc(100vh - 200px)
    }
  }
</style>
