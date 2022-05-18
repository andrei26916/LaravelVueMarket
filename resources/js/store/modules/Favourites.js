export default {
    action: {},
    mutations: {
        createFavourites(state, newProduct){
            newProduct.count = 1;
            state.favourites.unshift({...newProduct});
        },

        removeFavourites(state, id) {
            state.favourites = state.favourites.filter(t => t.id !== id)

        }
    },
    state: {
        favourites: []
    },
    getters: {
        allFavourites(state){
            return state.favourites;
        },
        countFavourites(state){
            return state.favourites.length;
        },
    }
}