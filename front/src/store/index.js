import Vue from 'vue';
import Vuex from 'vuex';

import Units from './modules/Units';

Vue.use(Vuex);

export default new Vuex.Store({

    modules: {
        Units
    }
})