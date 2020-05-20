<template>
    <div class="form-group mx-4">
        <div class="row mx-3">
            <select class="selectpicker form-select mx-2" @change="findItems()" v-model="selectedIndex">
                <option v-for="(cat, index) in categories" :value="index" :key="cat.id" >{{ cat.name }}</option>
            </select>
        </div>
        <div class="row mx-3">
            <ul class="list-group mx-2">
                <li v-for="item in items" class="list-group-item" :key="item.id">
                    {{ item.name }}
                    <router-link :to="{name: 'edit-food-item', params: {id: item.id}}">Edit</router-link>
                    <a href="#" @click="removeItem(item.id)">Remove</a>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>

    import {mapState} from "vuex";
    import axios from "axios";

    export default {
        name: "ListFoodItem",
        data() {
            return {
                items: [],
                selectedIndex: 0,
            }
        },
        computed: mapState({
            categories: 'categories'
        }),
        created() {
            this.findItems();
        },
        methods: {
            removeItem(id){
                axios.delete
                (
                    '/api/food-items/'+id
                ).then(
                    (res) =>
                    {
                        if(res.data.success) {
                            this.findItems();
                        }
                    }
                )
            },
            findItems(){
                this.items = axios.get
                (
                    '/api/categories/'+this.categories[this.selectedIndex].id,
                )
                .then(
                    (res) =>
                    {
                        if(res.data.success) {
                            this.items = res.data.foodItems;
                        }
                    }
                );
            },
        }
    }
</script>

<style scoped>

</style>
