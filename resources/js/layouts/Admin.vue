<template>
    <div class="admin_div_flex" v-if="authorisation()">
        <MenuComponent/>
        <div class="content_admin">
            <BreadcrumbComponent/>
            <slot/>
        </div>
    </div>
    <div v-else>
        <Auth></Auth>
    </div>
</template>

<script>
import MenuComponent from '../components/Admin/MenuComponent';
import BreadcrumbComponent from '../components/Admin/BreadcrumbComponent';
import Auth from '../page/Auth';
import {mapGetters} from "vuex";

export default {
    name: "Admin",
    components: {
      MenuComponent, BreadcrumbComponent, Auth
    },
    methods: {
        ...mapGetters(['getUser']),
        authorisation(){
            let check = false;
            if (this.getUser()) {
                if (Object.keys(this.getUser()).length > 0){
                    if (this.getUser().roles){
                        this.getUser().roles.forEach(element => {
                            if (element.slug === 'admin'){
                                check = true;
                            }
                        })
                    }
                }
            }
            return check;
        },
        redirect() {
            return this.$router.push({name: 'home'})
        }
    }
}
</script>

<style scoped>
.admin_div_flex{
    display: flex;
    justify-content: flex-start;
    align-items: flex-start;
}
</style>
