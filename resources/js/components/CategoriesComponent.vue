<template>
    <div style="display: flex;flex-direction: row;width: 100%;flex-wrap: wrap;">
        <div class="category" v-for="category in categories">
            <h2>{{category.name}}</h2>
            <div class="item">
                <div class="itemChildren" v-for="children in category.children">
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
                categories: [
                    {
                        id: 1, name: 'Удилище', children: [
                            {id: 3, name: 'Спиннинговые '},
                            {id: 4, name: 'Маховые '},
                            {id: 5, name: 'Фидерные '},
                            {id: 6, name: 'Болонские '},
                            {id: 16, name: 'Кастинговые'},
                            {id: 26, name: 'Cбирулино'},
                            {id: 36, name: 'Карповые'},
                            {id: 36, name: 'Матчевые'},
                        ]
                    },
                    {
                        id: 1, name: 'Приманки', children: [
                            {id: 3, name: 'Воблеры '},
                            {id: 4, name: 'Мормышки '},
                            {id: 5, name: 'БЛЕСНЫ'},
                            {id: 6, name: 'ДЖИГОВЫЕ ОСНАСТКИ'},
                            {id: 7, name: 'МЫШИ'},
                            {id: 7, name: 'СИЛИКОНОВЫЕ ПРИМАНКИ'},
                            {id: 7, name: 'ЛЯГУШКИ'},
                            {id: 7, name: 'НАЖИВКА'},
                        ]
                    },
                    {
                        id: 1, name: 'Рыболовные снасти ', children: [
                            {id: 3, name: 'ОСНАСТКИ'},
                            {id: 4, name: 'ГОТОВЫЕ СНАСТИ'},
                            {id: 5, name: 'ИНСТРУМЕНТЫ'},
                            {id: 6, name: 'ВСЁ ДЛЯ ВЯЗАНИЯ МУШЕК'},
                            {id: 7, name: 'ПОДСАКИ, САДКИ'},
                            {id: 7, name: 'ДЕРЖАТЕЛИ УДИЛИЩ'},
                            {id: 7, name: 'РАЗНОЕ-ПОЛЕЗНОЕ'},
                        ]
                    },
                    {
                        id: 1, name: 'Снаряжение ', children: [
                            {id: 3, name: 'Лодки'},
                            {id: 4, name: 'Насосы'},
                            {id: 5, name: 'СПАС ЖИЛЕТЫ'},
                            {id: 6, name: 'АКСЕССУАРЫ ДЛЯ НАСОСОВ'},
                            {id: 7, name: 'СИДЕНЬЯ ДЛЯ ЛОДОК'},
                            {id: 7, name: 'ДЕРЖАТЕЛИ УДИЛИЩ'},
                            {id: 7, name: 'РАЗНОЕ-ПОЛЕЗНОЕ'},
                        ]
                    },
                ]
            }
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