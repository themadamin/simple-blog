export default {
    namespaced: true,
    state: {
        isAuthenticated: false,
        user: null,
        token: null,
        form: {
            name: null,
            email: null,
            password: null,
            password_confirmation: null
        }
    },
    mutations: {
        setAuthenticated(state, payload) {
            state.isAuthenticated = payload;
        },
        setUser(state, payload){
            state.user = payload
        },
        setToken(state, payload){
            state.token = payload
        },
        setFormField(state, { field, value }) {
            state.form[field] = value;
        }

    },
    actions: {
        async login({commit}, data){
            return axios.post('/auth/login', data)
                .then(response => {
                    const user = response.data.user
                    const token = response.data.token

                    commit('setAuthenticated', true);
                    commit('setUser', user);
                    commit('setToken', token);

                    localStorage.setItem('authToken', token);

                    axios.defaults.headers.common['Authorization'] = `Bearer ${token}`
                })
                .catch(error => {
                    console.log(error)
                    throw error;
                });
        },

        async logout({commit}){
            return axios.get('/auth/logout')
                .then(() => {
                    commit("setAuthenticated", false);
                    commit("setUser", null);
                    commit("setToken", null);

                    localStorage.removeItem('authToken');
                    delete axios.defaults.headers.common['Authorization'];
                })
                .catch(error => {
                    throw error;
                })
        },

        async registration({commit}, data){
            return axios.post('/auth/registration', data)
                .then(response => {
                    const token = response.data.token
                    const user = response.data.user

                    commit("setToken", token);
                    commit("setAuthenticated", true);
                    commit("setUser", user);

                    localStorage.setItem('authToken', token);

                    axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;
                })
                .catch(error => {
                    throw error;
                })
        }
    },

    getters: {
        user: state => state.user,
        token: state => state.token
    }
}
