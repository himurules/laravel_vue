<template>
    <section class="food_menu gray_bg">
        <div class="container">
            <div>
                <div class="row">
                    <div class="section_tittle">
                        <h2>Add/Edit Menu</h2>
                    </div>
                </div>
                <nav class="navbar navbar-expand-lg navbar-light">
                    <router-link :to="{name: 'edit-categories'}" class="btn btn-outline-primary mx-2">Edit Categories</router-link>
                    <router-link :to="{name: 'list-food-items'}" class="btn btn-outline-primary mx-2">List Food Items</router-link>
                    <router-link :to="{name: 'add-food-item'}" class=" btn btn-outline-primary mx-2">Add Food Item</router-link>
                </nav>
                <router-view :initial-categories="categories"></router-view>
            </div>
        </div>
    </section>
</template>

<script>
    import VueRouter from 'vue-router';
    import CategoriesComponent from "./CategoriesComponent";
    import FoodItemComponent from "./FoodItemComponent";
    import ListFoodItem from "./ListFoodItem";

    export default {
        props: ['categories'],
        name: "MenuEditor",
        router: new VueRouter({
            mode: 'history',
            base: 'admin/edit-menu',
            routes: [
                {
                    path: '/edit-categories',
                    name: 'edit-categories',
                    component: CategoriesComponent
                },
                {
                    path: '/',
                    redirect: {name: 'edit-categories'}
                },
                {
                    path: '/list-food-items',
                    name: 'list-food-items',
                    component: ListFoodItem
                },
                {
                    path: '/add-food-item',
                    name: 'add-food-item',
                    component: FoodItemComponent
                },
                {
                    path: '/edit-food-item/:id',
                    name: 'edit-food-item',
                    component: FoodItemComponent,
                    props: true
                },
                {
                    path: '*',
                    redirect: '/'
                }
            ]
        })
    }
</script>

<style scoped>
    .router-link-active {
        font-weight: bold;
        color: white;
        background-color: tomato;
    }
</style>
