<template>
  <div>

    <el-image style="width: 200px; height: 200px" :src="this.getUser().avatar_url"></el-image>

    <el-upload
        class="upload-demo"
        ref="upload"
        :limit="this.limit"
        name="image"
        :on-preview="this.handlePreview"
        :on-change="this.handleChange"
        action="/api/avatar/upload"
        :auto-upload="false">
      <el-button slot="trigger" size="small" type="primary">Выбрать фаил</el-button>
      <el-button style="margin-left: 10px;" size="small" type="success" @click="submitUpload">Загрузить</el-button>
      <div class="el-upload__tip" slot="tip">jpg/png files with a size less than 500kb</div>
    </el-upload>
  </div>
</template>

<script>
import {mapMutations, mapGetters} from "vuex";

export default {
  name: "ProfileAvatarForm",
  data(){
    return {
        limit: 1,
    }
  },
  methods: {
      ...mapMutations(['setAvatar']),
      ...mapGetters(['getUser']),
      submitUpload() {
          this.$refs.upload.submit()
      },
      handlePreview(file) {
          console.log(file);
      },
      handleChange(file) {
          console.log(file);
          if (file.response){
              if (file.response.url){
                  this.setAvatar(file.response.url)
              }
          }
          console.log(file);
      }
  }
}
</script>

<style scoped>

</style>
