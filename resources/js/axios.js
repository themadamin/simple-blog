import store from "@/store/index.js";


const instance= axios.create({
    baseURL: 'http://simple-blog.test/api',
    headers: {
        'Content-Type': 'application/json',
        'Authorization': `Bearer ${localStorage.getItem('token')}`,
    },
    withCredentials: true,
})

instance.interceptors.request.use((config) => {
    const token = localStorage.getItem('authToken')
    if (token) {
        store.commit('auth/setToken', token);
        store.commit('auth/setAuthenticated', true);

        config.headers['Authorization'] = `Bearer ${token}`;
    }
    return config
});

export default instance
