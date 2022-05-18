export default {
    action: {},
    mutations: {
        createBasket(state, newProduct){
            newProduct.count = 1;
            state.baskets.unshift({...newProduct});
        },

        updateCountProduct(state, {id, value}){
            console.log(id);
            console.log(value);
            state.baskets.forEach(function (item) {
                if (item.id === id){
                    console.log(item);
                    item.count = value;
                }
            });
        },

        removeBasket(state, id) {
            state.baskets = state.baskets.filter(t => t.id !== id)

        }
    },
    state: {
        baskets: [
        ],
    },
    getters: {
        countBasket(state){
            return state.baskets.length;
        },
        allBasket(state){
            return state.baskets;
        },
        resultBasket(state){
            let prices = 0;
            let productCount = 0;

            state.baskets.forEach(function (item) {
                prices = prices + (item.price * item.count);
                productCount = productCount + item.count
            });


            return {
                prices: prices,
                productCount: productCount,
            }
        },
    }
}