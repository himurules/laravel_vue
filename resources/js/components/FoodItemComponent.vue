<template>
    <form class="text-center border border-light p-5" @submit.prevent="saveItem" >
        <div class="form-group" v-if="errors.length > 0">
            <ul class="bg-danger">
                <li v-for="(error, index) in errors">{{ error }}</li>
            </ul>
        </div>
        <div class="text-left" v-if="item">
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Name:</label>
                <div class="col-sm-10">
                    <input type="text" v-model="item.name" class="form-control" :ref="item.name" id="name" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="price" class="col-sm-2 col-form-label">Price:</label>
                <div class="col-sm-10">
                    <input type="number" v-model="item.price" class="form-control" id="price" required min="0" step="any">
                </div>
            </div>
            <div class="form-group row">
                <label for="description" class="col-sm-2 col-form-label">Description:</label>
                <div class="col-sm-10">
                    <textarea v-model="item.description" class="form-control" id="description" required></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="category" class="col-sm-2 col-form-label">Category:</label>
                <div class="col-sm-10">
                    <select multiple class="selectpicker form-select" id="category" v-model="item.category" style="height: 100%">
                        <option v-for="(cat, index) in categories" :value="cat.id" :key="cat.id" >{{ cat.name }}</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-2">
                    <img v-if="id && item.img_src" :src="`/img/${item.img_src}`" style="width:200px">
                    <label v-else>Image Src:</label>
                </div>
                <div class="col-sm-10">
                    <drop-zone :options="this.dropzoneOptions" id="dz" ref="dropzone"></drop-zone>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-2">
                    <label class="form-check-label" for="isactive">Is Active</label>
                </div>
                <div class="col-sm-10">
                    <input type="checkbox" class="form-check" id="isactive" v-model="item.is_active">
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Save Item</button>
    </form>
</template>

<script>
    import vue2Dropzone from 'vue2-dropzone';
    import 'vue2-dropzone/dist/vue2Dropzone.min.css';
    import {mapState} from 'vuex';

    function newItem(){
        return {
            name: '',
            price: 0.00,
            description: '',
            img_src: '',
            is_active: 1,
            category: []
        };
    }

    export default {
        components: {
            dropZone: vue2Dropzone
        },
        name: "FoodItemComponent",
        props: ['id'],
        computed: mapState({
          categories: 'categories'
        }),
        data() {
            return {
                dropzoneOptions: {
                    url: '/api/food-item/add-image',
                    thumbnailWidth: 200,
                    headers: {
                        "X-CSRF-TOKEN": document.head.querySelector("[name=csrf-token]").content
                    },
                    success(file, res){
                        file.filename = res;
                    }
                },
                item: newItem(),
                errors: []
            };
        },
        created() {
          if(this.id) {
            axios.get('/api/food-items/' + this.id)
              .then(
                  res => this.item = res.data
              );
          }
        },
        beforeRouteLeave (to, from, next) {
            this.item = newItem();
            next();
        },
        methods: {
            saveItem(){
                let files = this.$refs.dropzone.getAcceptedFiles();
                if(files.length > 0 && files[0].filename){
                    this.item.img_src = files[0].filename;
                }
                let url = '/api/food-items/add';
                if(this.id)
                    url = '/api/food-items/'+this.id;
                axios.post(url, this.item)
                    .then(res => {
                        this.$router.push('/list-food-items');
                    })
                    .catch(error => {
                        let messages = Object.values(error.response.data.errors);
                        this.errors = [].concat.apply([], messages);
                    });
            }
        }
    }
</script>

<style scoped>

</style>
