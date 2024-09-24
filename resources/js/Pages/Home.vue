<script setup>
import Layout from "../Components/Layout.vue";
import Cards from "../Components/Home/Cards.vue";
</script>
<template>
    <Layout title="Home">
        <h3>For you</h3>
        <Cards />
        <div class="genres">
            <h3>Jenis Genre</h3>
            <Cards />
        </div>
    </Layout>
</template>
<style scoped>
h3 {
    margin: 30px;
}
</style>
