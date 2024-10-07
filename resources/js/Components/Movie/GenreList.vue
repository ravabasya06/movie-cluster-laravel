<script setup>
import { ref } from "vue";
import { useForm, router } from "@inertiajs/vue3";
defineProps(["genrelist"]);
function myFunction() {
    const isChecked = document.getElementById("myCheck");
    const genre = document.getElementById("genre");
    if (isChecked.checked == true) {
        genre.backgroundColor = "white";
    } else {
        genre.backgroundColor = "none";
    }
}

const form = useForm({
    genres: [],
});

const search = () => {
    if (form.genres) {
        form.get(route("search"));
    } else {
        router.visit("/");
    }
};

const filterGenres = (genre) => {
    form.genres.push(genre);
    console.log(genre);
};
</script>

<template>
    <div class="genre-container">
        <form class="genre-form" @submit.prevent="search">
            <div class="genre-list-container">
                <div
                    v-for="genre in genrelist.genres"
                    :key="genre.id"
                    class="genre-list"
                    id="genre"
                >
                    <p>{{ genre.name }}</p>
                    <input
                        @click="filterGenres(genre.id)"
                        type="checkbox"
                        :name="genre.name"
                        :id="genre.id"
                        :checked="genre.checked"
                    />
                </div>
            </div>
            <input type="submit" value="Search" />
        </form>
    </div>
</template>
<style scoped>
.genre-form {
    display: flex;
    flex-direction: column;
    gap: 15px;
}
.genre-list-container {
    display: flex;
    flex-direction: row;
    gap: 10px;
    overflow-x: auto;
    max-width: 100%;
    gap: 15px;
    align-items: center;
}
.genre-list {
    display: flex;
    justify-content: center;
    align-items: center;
    align-self: center;
    align-content: center;
    border-radius: 8px;
    border: 1px solid white;
    padding: 5px;
}

.genre-list input:checked {
    background-color: white;
    color: black;
}

.genre-list:hover {
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
