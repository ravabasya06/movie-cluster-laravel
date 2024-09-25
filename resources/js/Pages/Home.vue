<script setup>
import Layout from "../Components/Layout.vue";
import Cards from "../Components/Home/Cards.vue";

defineProps(["popular_movies"]);
</script>
<template>
    <Head title="Home" />
    <Layout>
        <Cards title="Popular Movies" :movies="popular_movies" />
        <div class="genres">
            <h3>Jenis Genre</h3>
        </div>
    </Layout>
</template>
<style scoped></style>
