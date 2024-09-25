<script setup>
import Layout from "../Components/Layout.vue";
import Cards from "../Components/Home/Cards.vue";
defineProps(["movie", "release_date", "recommendation_movies", "casts"]);
</script>
<template>
    <Head title="Movie Details" />
    <Layout>
        <div class="container">
            <!-- <div class="backdrop">
            <img
                :src="`https://image.tmdb.org/t/p/w500/${movie.backdrop_path}`"
                alt="Movie Poster"
            />
        </div> -->
            <div class="movie-page">
                <div class="movie-details">
                    <div class="title">
                        <h1>{{ movie.title }}</h1>
                        <h1 class="age-rate">16+</h1>
                    </div>
                    <div class="small-details">
                        <p>Duration: 1h 23m</p>
                        <p>
                            Genre:
                            <span v-for="genre in movie.genres">
                                {{ genre.name }},
                            </span>
                        </p>
                        <p>Release Date: {{ release_date }}</p>
                        <p>{{ movie.overview }}</p>
                        <p>
                            Cast:
                            <span v-for="cast in casts.cast">
                                {{ cast.name }},
                            </span>
                        </p>
                    </div>
                </div>
                <div class="poster">
                    <img
                        :src="`https://image.tmdb.org/t/p/original/${movie.poster_path}`"
                        alt="Movie Poster"
                    />
                </div>
            </div>
        </div>
        <Cards title="Recommendations" :movies="recommendation_movies" />
    </Layout>
</template>

<style scoped>
.movie-page {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    align-items: center;
    padding: 50px;
    gap: 20px;
}

.movie-details {
    display: flex;
    flex-direction: column;
    gap: 50px;
}

.title {
    display: flex;
    gap: 10px;
    align-items: center;
    justify-content: space-between;
}

.age-rate {
    padding: 5px;
    border: 1px solid white;
    display: inline-block;
}

.poster img {
    max-width: 50%;
    height: 50%;
    border-radius: 8px;
}
</style>
