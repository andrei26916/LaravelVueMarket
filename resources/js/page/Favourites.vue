<template>
    <div>
      <div class="content">
        <h1>Избранное</h1>
      </div>
      <div class="content">
        <FavouritesComponent/>
      </div>
    </div>
</template>

<script>
    import FavouritesComponent from '../components/FavouritesComponent';
    export default {
        name: "Favourites",
        components: {
            FavouritesComponent,
        }
    }
</script>

<style scoped>
    div{
        width: 100%;
    }

    h1{
        text-align: left;
    }
</style>