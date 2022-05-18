export default {
    action: {},
    mutations: {
        createUser(state, user){
            state.user = user;
        },

        removeUser(state, id) {
            state.user = {}

        }
    },
    state: {
        user: {},
    },
    getters: {
        getUser(state){
            return state.user;
        }
    }
}