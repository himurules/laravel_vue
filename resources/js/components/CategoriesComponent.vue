<template>
    <form class="text-center border border-light p-5" @submit.prevent="saveCategories()">
        <a @click="addCategory()" class="btn btn-primary text-white h4 mb-4">+ Add Category</a>
        <div v-for="(category, index) in categories" :key="category.id" class="text-left">
            <input type="text" v-model="category.name" class="form-control mb-4" :ref="category.name">
            <input type="text" v-model="category.description" class="form-control mb-4">
            <div class="form-row mb-4">
                <div class="col-auto">
                    <img v-if="category.img_src" :src="`/img/${category.img_src}`">
                    <label v-else>Image Src:</label>
                </div>
                <div class="col">
                    <input type="text" v-model.lazy="category.img_src"  class="form-control mb-4">
                </div>
            </div>
            <a @click="removeCategory(index)" class="btn btn-danger text-white">- Delete Category</a>
            <hr/>
        </div>
        <button type="submit" class="btn btn-primary">Save Categories</button>
        <div class="text-success text-center">
            {{ feedback }}
        </div>
    </form>
</template>
<script>
    export default {
        props: ['initialCategories'],
        data() {
            return {
                categories: _.cloneDeep(this.initialCategories),
                feedback: '',
            }
        },
        methods: {
            removeCategory(index) {
                if(confirm('Are you sure?')) {
                   let id = this.categories[index].id;
                   if(id > 0) {
                        axios.delete('/api/categories/'+ id)
                        .then((res) => {
                            if(res.data.success) {
                                this.feedback = "Category deleted.";
                                this.categories = res.data.categories;
                            }
                        });
                   }
                   else
                    this.categories.splice(index,1);
                }
            },
            addCategory() {
                this.categories.push({
                    id: 0,
                    name: '',
                    description: '',
                    img_src: '',
                    start_time: null,
                    end_time: null,
                });
                this.$nextTick(() => {
                    window.scrollTo(0,document.body.scrollHeight);
                    this.$refs[''][0].focus();
                });
            },
            saveCategories() {
                axios.post('/api/categories/upsert', {
                    categories: this.categories
                })
                .then((res) => {
                   if(res.data.success) {
                       this.feedback = "Changes saved.";
                       this.categories = res.data.categories;
                   }
                });
            }
        }
    }
</script>
<style scoped>
    img {
        vertical-align: middle;
    }
    hr {
        margin-bottom: 30px;
    }
</style>
