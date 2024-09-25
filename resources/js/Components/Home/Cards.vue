<template>
    <div class="recommendation-container">
        <h1>{{ title }}</h1>
        <div class="container-cards" ref="containerRef">
            <div
                v-if="movies"
                v-for="movie in movies.results"
                :key="movie.id"
                class="card"
                @click="showmovie(movie)"
            >
                <img
                    :src="`https://image.tmdb.org/t/p/w500/${movie.poster_path}`"
                    alt="Movie Poster"
                />
                <div class="rating">
                    <font-awesome-icon icon="fa-regular fa-star" />
                    <span>{{ movie.vote_average }}</span>
                </div>
                <div class="text fw-bold">
                    <span>{{ movie.title }}</span>
                </div>
            </div>
        </div>

        <font-awesome-icon
            icon="caret-left"
            class="switchLeft sliderbutton"
            @click="scroll('left')"
        />
        <font-awesome-icon
            icon="caret-right"
            class="switchRight sliderbutton"
            @click="scroll('right')"
        />
    </div>
    <MovieModal :movie="selectedMovie" />
</template>

<script setup>
import MovieModal from "./MovieModal.vue";
import { onMounted, ref, defineProps } from "vue";

const props = defineProps(["movies", "title"]);

let Movie;
const selectedMovie = ref("");
const containerRef = ref(null);
const visibleCards = 1; // Number of visible cards
const currentIndex = ref(0); // Current index for scrolling

onMounted(() => {
    const MovieModalElement = document.getElementById("moviepopup");
    if (MovieModalElement) {
        Movie = new bootstrap.Modal(MovieModalElement);
    }
});

const showmovie = (themovie) => {
    selectedMovie.value = themovie;
    Movie.show();
};

const scroll = (direction) => {
    const container = containerRef.value;

    const maxIndex = Math.ceil(props.movies.results.length / visibleCards) - 1;

    currentIndex.value += direction === "right" ? 1 : -1;

    if (currentIndex.value < 0) currentIndex.value = 0;
    if (currentIndex.value > maxIndex) currentIndex.value = maxIndex;

    const newScrollLeft =
        currentIndex.value * (container.clientWidth / visibleCards);
    container.scrollTo({ left: newScrollLeft, behavior: "smooth" });
};
</script>

<style scoped>
.recommendation-container {
    margin: 30px;
    position: relative;
}

.container-cards {
    display: flex;
    overflow: hidden;
    gap: 15px;
}

.card {
    min-width: calc(100% / 5 - 60px);
    position: relative;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    border-radius: 10px;
    overflow: hidden;
    transition: transform 0.3s;
}

.card:hover {
    transform: scale(1.05);
}

.card img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
}

.rating {
    display: flex;
    position: absolute;
    align-items: center;
    gap: 5px;
    color: #fff;
    background: rgba(0, 0, 0, 0.5);
    padding: 5px;
    z-index: 1;
}

.text {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    background: rgba(0, 0, 0, 0.6);
    color: #fff;
    text-align: center;
    padding: 10px;
    opacity: 0;
    transition: opacity 0.3s;
}

.card:hover .text {
    opacity: 1;
}

.sliderbutton {
    position: absolute;
    top: 50%;
    transform: translateY(-30%);
    background: rgba(0, 0, 0, 0.5);
    color: white;
    height: 50px;
    width: 50px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 20px;
    cursor: pointer;
    z-index: 5;
}

.switchLeft {
    left: 10px;
}

.switchRight {
    right: 10px;
}
</style>
