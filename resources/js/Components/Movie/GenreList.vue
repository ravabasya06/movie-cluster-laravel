<script setup>
const props = defineProps(["genrelist"]);
function myFunction() {
    const checkBox = document.getElementById("myCheck");
    const genre = document.getElementById("genre");
    if (checkBox.checked == true) {
        genre.background.color = "white";
    } else {
        genre.background.color = "none";
    }
}
</script>

<template>
    <div class="genre">
        <div
            v-for="genre in genrelist.genres"
            :key="genre.id"
            class="genre-list"
            id="genre"
        >
            <p>{{ genre.name }}</p>
            <input
                type="checkbox"
                id="myCheck"
                v-model="genre.checked"
                onclick="myFunction()"
            />
        </div>
    </div>
</template>
<style scoped>
.genre {
    display: flex;
    flex-direction: row;
    gap: 10px;
    overflow-x: auto;
    max-width: 100%;
}
.genre-list {
    display: flex;
    justify-content: center;
    align-items: center;
    align-self: center;
    align-content: center;
}
.genre-list input:checked {
    border: 1px solid white;
    background-color: white;
    color: black;
}

.genre-list:hover {
    border: 1px solid white;
    background-color: white;
    color: black;
}

.genre-list p {
    font-size: 15px;
    margin: 0;
    padding: 10px;
}
.genre-list input {
    width: 20px;
    /* display: none; */
}
.genre-checked {
    background-color: #add8e6;
}
</style>
