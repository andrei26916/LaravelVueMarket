<template>
    <div class="banner">
        <el-carousel indicator-position="outside">
            <el-carousel-item v-for="item in images" :key="item.id">
                <img :src="item.src" alt="">
            </el-carousel-item>
        </el-carousel>
    </div>

</template>

<script>
    export default {
        name: "BannerComponent",
        data(){
          return{
            images: [
              {
                id: 1,
                'src': '/img/logo11.jpg'
              },
              {
                id: 2,
                'src': '/img/logo2.jpg'
              }
            ]
          }
        },
        mounted() {
          // this.axios.get('http://127.0.0.1:8000/api/banners')
          //     .then(response => (console.log(response.data)));
        }
    }
</script>

<style scoped>
    .el-carousel__item h3 {
        color: #475669;
        font-size: 18px;
        opacity: 0.75;
        line-height: 300px;
        margin: 0;
    }

    .el-carousel__item:nth-child(2n) {
        background-color: #99a9bf;
    }

    .el-carousel__item:nth-child(2n+1) {
        background-color: #d3dce6;
    }
</style>