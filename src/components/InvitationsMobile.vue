<template>
  <div>
    <div  v-for="(invitation, index) in allInvitations" :key="index" @click.prevent="$emit('setSelectInvitation', invitation, index) /*setSelectInvitation(invitation, index)*/">
      <q-item bordered clickable class="q-py-md" style="border-bottom:solid 1px #f5f5f5">
        <q-item-section v-if="invitation.accepted" top avatar class="text-center">
            <q-avatar color="primary" rounded text-color="white" square icon="album" />
            <span style="margin-left: 5px; font-size:0.55rem">ACEITA</span>
            <span style="font-size:0.55rem; color:#4caf50">+ R$ {{invitation.Campaign.Questionnaire.Plane.recompense}}.00</span>
        </q-item-section>
        <q-item-section v-else top avatar class="text-center">
            <q-avatar color="negative" rounded text-color="white" square icon="block" />
            <span style="margin-left:-3px; font-size:0.55rem">REJEITADA</span>
            <span style="font-size:0.55rem; color:#f44336; text-decoration: line-through;"> R$ {{invitation.Campaign.Questionnaire.Plane.recompense}}.00</span>
        </q-item-section>

        <q-item-section>
          <q-item-label>{{invitation.Campaign.name}}</q-item-label>
          <q-item-label caption style="font-size:0.7rem">Potenciado por: {{invitation.Company.fantasy_name}}</q-item-label>
          <q-item-label caption class="q-mx-none q-px-none">{{invitation.Campaign.description.slice(0,86)}}...</q-item-label>
        </q-item-section>
      </q-item>
    </div>
  </div>
</template>

<script>
export default {
  name: 'InvitationsMobile',

  props: {
    allInvitations: {}
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
  },

  beforeMount () {
    this.userLogged = this.$q.localStorage.getItem('user_data')
  }
}
</script>

<style type="text/stylus" scoped>

</style>
