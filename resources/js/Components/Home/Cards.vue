<script setup>
defineProps(["movies", "title"]);
</script>

<template>
    <div class="recommendation-container">
        <h1>{{ title }}</h1>
        <div class="container-cards">
            <Link v-if="movies" v-for="movie in movies.results" href="">
                <div class="card">
                    <img
                        :src="`https://image.tmdb.org/t/p/w500/${movie.backdrop_path}`"
                    />
                    <div class="rating">
                        <p>Rating : {{ movie.vote_average }}</p>
                    </div>
                    <div class="text">
                        <h3>{{ movie.title }}</h3>
                    </div>
                    <div class="details">
                        <p>{{ movie.release_date }}</p>
                    </div>
                </div>
            </Link>
        </div>
    </div>
</template>

<style scoped>
.recommendation-container {
    margin: 30px;
}

.container-cards {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    gap: 15px;
}

.card {
    position: relative;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    border-radius: 5px;
    overflow: hidden;
    transition: transform 0.3s;
}

.card:hover {
    transform: scale(1.05);
}

.card img {
    width: 100%;
    height: 250px;
    object-fit: cover;
}
.card:hover img {
    filter: brightness(50%);
}
.rating p {
    margin: 0;
}
.rating {
    position: absolute;
    top: 0;
    color: #fff;
    text-align: center;
    border: 1px solid black;
    background: rgba(0, 0, 0, 0.5);
    padding: 5px;
    z-index: 1;
}
.text {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    background: rgba(0, 0, 0, 0.5);
    color: #fff;
    text-align: center;
    padding: 10px;
    z-index: 1;
}

.details {
    position: absolute;
    bottom: -20px;
    left: 0;
    right: 0;
    color: #fff;
    text-align: center;
    padding: 10px;
    opacity: 0;
    transition: opacity 0.3s;
    z-index: 1;
}

.card:hover .details {
    opacity: 1;
}

a {
    text-decoration: none;
}
</style>
