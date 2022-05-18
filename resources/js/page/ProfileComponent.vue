<template>

    <div class="container">
        <div class="row">
            <div class="col-3 col-xl-1">
                <div class="profile-header">
                    <img src="/img/no_photo.jpg" alt="">
                </div>
            </div>
            <div class="col">
                <H1>{{ this.name }}</H1>
                <hr class="my-2">
                <div class="row">
                    <div class="col-xl-2">
                        <h6>Имя: </h6>
                    </div>
                    <div class="col-xl-3">
                        <div class="input-group input-group-sm mb-3">
                            <input type="text" class="form-control" aria-label="Small"
                                   aria-describedby="inputGroup-sizing-sm" v-model="name" :disabled="disabled">
                        </div>
                    </div>
                    <div class="col-xl-2">
                        <button v-if="disabled" v-on:click="disabled = (!disabled)" type="button" class="btn btn-outline-warning btn-sm">Изменить данные</button>
                        <button v-else v-on:click="save" type="button" class="btn btn-outline-success btn-sm">Сохранить</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-2">
                        <h6>Почта: </h6>
                    </div>
                    <div class="col-xl-3">
                        <div class="input-group input-group-sm mb-3">
                            <input type="email" class="form-control" aria-label="Small"
                                   aria-describedby="inputGroup-sizing-sm" v-model="email" :disabled="disabled">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-2">
                        <h6>Телефон: </h6>
                    </div>
                    <div class="col-xl-3">
                        <div class="input-group input-group-sm mb-3">
                            <input type="text" class="form-control" aria-label="Small"
                                   aria-describedby="inputGroup-sizing-sm" v-model="phone" :disabled="disabled">
                        </div>
                    </div>
                </div>
                <hr class="my-2">
                <div class="row">
                    <div class="col-xl-2">
                        <h6>Пароль: </h6>
                    </div>
                    <transition name="phone">
                    <div class="col-xl-3" v-if="!disabledPassword">
                        <div class="input-group input-group-sm mb-3">
                            <input type="password" class="form-control" aria-label="Small" placeholder="новый пароль"
                                   aria-describedby="inputGroup-sizing-sm" v-model="password" min="8">
                        </div>
                    </div>
                    </transition>
                    <div class="col-xl-2">
                        <button v-if="disabledPassword" v-on:click="disabledPassword = (!disabledPassword)" type="button" class="btn btn-outline-warning btn-sm">Изменить пароль</button>
                        <button v-else v-on:click="resetPassword" type="button" class="btn btn-outline-success btn-sm"> <span v-if="this.password">Сохранить</span> <span v-else>Закрыть</span> </button>
                    </div>
                </div>

            </div>
        </div>


    </div>

</template>

<script>
import Vue from "vue";
import {TYPE} from "vue-toastification";

export default {
    name: "ProfileComponent",
    data() {
        return {
            name: null,
            phone: null,
            email: null,
            password: null,
            disabled: true,
            disabledPassword: true,
        }
    },
    mounted() {
        axios
            .get('/api/user')
            .then(response => (
                this.phone = response.data.phone,
                this.email = response.data.email,
                this.name = response.data.name
            ));
        console.log(this.profile)

    },
    methods :{
        save: function (){
            axios
                .post('/api/profile', {
                    name: this.name,
                    phone: this.phone,
                    email: this.email,
                })
                .then(response => (
                    this.disabled = true
                ));
        },
        resetPassword: function (){
            if (this.password) {
                if (this.password.length < 8){
                    Vue.$toast("Минимум 8 символов", {
                        timeout: 4000,
                        type: TYPE.WARNING,
                    });
                    return;
                }
                axios
                    .post('/api/profile/password', {
                        password: this.password,
                    })
                    .then(response => (
                        this.disabledPassword = true
                    ));
            }
            this.disabledPassword = true

        }



    }
}
</script>

<style scoped>
.phone-enter-active, .phone-leave-active {
    transition: all .5s;
}

.phone-enter, .phone-leave-to{
    transform: translateX(-100px);
    opacity: 0;
}
</style>
