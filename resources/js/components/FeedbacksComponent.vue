<template>
    <div>
        <h1>Отзывы</h1>
        <div class="feedbacks" v-for="feedback in feedbacks">
            <div class="avatars">
                <el-image
                        style="width: 50px; height: 50px; border-radius: 100%"
                        :src="feedback.user.avatar"
                        fit="cover">
                </el-image>
            </div>
            <div class="feedback">
                <h3>{{feedback.user.login}}</h3>
                <el-rate v-model="feedback.rate" disabled />
                <p>{{feedback.text}}</p>

            </div>
        </div>
        <el-button>Загрузить ещё</el-button>
    </div>
</template>

<script>
    export default {
        name: "FeedbacksComponent",
        data(){
            return {
                rate: 3.4,
                feedbacks: [
                    {
                        id: 1,
                        rate: 3.4,
                        text: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad asperiores blanditiis dolore esse facilis, fuga magni nam nisi officia provident quia recusandae, sed? A animi fuga inventore pariatur rerum!',
                        user: {
                            id: 4,
                            login: 'user2355',
                            avatar: 'https://fuss10.elemecdn.com/e/5d/4a731a90594a4af544c0c25941171jpeg.jpeg'
                        }
                    },
                    {
                        id: 1,
                        rate: 1.4,
                        text: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad asperiores blanditiis dolore esse facilis, fuga magni nam nisi officia provident quia recusandae, sed? A animi fuga inventore pariatur rerum!',
                        user: {
                            id: 4,
                            login: 'andrei',
                            avatar: 'https://fuss10.elemecdn.com/e/5d/4a731a90594a4af544c0c25941171jpeg.jpeg'
                        }
                    },
                    {
                        id: 1,
                        rate: 4.4,
                        text: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad asperiores blanditiis dolore esse facilis, fuga magni nam nisi officia provident quia recusandae, sed? A animi fuga inventore pariatur rerum!',
                        user: {
                            id: 4,
                            login: 'user25',
                            avatar: 'https://fuss10.elemecdn.com/e/5d/4a731a90594a4af544c0c25941171jpeg.jpeg'
                        }
                    },
                ]
            }
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