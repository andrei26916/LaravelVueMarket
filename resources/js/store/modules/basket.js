export default {
    action: {},
    mutations: {
        createBasket(state, newProduct){
            newProduct.count = 1;
            state.baskets.unshift({...newProduct});

            console.log(state.baskets)

            axios.post('/api/basket', {
                'product_id': newProduct.id,
                'count': newProduct.count,
            }).then(response => (console.log(response.data)));
        },

        updateCountProduct(state, {id, value}){
            state.baskets.forEach(function (item) {
                if (item.id === id){
                    item.count = value;

                    axios.post('/api/basket/' + id, {
                        count: value
                    }).then(response => (console.log(response.data)));
                }
            });
        },

        removeBasket(state, id) {
            state.baskets = state.baskets.filter(t => t.id !== id)

            axios.delete('/api/basket/' + id).then(response => (console.log(response.data)));

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
            if (!state.baskets.length){
                axios.get('/api/baskets').then(response => {response.data.forEach((element) => {
                    state.baskets.unshift({
                        count: element.count,
                        category_id: element.product.category_id,
                        created_at: element.product.created_at,
                        description: element.product.description,
                        id: element.product.id,
                        price: element.product.price,
                        rate: 0,
                        title: element.product.title,
                        updated_at: element.product.updated_at,
                        images: element.product.images,
                    });
                })});
            }

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
