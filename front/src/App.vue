<template>
  <div id="app" class="container mx-auto max-w-5xl flex flex-col h-screen">

    <!-- Header -->
    <div class="bg-podpoint-green text-white text-2xl antialized py-5 text-center flex-initial font-normal">
      Units
    </div>

    <!-- Main -->
    <div class="bg-podpoint-gray flex-grow">

      <Units />

    </div>

    <!-- Footer -->
    <div class="bg-white py-2 text-center flex-initial flex border-t border-gray-500">
      <!-- Star -->
      <div class="w-1/3">
        <svg class="h-6 font-hairline mx-auto" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1000 1000" enable-background="new 0 0 1000 1000" xml:space="preserve">
          <metadata> Svg Vector Icons : http://www.onlinewebfonts.com/icon </metadata>
          <g>
            <path d="M497.1,102.5l121,244.9l10.5,21.2l23.4,3.3c0.7,0.1,68,9.6,139.4,20.9c70,11.1,109.9,18.7,132.6,23.5L726.9,600.2l-18.6,17.3l5.3,24.8c0.1,0.7,14.2,66.3,28.2,135.8c13,64.5,20.1,102.9,23.9,125.5L519.4,780l-21.3-10.7l-20.7,11.7c-0.6,0.3-59,33.1-122.5,66.8c-63.6,33.7-100.4,51.4-121.4,60.7l51.6-267l4.9-25.2l-19.3-16.9c-0.5-0.4-50.4-44.2-102.7-91.2c-48.4-43.6-76.6-70.1-93-86.1l273.9-50.4l23.3-4.3l9.6-21.6c0.3-0.6,26.8-60.5,56.5-123.9C468.3,157.4,486.5,121.9,497.1,102.5 M498.5,36.8c-6.3,0-13.3,3.1-20.3,12.4C452.4,75,340.8,327.5,340.8,327.5L28.3,385c0,0-30.8,11.7-12.5,39.2c18.3,27.5,225.4,208.7,225.4,208.7l-58.7,303.7c0,0-3.8,26.2,29.4,26.2S499.3,820,499.3,820l284.8,142.9c0,0,1.9,0.3,4.7,0.3c8.6,0,26.2-3.1,26.2-28.2c0-33.3-57.5-302-57.5-302L985.7,420c0,0,15.8-20.8-13.3-36.7c-29.2-15.8-314.1-55.8-314.1-55.8L520.8,49.2C520.8,49.2,511.1,36.8,498.5,36.8L498.5,36.8z"/></g>
        </svg>
        <p class="font-medium text-center text-xs">
            Favourites
        </p>
      </div>

      <!-- Chargepoint -->
        <div class="w-1/3 text-podpoint-green">
          <svg class="stroke-current h-6 font-hairline mx-auto" style="fill:#3CB44A;" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" id="Layer_1" x="0px" y="0px" viewBox="0 0 500 500" xml:space="preserve">
            <path class="st0" d="M268.6,99.9c-0.3,0-0.7-0.2-1-0.3c-29.6,46.6-59.1,93-89.1,140.2c19.6,0.5,38.3,1,57.5,1.5  c-0.8,28.4-1.4,56.3-2.2,84.4c0.3,0.1,0.5,0.2,0.8,0.3c29.6-46.5,59.2-92.9,88.9-139.9c-19.4-0.5-38.1-1-57.1-1.5  C267,156.1,267.8,128,268.6,99.9L268.6,99.9z"></path>
            <path class="st0" d="M250.9,491.4c-9.7,0-18.6-4.6-24.4-12.6l-125.9-170C76.6,276.4,64,238,64,197.6c0-103.1,83.9-187,187-187  s187,83.9,187,187c0,20.3-3.2,40.3-9.7,59.5c-4.9,14.6-11.6,28.5-19.9,41.4c-0.6,1.2-1.2,2.4-2.1,3.5l-6,8.1l-125,168.8  C269.5,486.7,260.4,491.4,250.9,491.4L250.9,491.4z M250.9,50.7c-81,0-147,65.9-147,147c0,31.7,10,61.9,28.8,87.4l118.2,159.6  l121.5-164c0.3-0.5,0.6-1.1,0.9-1.6c7.2-10.8,12.9-22.4,17-34.6c5-15,7.6-30.8,7.6-46.8C397.9,116.6,331.9,50.7,250.9,50.7  L250.9,50.7z"></path>
          </svg>
          <p class="font-medium text-center text-xs">
              Units
          </p>
        </div>

      <!-- Account -->
         <div class="w-1/3">
          <svg class="stroke-current h-6 font-hairline mx-auto" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1000 1000" enable-background="new 0 0 1000 1000" xml:space="preserve">
            <metadata> Svg Vector Icons : http://www.onlinewebfonts.com/icon </metadata>
            <g>
              <path d="M500,559.4c-109.5,0-198.6-89.1-198.6-198.7c0-109.5,89.1-198.6,198.6-198.6c109.5,0,198.6,89.1,198.6,198.6C698.6,470.3,609.5,559.4,500,559.4z M500,203.3c-86.8,0-157.4,70.6-157.4,157.5c0,86.9,70.6,157.5,157.4,157.5c86.8,0,157.5-70.6,157.5-157.5C657.4,273.9,586.8,203.3,500,203.3z"/>
              <path d="M812.7,870.9c-11.4,0-20.6-9.2-20.6-20.6c0-160.5-131-291.1-292.1-291.1c-161,0-292,130.6-292,291.1c0,11.4-9.2,20.6-20.6,20.6c-11.4,0-20.6-9.2-20.6-20.6C166.8,667.1,316.3,518,500,518c183.7,0,333.3,149.1,333.3,332.3C833.2,861.7,824,870.9,812.7,870.9z"/>
              <path d="M500,990C229.8,990,10,770.2,10,500C10,229.8,229.8,10,500,10c270.1,0,490,219.8,490,490C990,770.2,770.2,990,500,990z M500,51.2C252.5,51.2,51.2,252.5,51.2,500c0,247.5,201.3,448.8,448.9,448.8c247.5,0,448.8-201.3,448.8-448.8C948.8,252.5,747.5,51.2,500,51.2z"/>
            </g>
          </svg>
        <p class="font-medium text-center text-xs">
            Account
        </p>
      </div>
    </div>

  </div>
</template>

<script>
import './assets/css/app.css'
import Units from './components/Units'

export default {
  name: 'App',
  components: {
    Units
  }
}
</script>
