<template>
   <div>
       <h1>Создать товар</h1>

       <p>Название</p>
       <el-input placeholder="Введите название" v-model="title"></el-input>

       <p>Категория</p>
       <el-select
           v-model="categoryId"
           clearable
           placeholder="Выберите категорию">
           <el-option
               v-for="category in categories"
               :key="category.id"
               :label="category.name"
               :linit="limit"
               :value="category.id">
           </el-option>
       </el-select>

       <p>Описание</p>
       <el-input type="textarea"
                 :rows="2"
                 placeholder="Введите описание"
                 v-model="description"></el-input>
       <p>Цена</p>
       <el-input placeholder="Введите цену" v-model="price"></el-input>

       <p>Изображения</p>
       <el-upload
           class="upload-demo"
           action="/api/upload"
           name="image"
           :on-remove="handleRemove"
           :on-success="handleSuccess"
           :file-list="imageList"
           list-type="picture">
           <el-button size="small" type="primary">Click to upload</el-button>
           <div slot="tip" class="el-upload__tip">jpg/png files with a size less than 500kb</div>
       </el-upload>
       <el-button type="success" @click="save()">Save</el-button>
   </div>

</template>

<script>
export default {
name: "AdminProduct",
    data() {
        return {
            title: null,
            description: null,
            categoryId: null,
            price: null,
            imageList: [],
            images: [],
            limit: 1,
            categories: [],
        }
    },
    methods: {
        handleSuccess(response){
            this.images.push(response.id)
            console.log(response);
        },
        handleRemove(file, images) {
            this.images = this.images.filter((item) => {return item.name != file.name});
            console.log(file, images);
        },
        save(){
            axios.post('/api/products/create', {
                title: this.title,
                description: this.description,
                price: this.price,
                category_id: this.categoryId,
                images: this.images,
            }).then(response => (console.log(response.data)));
        }
    },
    mounted() {
        axios.get('/api/categories/list').then(response => (this.categories = response.data));
        console.log(this.categories)
    }
}
</script>

<style scoped>

</style>
