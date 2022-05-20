<template>

  <el-col :span="24">
    <div class="layout">
      <el-breadcrumb separator-class="el-icon-arrow-right" class="item">
          <el-breadcrumb-item v-bind:key="key" v-for="(item, key) in getBreadcrumb()"><a :href="item.path">{{ item.name }}</a></el-breadcrumb-item>
      </el-breadcrumb>
    </div>
  </el-col>

</template>

<script>
export default {
  name: "BreadcrumbComponent",
  methods: {
    getBreadcrumb(){
      let result = [];
      let url = this.$route.path;
      console.log(url);
      url = url.split('/')
      for (let i = 0; i < url.length; i++){
        if (url[i] !== '') {
          if (i === 1){
            result.push({
              name: 'AdminPanel',
              path: '/' + url[i]
            })
              console.log('/' + url[i])
          }else {
            result.push({
              name: url[i],
              path: '/admin/' + url[i]
            })
              console.log('/admin/' + url[i])
          }
        }
      }
      return result;
    }
  }
}
</script>

<style scoped>
.layout{
  width: 100%;
  background: #99a9bf;
  border-radius: 4px;
  min-height: 36px;
  margin-bottom: 20px;
}

.layout .item{
  margin: 0px;
  line-height: 36px;
  text-align: left;
  padding-left: 14px;
  color: #fff;
}

.layout .item a{
  color: #fff;
  cursor: pointer;
}

.el-breadcrumb__inner a, .el-breadcrumb__inner.is-link{
  color: #fff;
  cursor: pointer !important;
}

a{
  cursor: pointer;
}

</style>
