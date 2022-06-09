<template>
    <UserListComponent :users="this.users" />
</template>

<script>
import UserListComponent from "../../components/UserListComponent";
export default {
name: "AdminUsers",
    components: {UserListComponent},
    data(){
        return {
            users: []
        }
    },
    mounted() {
        axios.post('/api/users').then(response => (this.users = response.data));
        console.log(this.users)
    }
}
</script>

<style scoped>

</style>
