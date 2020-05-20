<template>
    <form class="text-center border border-light p-5" @submit.prevent="saveCategories()">
        <a @click="addCategory()" class="btn btn-primary text-white h4 mb-4">+ Add Category</a>
        <div v-for="(category, index) in categories" :key="category.id" class="text-left">
            <input type="text" :value="category.name" class="form-control mb-4" :ref="category.name" @input="update($event, 'name', index)">
            <input type="text" :value="category.description" class="form-control mb-4" @input="update($event, 'description', index)">
            <div class="form-row mb-4">
                <div class="col-auto">
                    <img v-if="category.img_src" :src="`/img/${category.img_src}`">
                    <label v-else>Image Src:</label>
                </div>
                <div class="col">
                    <input type="text" :value="category.img_src"  class="form-control mb-4" @change="update($event, 'img_src', index)">
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
    import {mapState} from "vuex";

    export default {
        computed: mapState({
            categories: 'categories',
            feedback: 'feedback'
        }),
        methods: {
            update($event, property, index){
                this.$store.commit('UPDATE_CATEGORY',{
                    index,
                    property,
                    value: $event.target.value
                });
            },
            removeCategory(index) {
                if(confirm('Are you sure?')) {
                    this.$store.dispatch('removeCategory', index);
                }
            },
            addCategory() {
                this.$store.commit('ADD_CATEGORY',{
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
                this.$store.dispatch('saveCategories');
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
