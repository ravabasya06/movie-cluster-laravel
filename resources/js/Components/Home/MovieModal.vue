<script setup>
defineProps(["movie"]);
</script>

<template>
    <div
        class="modal"
        id="moviepopup"
        tabindex="-1"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
    >
        <div class="modal-dialog modal-lg modal-dialog-zoom">
            <div class="modal-content">
                <div class="img-container">
                    <img
                        :src="`https://image.tmdb.org/t/p/original/${movie.backdrop_path}`"
                        alt="the image"
                    />
                    <div class="action-buttons">
                        <Link :href="`/movie/${movie.id}`" class="detail-button"
                            >Details</Link
                        >
                    </div>
                </div>
                <div class="modal-body">
                    <div class="title-container">
                        <h1 class="modal-title f-5 fw-bold">
                            {{ movie.title }}
                        </h1>
                        <p>
                            <font-awesome-icon icon="fa-regular fa-star" />
                            {{ movie.vote_average }}
                        </p>
                    </div>
                    <div class="small-detail">
                        <p>
                            {{ movie.release_date }}
                        </p>
                        <p>
                            <font-awesome-icon icon="fire" />
                            {{ movie.popularity }}
                        </p>
                    </div>
                    <span>
                        {{ movie.overview }}
                    </span>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
.modal {
    align-content: center;
}

.img-container {
    position: relative;
    width: 100%;
    height: auto;
}

.img-container img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
}

.title-container {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    align-items: center;
}

.title-container p {
    margin-top: 1rem;
}

.btn-close {
    color: white;
    position: absolute;
    top: 10px;
    right: 10px;
    background: rgba(0, 0, 0, 0.5);
    border: none;
    height: 20px;
}

.btn-close:focus {
    outline: none;
    box-shadow: none;
}

.action-buttons {
    position: absolute;
    bottom: 0;
    display: flex;
}

.detail-button {
    color: white;
    cursor: pointer;
    text-decoration: none;
    background-color: rgba(0, 0, 0, 0.95);
    padding: 15px;
    align-items: center;
    border-top-right-radius: 10px;
}

.detail-button:hover {
    border-style: solid;
    border-color: white;
    border-bottom: 1px;
    border-left: 1px;
}

.small-detail {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
}

.modal-content {
    background-color: rgba(0, 0, 0, 0.95);
    color: rgb(255, 255, 255);
}

.modal-dialog-zoom {
    transform: scale(0);
    transition: transform 0.5s ease-in-out;
}

.modal.fade.show .modal-dialog-zoom {
    transform: scale(1);
}
</style>
