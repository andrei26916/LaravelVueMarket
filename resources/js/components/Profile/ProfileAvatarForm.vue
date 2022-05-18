<template>
  <div>

    <el-image style="width: 200px; height: 200px" :src="this.avatar.src"></el-image>

    <el-upload
        class="upload-demo"
        ref="upload"
        limit="1"
        :file-list="[this.avatar]"
        name="image"
        action="http://127.0.0.1:8000/api/image/upload"
        :auto-upload="false">
      <el-button slot="trigger" size="small" type="primary">Выбрать фаил</el-button>
      <el-button style="margin-left: 10px;" size="small" type="success" @click="submitUpload">Загрузить</el-button>
      <div class="el-upload__tip" slot="tip">jpg/png files with a size less than 500kb</div>
    </el-upload>
  </div>
</template>

<script>
export default {
  name: "ProfileAvatarForm",
  data(){
    return {
      avatar: {
        name: 'aaa',
        src: "https://e7.pngegg.com/pngimages/109/949/png-clipart-computer-software-management-business-service-technical-support-sugarplum-miscellaneous-infographic.png",
      },
    }
  },
  methods: {
    submitUpload() {
      console.log(this.$refs.upload.submit());
    }
  }
}
</script>

<style scoped>

</style>