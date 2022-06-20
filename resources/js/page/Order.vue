<template>
    <div v-if="state" class="order_success">
        <h1>Ваш заказ успешно оформлен!</h1>
        <i class="el-icon-success"></i>
        <p>Теперь вы можете следить за выполнением заказа в своем личном кабинете</p>
        <div class="btn">
            <router-link :to="{name: 'home'}" >
                <el-button >На главную</el-button>
            </router-link>
            <router-link :to="{name: 'orders'}" >
                <el-button type="primary" >Отслеживать заказ</el-button>
            </router-link>
        </div>
    </div>
    <div v-else>
        <h1>Оформить заказ</h1>
        <el-form ref="form" :model="form" :rules="rules" label-width="200px">
            <el-form-item label="Использовать профиль">
                <el-switch v-model="form.isProfile" @change="isProfile" ></el-switch>
            </el-form-item>

            <el-form-item label="ФИО получателя" prop="recipient">
                <el-input v-model="form.recipient" prop="recipient" placeholder="Иванов Иван Иванович" required></el-input>
            </el-form-item>
            <el-form-item label="Телефон получателя" prop="recipient_Phone">
                <el-input v-model="form.recipient_Phone" @input="acceptPhone" maxlength="11" show-word-limit placeholder="7 999 999-99-99"></el-input>
            </el-form-item>
            <el-form-item label="Адрес получателя" prop="recipient_Address">
                <el-input v-model="form.recipient_Address" placeholder="г. Москва, ул. Пушкина, д.1, кв 38"></el-input>
            </el-form-item>
            <el-form-item label="Способ оплаты">
                <el-radio-group v-model="form.payment">
                    <el-radio v-model="form.payment" label="0" disabled>Картой онлайн</el-radio>
                    <el-radio v-model="form.payment" label="1" >Наличными</el-radio>
                </el-radio-group>
            </el-form-item>
            <el-form-item label="Комментарии">
                <el-input type="textarea" v-model="form.comment"></el-input>
            </el-form-item>
        </el-form>
        <el-button style="width: 100%" type="primary" @click="submitForm('form')">Оформить заказ</el-button>
    </div>
</template>

<script>
import {mapGetters, mapMutations} from 'vuex';

    export default {
        name: "Order",
        computed: mapGetters(['getUser']),
        data() {
            return {
                state: false,
                profile: {
                    recipient: 'Иванов Иван Иванович',
                    recipient_Phone: '89996655540',
                },
                form: {
                    recipient: '',
                    recipient_Phone: '',
                    recipient_Address: '',
                    payment: '1',
                    isProfile: true,
                    comment: ''
                },
                rules: {
                    recipient: [
                        { required: true, message: 'Пожалуйста, введите ФИО получателя', trigger: 'blur' },
                        { min: 3, message: 'Длина должна быть от 3 символов', trigger: 'blur' }
                    ],
                    recipient_Phone: [
                        { required: true, message: 'Пожалуйста, введите Телефон получателя', trigger: 'change' },
                        { min: 11, message: 'Телефон должен быть 11 символов', trigger: 'blur' }
                    ],
                    recipient_Address: [
                        { required: true, message: 'Пожалуйста, введите Адрес получателя', trigger: 'change' },
                    ],
                }
            }
        },
        methods: {
            ...mapGetters(['allBasket']),
            isProfile (){
                if (this.form.isProfile){
                    this.form.recipient = this.profile.recipient;
                    this.form.recipient_Phone = this.profile.recipient_Phone;
                }else{
                    this.form.recipient = this.form.recipient_Phone = '';
                }
            },
            acceptPhone(){
                // /[0-9\s\+\-]|\./
                this.form.recipient_Phone = this.form.recipient_Phone.replace(/\D/g, '');
            },
            submitForm(formName) {
                this.$refs[formName].validate((valid) => {
                    if (valid) {
                        console.log(this.form);
                        axios
                            .post('/api/order/create', {
                                recipient: this.form.recipient,
                                recipient_phone: this.form.recipient_Phone,
                                recipient_address: this.form.recipient_Address,
                                payment: this.form.payment,
                                comments: this.form.comment,
                            })
                            .then(response => {
                                if (response.data === 'ok'){
                                    this.state = true;
                                }
                            });
                    } else {
                        console.log('error submit!!');
                        return false;
                    }
                });
            },
        },

        mounted() {
            this.isProfile();
        }
    }
</script>

<style scoped>

.order_success{
    display: flex;
    flex-wrap: wrap;
    flex-direction: column;
}
.order_success h1{
    text-align: center;
    font-size: 40px;
}

.order_success i{
    font-size: 100px;
    text-align: center;
    color: #4ac36f;
}
.order_success p{
    text-align: center;
    font-size: 18px;
    color: #4c4c4c;
}

.order_success .btn {
    margin: 0 auto;
}

</style>
