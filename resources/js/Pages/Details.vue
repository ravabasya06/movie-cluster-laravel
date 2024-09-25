<script setup></script>
<template>
    <div class="container">
        <div class="movie-page">
            <div class="movie-details">
                <div class="title">
                    <h1>Woah Ini judul</h1>
                    <h1 class="age-rate">16+</h1>
                </div>
                <div class="small-details">
                    <p>Duration: 1h 23m</p>
                    <p>Genre: Action, Sci-Fi</p>
                    <p>Release Date: December 19, 2006</p>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Animi accusamus facere natus corrupti sequi quidem
                        perspiciatis tempora eum, reprehenderit incidunt,
                        adipisci quisquam unde quaerat enim dolorem? Ducimus
                        possimus aspernatur harum.
                    </p>
                    <p><strong>Cast:</strong> Actor, Actor lagi, Actor lain</p>
                </div>
            </div>
            <div class="poster">
                <img
                    src="/public/images/Persona.png"
                    alt="Movie Poster Placeholder"
                />
            </div>
        </div>
    </div>
</template>

<style scoped>
.container {
    display: flex;
    height: 100vh;
}
.movie-page {
    display: flex;
    align-items: flex-start;
    padding: 20px;
    align-items: center;
}

.title {
    display: flex;
    gap: 10px;
    align-items: center;
}

.age-rate {
    padding: 5px;
    border: 1px solid white;
    display: inline-block;
}

.movie-details {
    margin-right: 20px;
}

.small-details p {
    margin-bottom: 10px;
}

.poster img {
    max-width: 100%;
    height: auto;
    border-radius: 8px;
}
</style>
