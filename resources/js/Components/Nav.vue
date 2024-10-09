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
            <div class="genre">
                <!-- Isi ini pls  -->
                <Link href="/">
                    <button class="genre-button">
                        <font-awesome-icon icon="folder-open" />
                        Genres
                    </button>
                </Link>
            </div>
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

.left-group {
    display: flex;
    align-items: center;
    gap: 10px;
}

.right-group {
    display: flex;
    align-items: center;
}

.genre-button {
    background-color: rgb(0, 0, 0);
    color: white;
    padding: 10px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}
.genre-button:hover {
    background-color: white;
    color: black;
}
</style>
