<script setup>
import { Link } from "@inertiajs/vue3";
</script>

<template>
    <div class="container-cards">
        <Link>
            <div class="card">
                <img src="/public/images/Persona.png" />
                <div class="rating">
                    <p>16+</p>
                </div>
                <div class="text">
                    <h3>Nama Film</h3>
                    <p>Duration: 1h 3m</p>
                </div>
                <div class="details">
                    <p>Genres: Action, Adventure</p>
                </div>
            </div>
        </Link>
        <Link>
            <div class="card">
                <img src="/public/images/Persona5.jpg" />
                <div class="rating">
                    <p>16+</p>
                </div>
                <div class="text">
                    <h3>Nama Film</h3>
                    <p>Duration: 50h</p>
                </div>
                <div class="details">
                    <p>Genres: RPG, Adventure</p>
                </div>
            </div>
        </Link>
        <Link>
            <div class="card">
                <img src="/public/images/ONK-S2.jpeg" />
                <div class="rating">
                    <p>16+</p>
                </div>
                <div class="text">
                    <h3>Nama Film</h3>
                    <p>Duration: 50h</p>
                </div>
                <div class="details">
                    <p>Genres: RPG, Adventure</p>
                </div>
            </div>
        </Link>
    </div>
</template>

<style scoped>
.container-cards {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    gap: 15px;
    margin: 30px;
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
