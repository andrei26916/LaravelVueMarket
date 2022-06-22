<template>
    <div>
        <h1>Изменить</h1>
        <UserUpdateComponent :user="this.user"/>
    </div>
</template>

<script>
import UserUpdateComponent from "../../components/UserUpdateComponent";
import axios from "axios";
export default {
    name: "AdminUser",
    components: {UserUpdateComponent},
    data(){
        return {
            user: {}
        }
    },
    mounted() {
        axios.get('/api/user/' + this.$route.params.id)
            .then(response => (this.user = response.data))
    }
}
</script>

<style scoped>

</style>
