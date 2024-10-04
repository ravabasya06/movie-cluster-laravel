<script setup>
defineProps(["genrelist"]);
</script>
<template>
    <p v-for="genre in genrelist.genres">{{ genre.name }}</p>
</template>
<style scoped></style>
