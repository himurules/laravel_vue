<template>
    <div class="form-group mx-4">
        <div class="row mx-3">
            <select class="selectpicker form-select mx-2" @change="findItems()" v-model="selectedIndex">
                <option v-for="(cat, index) in initialCategories" :value="index" :key="cat.id" >{{ cat.name }}</option>
            </select>
        </div>
        <div class="row mx-3">
            <ul class="list-group mx-2">
                <li v-for="item in items" class="list-group-item" :key="item.id">
                    <router-link :to="{name: 'edit-food-item', params: {id: item.id}}">{{ item.name }}</router-link>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>

    export default {
        name: "ListFoodItem",
        props: ['initialCategories'],
        data() {
            return {
                items: [],
                selectedIndex: 0,
            }
        },
        created() {
            this.findItems();
        },
        methods: {
            findItems(){
                //console.log(this.initialCategories[index].name);
                this.items = this.initialCategories[this.selectedIndex].food_item ? this.initialCategories[this.selectedIndex].food_item : [];
            },
            editItem(index){

            }
        }
    }
</script>

<style scoped>

</style>
