<template>
  <div class="fixed-center text-center">
    <p><img src="~assets/custom/physiback.png" style="width:20vw;max-width:140px;"></p>
    <p class="text-faded"> Recurso não permitido </p>

    <!-- <q-btn color="secondary" style="width:200px;" @click="$router.replace({name: 'public.index'})"> -->
    <q-btn color="secondary" style="width:200px;" @click="$router.go(-1)">
      Voltar atrás
    </q-btn>
  </div>
</template>

<script>
export default {
  name: 'Error404',
  meta () {
    return {
      title: 'Página não permitida'
      // title: this.$t('page_titles.e404_title')
    }
  }
}
</script>
