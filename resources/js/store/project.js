import axios from '@/axios.js';

const url = '/projects';
export default {
    namespaced: true,
    state: {
        category_id: {type: Number, default: null},
        title: {type: String, default: null},
        body: {type: String, default: null},
        thumbnail: null,
        list: []
    },
    mutations: {
        setProjectValue(state, {field, value}) {
            state[field] = value;
        }
    },
    actions: {
        async index({commit}) {
            return await axios.get(url)
                .then(response => {
                    const list = response.data;

                    commit('setProjectValue', {field: 'list', value: list});
                });
        },
        async create({commit}, data) {
            return axios.post(url, data)
        },
        async update({commit}, {id, data}) {
            return axios.post(`${url}/${id}`, data)
        },
        async delete({commit}, id) {
            return axios.delete(`${url}/${id}`)
        }
    }
}
