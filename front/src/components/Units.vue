<template>
  <div>
    <div :key="unit.id" v-for="unit in allUnits">
      {{ unit.address }}

    </div>
  </div>
</template>

<script>
import { mapGetters, mapActions } from 'vuex';
export default {
    name: "Units",
    methods: {
      ...mapActions(['fetchUnits'])
    },
    computed: mapGetters(['allUnits']),
    created(){
      this.fetchUnits();
    }

}
</script>

<style>

</style>