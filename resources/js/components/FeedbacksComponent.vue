<template>
    <div>
        <div v-if="this.authorisation()">
        <h2>Оставить отзыв</h2>
        <el-form ref="form" :model="form" label-width="120px">
            <el-form-item label="Рейтинг">
                <el-rate v-model="form.rate" />
            </el-form-item>
            <el-form-item label="Отзыв">
                <el-input type="textarea" v-model="form.text"></el-input>
            </el-form-item>
            <el-form-item>
                <el-button type="primary" @click="onSubmit">Отправить</el-button>
            </el-form-item>
        </el-form>
        </div>
        <h1>Отзывы</h1>
        <div class="feedbacks" v-for="feedback in feedbacks">
            <div class="avatars">
                <el-image
                        style="width: 50px; height: 50px; border-radius: 100%"
                        :src="feedback.user.avatar_url"
                        fit="cover">
                </el-image>
            </div>
            <div class="feedback">
                <h3>{{feedback.user.login}}</h3>
                <el-rate v-model="feedback.rate" disabled />
                <p>{{feedback.text}}</p>

            </div>
        </div>
    </div>
</template>

<script>
    import {mapGetters} from "vuex";

    export default {
        name: "FeedbacksComponent",
        props: ['feedbacks'],
        data(){
            return {
                rate: 3.4,
                form: {
                    rate: 0,
                    text: ''
                },
                check: false,
                // feedbacks: [
                //     {
                //         id: 1,
                //         rate: 3.4,
                //         text: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad asperiores blanditiis dolore esse facilis, fuga magni nam nisi officia provident quia recusandae, sed? A animi fuga inventore pariatur rerum!',
                //         user: {
                //             id: 4,
                //             login: 'user2355',
                //             avatar: 'https://fuss10.elemecdn.com/e/5d/4a731a90594a4af544c0c25941171jpeg.jpeg'
                //         }
                //     },
                //     {
                //         id: 1,
                //         rate: 1.4,
                //         text: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad asperiores blanditiis dolore esse facilis, fuga magni nam nisi officia provident quia recusandae, sed? A animi fuga inventore pariatur rerum!',
                //         user: {
                //             id: 4,
                //             login: 'andrei',
                //             avatar: 'https://fuss10.elemecdn.com/e/5d/4a731a90594a4af544c0c25941171jpeg.jpeg'
                //         }
                //     },
                //     {
                //         id: 1,
                //         rate: 4.4,
                //         text: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad asperiores blanditiis dolore esse facilis, fuga magni nam nisi officia provident quia recusandae, sed? A animi fuga inventore pariatur rerum!',
                //         user: {
                //             id: 4,
                //             login: 'user25',
                //             avatar: 'https://fuss10.elemecdn.com/e/5d/4a731a90594a4af544c0c25941171jpeg.jpeg'
                //         }
                //     },
                // ]
            }
        },
        methods: {
            ...mapGetters(['getUser']),
            onSubmit(){
                axios.post('/api/feedback/create', {
                    product_id: this.$route.params.id,
                    rate: this.form.rate,
                    text: this.form.text,
                }).then(response => {
                    this.feedbacks.unshift(response.data)
                    this.check = false;
                });
            },
            authorisation(){
                let check = false;
                if (this.getUser()) {
                    if (Object.keys(this.getUser()).length > 0){
                        check = true;
                    }
                }
                return check;
            },
        }
    }
</script>

<style scoped>
    h1{
        text-align: left;
    }

    .feedbacks{
        display: flex;
        align-items: flex-start;
        justify-content: flex-start;
        margin-bottom: 20px;
    }

    .feedback{
        text-align: left;
    }

    .feedback h3{
        margin: 0;
    }

    .avatars{
        width: 50px;
        margin-right: 10px;
    }
</style>
