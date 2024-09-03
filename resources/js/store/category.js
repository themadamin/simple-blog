export default {
    namespaced: true,
    state: {
        name: {type: String, default: null},
        thumbnail: null,
        list: []
    },
    mutations: {
        setList(state, value){
            state.list = value;
        },
        setCategoryValue(state, { field, value }) {
            state[field] = value;
        }
    },
    actions: {
        async index({commit}){
            return axios.get('/categories')
                .then(response => {
                    const list = response.data;

                    commit('setList', list);

                })
                .catch(error => {
                    console.log(error);
                    throw error;
                })
        },
        async create({commit},data){
            return axios.post('/categories', data)
                .catch(error => {
                    console.log(error);
                    throw error;
                })
        },
        async update({commit}, {id, data}){
            return axios.put(`/categories/${id}`, data)
                .catch(error => {
                    console.log(error);
                    throw error;
                })
        },
        async delete({commit}, id){
            return axios.delete(`/categories/${id}`)
                .catch(error => {
                    console.log(error);
                    throw error;
                })
        }
    }
}
