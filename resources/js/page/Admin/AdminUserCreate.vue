<template>
    <div>
        <h1>Создать пользователя</h1>
        <UserCreate />
    </div>
</template>

<script>
import UserCreate from "../../components/UserCreate";
export default {
    name: "AdminUserCreate",
    components: {UserCreate}
}
</script>

<style scoped>

</style>
