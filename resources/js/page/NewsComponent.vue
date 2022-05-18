<template>
    <div class="container">
        <div v-if="loading" style="display: flex;align-items: center;justify-content: center;margin-top: 200px;">
            <div class="spinner-grow" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>

        <div v-for="(article, key) in articles" :key="article.id" class="jumbotron" style="background: none;">
            <h1 class="display-4">{{ article.title }}</h1>
            <p class="lead">{{ article.description }}</p>
            <hr class="my-2">
        </div>
    </div>
</template>

<script>
export default {
    name: "NewsComponent",
    data() {
        return {
            articles: [],
            loading: true,
            errored: false
        }
    },
    async mounted() {
        await axios
            .get('/api/articles')
            .then(response => (this.articles = response.data))
            .catch(error => {
                console.log(error);
                this.errored = true;
            })
            .finally(() => (this.loading = false));

        console.log(this.articles);
    }
}
</script>

<style scoped>

</style>
