import Axios from "axios";

const state = {
    units : []
};

const getters = {
    allUnits: (state) => state.units
};

const actions = {
    async fetchUnits({commit}){
        const response = await Axios.get('http://178.62.72.14:8000/api/units');
        commit('setUnits', response.data);
    }
};

const mutations = {
    setUnits: (state, units) => (state.units = units) 
};

export default {
    state, 
    getters,
    actions,
    mutations
};