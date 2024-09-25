import axios from '@/axios.js';

const url = '/users';

export default {
    namespaced: true,
    state: {
        list: [],
        transitions: []
    },
    mutations: {
        setUserValue(state, { field, value }) {
            state[field] = value;
        }
    },
    actions: {
        async index({commit}){
            await axios.get(url)
                .then(response => {
                    const list = response.data;

                    commit('setUserValue', {field: 'list', value: list});
                }).catch((error) => {throw error})
        },

        async create({commit},data){
            return axios.post(url, data).catch((error) => {throw error});
        },

        async update({commit}, {id, data}){
            return axios.post(`${url}/${id}`, data);
        },

        async delete({commit}, id){
            return axios.delete(`${url}/${id}`);
        },

        async statuses({commit}){
            await axios.get(`${url}/statuses`)
                .then(response => {
                    commit('setUserValue', {field: 'transitions', value: response.data})
                }).catch((error) => {throw error})
        },

        async change_status({commit}, {id, data}){
            await axios.put(`${url}/change-status/${id}`, data)
                .catch((error) => {
                   throw error;
                });
        }
    }
}
