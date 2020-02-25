<template>
  <div class="q-pa-md">
    <q-select v-model="language" :options="languages" emit-value map-options></q-select>
  </div>
</template>

<script>
import { mapActions, mapGetters } from 'vuex'
import _ from 'lodash'
export default {
  name: 'LangManager',
  data () {
    return {
      language: 'en'
    }
  },
  methods: {
    ...mapActions('lang', ['setLanguage']),
    findLang () {
      let language = _.find(this.languages, x => x.value === this.getLanguage)
      this.language = _.get(language, ['value'], 'en')
    }
  },
  beforeMount () {
    this.findLang()
    console.log(this.language)
  },
  watch: {
    language (item) {
      this.setLanguage([this.$i18n, item])
    }
  },
  computed: {
    ...mapGetters('lang', ['languages', 'getLanguage'])
  }

}
</script>

<style scoped>

</style>
