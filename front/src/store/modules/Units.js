import Axios from "axios";

const state = {
    units : []
};

const getters = {
    allUnits: (state) => state.units
};

const actions = {
    async fetchUnits({commit}){
        const response = await Axios.get(process.env.VUE_APP_API_URL+'units');
        commit('setUnits', response.data.data);
    },
    async startCharging({commit}, unit){
        const response = await Axios.post(process.env.VUE_APP_API_URL+'units/'+unit.data.id);
        commit('updateUnit', response.data.data);
    },
    async stopCharging({commit}, [unit, charge]){
        const response = await Axios.patch(
            process.env.VUE_APP_API_URL+'units/'+unit.data.id+'/charges/'+charge.id
        );
        commit('updateUnit', response.data.data);
    },
};

const mutations = {
    setUnits: (state, units) => (state.units = units),
    updateUnit (state, data) {
        const unit =  state.units.find(item => item.data.id === data.id)
        Object.assign(unit.data, data);
    }
};

export default {
    state, 
    getters,
    actions,
    mutations
};