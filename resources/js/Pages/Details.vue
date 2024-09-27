<script setup>
import Layout from "../Components/Layout.vue";
import Cards from "../Components/Home/Cards.vue";
import CastCards from "../Components/Movie/CastCards.vue";
defineProps(["movie", "release_date", "recommendation_movies", "casts"]);
</script>
<template>
    <Head title="Movie Details" />
    <Layout>
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
                    <h2
                        v-if="
                            movie.release_dates.results.find(
                                (result) => result.iso_3166_1 === 'US',
                            ).release_dates[0].certification
                        "
                        class="age-rate"
                    >
                        {{
                            movie.release_dates.results.find(
                                (result) => result.iso_3166_1 === "US",
                            ).release_dates[0].certification
                        }}
                    </h2>
                </div>
                <div class="small-details">
                    <div class="genre-title-container">
                        <span v-for="genre in movie.genres" class="genre-title">
                            {{ genre.name }}
                        </span>
                    </div>
                    <p>Release Date: {{ release_date }}</p>
                    <p>{{ movie.tagline }}</p>
                    <p>{{ movie.overview }}</p>
                    <p>{{ movie.homepage }}</p>
                    <p>{{ movie.popularity }}</p>
                    <p>{{ movie.vote_average }}</p>
                    <p>{{ movie.status }}</p>
                    <div v-for="company in movie.production_companies">
                        <img
                            :src="`https://image.tmdb.org/t/p/w500/${company.logo_path}`"
                            alt=""
                        />
                        <span>{{ company.name }}</span>
                    </div>
                    <!-- <p>
                        Cast:
                        <span v-for="cast in casts.cast">
                            {{ cast.name }},
                        </span>
                    </p> -->
                </div>
            </div>
            <div class="poster">
                <img
                    :src="`https://image.tmdb.org/t/p/original/${movie.poster_path}`"
                    alt="Movie Poster"
                />
            </div>
        </div>
        <CastCards :casts="casts" />
        <Cards title="Recommendations" :movies="recommendation_movies" />
    </Layout>
</template>

<style scoped>
.movie-page {
    max-width: 100%;
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    /* align-items: center; */
    gap: 10px;
}

.movie-details {
    padding: 20px;
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.title {
    display: flex;
    gap: 10px;
    align-items: center;
    justify-content: space-between;
}

.genre-title-container {
    display: flex;
    flex: row;
    gap: 15px;
    margin-bottom: 1rem;
}

.genre-title {
    background-color: rgb(0, 0, 0, 0.3);
    padding: 10px;
    border-radius: 10px;
}

.age-rate {
    margin: 0;
    padding: 5px;
    border: 1px solid white;
    display: inline-block;
}

.poster img {
    max-width: 100%;
}
</style>
