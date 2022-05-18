<template>
    <div>

        <main>
            <div class="container">
                <div class="row">
                    <div class="col-md-6 align-self-center">
                        <img src="/img/404.png" alt="">
                    </div>
                    <div class="col-md-6 align-self-center">
                        <h1>404</h1>
                        <h2>UH OH! You're lost.</h2>
                        <p>Данной страницы не существует. Либо она была удалена. Пожалуйста вернитесь <router-link :to="{name: 'home'}">назад</router-link>.</p>
                    </div>
                </div>
            </div>
        </main>
    </div>
</template>

<script>
export default {
    name: "NotFoundComponent"
}

</script>

<style scoped>
@import url('https://fonts.googleapis.com/css?family=Nunito+Sans');
:root {
    --blue: #0e0620;
    --white: #fff;
    --green: #2ccf6d;
}
html,
body {
    height: 100%;
}
body {
    display: flex;
    align-items: center;
    justify-content: center;
    font-family:"Nunito Sans";
    color: var(--blue);
    font-size: 1em;
}
h1 {
    font-size: 7.5em;
    margin: 15px 0px;
    font-weight:bold;
}
h2 {
    font-weight:bold;
}

@media screen and (max-width:768px) {
    body {
        display:block;
    }
    .container {
        margin-top:70px;
        margin-bottom:70px;
    }
}
</style>
