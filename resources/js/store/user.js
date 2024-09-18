const url = '/users';

export default {
    namespaced: true,
    state: {
        list: []
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
        }
    }
}
