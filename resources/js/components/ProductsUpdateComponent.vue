<template>
    <div>
        <h1>Создать товар</h1>

        <p>Название</p>
        <el-input placeholder="Введите название" v-model="product.title"></el-input>

        <p>Категория</p>
        <el-select
            v-model="product.category_id"
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
                  v-model="product.description"></el-input>
        <p>Цена</p>
        <el-input placeholder="Введите цену" v-model="this.product.price"></el-input>

        <p>Изображения</p>
        <el-upload
            class="upload-demo"
            action="/api/upload"
            name="image"
            :on-remove="handleRemove"
            :on-success="handleSuccess"
            :file-list="product.images"
            list-type="picture">
            <el-button size="small" type="primary">Click to upload</el-button>
            <div slot="tip" class="el-upload__tip">jpg/png files with a size less than 500kb</div>
        </el-upload>
        <el-button type="success" @click="save()">Save</el-button>
    </div>
</template>

<script>
export default {
name: "ProductsUpdateComponent",
    props: ['product'],
    data(){
        return {
            limit: 1,
            categories: [],
        }
    },
    methods: {
        handleSuccess(response){
            this.product.images.push({
                image_id: response.id,
                name: response.name,
                url: response.src,
                status: 'new'
            })
            console.log(response);
            console.log(this.product.images);
        },
        handleRemove(file, images) {
            console.log(this.product.images);
            this.product.images = this.product.images.filter((item) => {return item.image_id != file.image_id});
            console.log(this.product.images);
        },
        save(){
            axios.post('/api/product/' + this.product.id + '/update', this.product).then(response => (console.log(response.data)));
        }
    },
    mounted() {
        axios.get('/api/categories/list').then(response => (this.categories = response.data));
    }
}
</script>

<style scoped>

</style>
