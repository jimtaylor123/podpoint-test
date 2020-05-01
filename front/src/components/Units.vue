<template>
  <div>
    <div :key="unit.id" v-for="unit in allUnits" class="border-b border-gray-500">
      <div class="flex">

        <div class="w-1/7 p-2 text-center flex-initial">
          <svg class="stroke-current h-10 mx-auto" style="fill:#3CB44A;" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" id="Layer_1" x="0px" y="0px" viewBox="0 0 500 500" xml:space="preserve">
            <path class="st0" d="M268.6,99.9c-0.3,0-0.7-0.2-1-0.3c-29.6,46.6-59.1,93-89.1,140.2c19.6,0.5,38.3,1,57.5,1.5  c-0.8,28.4-1.4,56.3-2.2,84.4c0.3,0.1,0.5,0.2,0.8,0.3c29.6-46.5,59.2-92.9,88.9-139.9c-19.4-0.5-38.1-1-57.1-1.5  C267,156.1,267.8,128,268.6,99.9L268.6,99.9z"></path>
            <path class="st0" d="M250.9,491.4c-9.7,0-18.6-4.6-24.4-12.6l-125.9-170C76.6,276.4,64,238,64,197.6c0-103.1,83.9-187,187-187  s187,83.9,187,187c0,20.3-3.2,40.3-9.7,59.5c-4.9,14.6-11.6,28.5-19.9,41.4c-0.6,1.2-1.2,2.4-2.1,3.5l-6,8.1l-125,168.8  C269.5,486.7,260.4,491.4,250.9,491.4L250.9,491.4z M250.9,50.7c-81,0-147,65.9-147,147c0,31.7,10,61.9,28.8,87.4l118.2,159.6  l121.5-164c0.3-0.5,0.6-1.1,0.9-1.6c7.2-10.8,12.9-22.4,17-34.6c5-15,7.6-30.8,7.6-46.8C397.9,116.6,331.9,50.7,250.9,50.7  L250.9,50.7z"></path>
          </svg>
        </div>
  
        <div class="w-4/7 p-2 text-left text-gray-800 flex-auto">
          <div class="font-semibold">
            {{ unit.data.name }}
          </div>
          <div class="text-xs">
            {{ unit.data.address }} - {{ unit.data.postcode }}  
          </div>
        </div>
  
        <div class="w-2/7 text-center p-2 text-sm flex-wrap antialiased flex-initial mr-2">
          <div class="font-normal uppercase"  v-bind:class="[ isCharging(unit) ? 'text-orange-500' : 'text-podpoint-green' ]">
            {{ unit.data.status }}
          </div>
          <div @click="updateCharge(unit)" class="text-sm text-gray-100 px-2 py-1 font-semibold cursor-pointer" v-bind:class="[ isCharging(unit) ? 'bg-orange-500' : 'bg-podpoint-green' ]">
             {{ unit.data.status === 'charging'? 'Stop' : 'Start' }}
          </div>
        </div>
  
      </div>

      <div class="text-xs text-hairline text-center p-1 text-gray-800">
        {{ numberOfCharges(unit) }}
      </div>

    </div>
  </div>
</template>

<script>
import { mapGetters, mapActions } from 'vuex';
export default {
    name: "Units",
    methods: {
      ...mapActions(['fetchUnits', 'startCharging', 'stopCharging']),
       numberOfCharges(unit){
        return unit.data.charges.length === 0? 'No charges yet' : `${unit.data.charges.length} charges`;
      },
      isCharging(unit){
        return unit.data.status === 'charging'
      },
      updateCharge(unit){
        if(this.isCharging(unit)){
          const charge = unit.data.charges.filter(charge => charge.end == null).pop();
          this.stopCharging([unit, charge]);
        } else {
          this.startCharging(unit);
        }
      }
    },
    computed: {
      ...mapGetters(['allUnits']),
    },
    created(){
      this.fetchUnits();
    }

}
</script>

<style>

</style>