<template>
    <div>
        <link href="/css/auth/materialdesignicons.min.css" rel="stylesheet">
        <link rel="stylesheet" href="/css/auth/bootstrap.min.css">
        <link rel="stylesheet" href="/css/auth/login.css">
        <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
            <div class="container">
                <div class="card login-card">
                    <div class="row no-gutters">
                        <div class="col-md-5">
                            <img src="/img/login.jpg" alt="login" class="login-card-img">
                        </div>
                        <div class="col-md-7">
                            <div class="card-body">
                                <div class="brand-wrapper">
                                    FSTORE
                                </div>
                                <p class="login-card-description">Войдите в свою учетную запись</p>
                                <form action="#">
                                    <div class="form-group">
                                        <label for="email" class="sr-only">Email</label>
                                        <input v-model="email" type="email" name="email" id="email" class="form-control"
                                               placeholder="Email address">
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="password" class="sr-only">Пароль</label>
                                        <input v-model="password" type="password" name="password" id="password"
                                               class="form-control" placeholder="***********">
                                    </div>
                                    <input v-on:click="send()" class="btn btn-block login-btn mb-4" type="button"
                                           value="Вход">
                                </form>
                                <!--                            <a href="https://www.bootstrapdash.com/demo/login-template-free-2/#!" class="forgot-password-link">Забыли пароль?</a>-->
                                <p class="login-card-footer-text"><a href="/registration" class="text-reset">Зарегестрироваться</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</template>

<script>
export default {
    name: "AuthComponent",
    data() {
        return {
            email: null,
            password: null,
        }
    },
    methods: {
        send: function () {
            axios
                .post('/api/auth', {
                    email: this.email,
                    password: this.password
                })
                .then(response => (
                    // console.log(response.data)
                    window.location.href = response.data
                ));
        }
    }
}
</script>

<style scoped>

</style>
