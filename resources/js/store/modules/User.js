export default {
    action: {},
    mutations: {
        createUser(state, user){
            state.user = user;
        },

        setAvatar(state, url){
            state.user.avatar_url = url;
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
