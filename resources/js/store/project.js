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
        setList(state, value) {
            state.list = value;
        },
        setProjectValue(state, {field, value}) {
            state[field] = value;
        }
    },
    actions: {
        async index({commit}) {
            return axios.get('/projects')
                .then(response => {
                    const list = response.data;

                    commit('setList', list);

                })
                .catch(error => {
                    console.log(error);
                    throw error;
                })
        },
        async create({commit}, data) {
            return axios.post('/projects', data)
                .catch(error => {
                    console.log(error);
                    throw error;
                })
        },
        async update({commit}, {id, data}) {
            return axios.put(`/projects/${id}`, data)
                .catch(error => {
                    console.log(error);
                    throw error;
                })
        },
        async delete({commit}, id) {
            return axios.delete(`/projects/${id}`)
                .catch(error => {
                    console.log(error);
                    throw error;
                })
        }
    }
}
