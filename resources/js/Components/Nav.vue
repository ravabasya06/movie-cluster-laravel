<script setup>
import Search from "./Search.vue";
</script>

<template>
    <nav class="navbar">
        <div class="left-group">
            <Link href="/">
                <img
                    class="logo"
                    src="../../../public/images/Logo-Movclus.png"
                    alt="logo"
                />
            </Link>
        </div>
        <div class="right-group">
            <Search />
        </div>
    </nav>
</template>

<style scoped>
.navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    position: sticky;
    background-color: black;
    z-index: 1;
    padding: 0;
}
.logo {
    padding: 15px;
    width: 180px;
}
</style>
