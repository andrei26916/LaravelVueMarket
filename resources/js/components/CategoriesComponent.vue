<template>
    <div style="display: flex;flex-direction: row;width: 100%;flex-wrap: wrap;">
        <div class="category" v-for="category in categories">
            <router-link style="text-decoration: none; color: #000;" :to="{name: 'category', params: {id: category.id}}">
                <h2>{{category.name}} </h2>
            </router-link>
            <div class="item">
                <div class="itemChildren" v-for="children in category.childrens">
                    <router-link :to="{name: 'category', params: {id: children.id}}">
                        {{children.name}}
                    </router-link>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "CategoriesComponent",
        data(){
            return {
                categories: []
            }
        },
        mounted() {
            axios.get('/api/categories').then(response => (this.categories = response.data));
        }
    }
</script>

<style scoped>

    .category{
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        margin-bottom: 30px;
        width: 350px;
    }

    a{
        color: #000;
        text-decoration: none;
    }

    .category h2{
        margin: 0;
    }

    .item{
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        margin-left: 0.5em;
        flex-wrap: wrap;
        align-content: stretch;
        justify-content: flex-start;
    }

    .item a{
        color: #2c3e50;
        text-decoration: none;
        margin: 10px 0 0;
    }
    .item a:hover{
      color: #e6a23c;
    }

    .itemChildren {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        margin-left: 2em;
        margin-top: 5px;
    }

</style>
