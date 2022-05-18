<template>
    <div class="admin_div_flex">
        <MenuComponent/>
        <div class="content_admin">
            <BreadcrumbComponent/>
            <slot/>
        </div>
    </div>
</template>

<script>
import MenuComponent from '../components/Admin/MenuComponent';
import BreadcrumbComponent from '../components/Admin/BreadcrumbComponent';

export default {
    name: "Admin",
    components: {
      MenuComponent, BreadcrumbComponent
    },
}
</script>

<style scoped>
.admin_div_flex{
    display: flex;
    justify-content: flex-start;
    align-items: flex-start;
}
</style>
