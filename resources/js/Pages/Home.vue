<script setup>
import Layout from "../Components/Layout.vue";
import Cards from "../Components/Home/Cards.vue";

defineProps(["popular_movies", "top_movies", "trending_movies"]);
</script>
<template>
    <Head title="Home" />
    <Layout>
        <Cards title="Popular Today" :movies="popular_movies" />
        <Cards title=" Top Rated of All Time" :movies="top_movies" />
        <Cards title="Trending Today" :movies="trending_movies" />
    </Layout>
</template>
