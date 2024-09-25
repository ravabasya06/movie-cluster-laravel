<script setup>
defineProps(["movies"]);
</script>

<template>
    <!-- Modal -->
    <div
        class="modal"
        id="moviepopup"
        tabindex="-1"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
    >
        <div class="modal-dialog modal-lg modal-dialog-zoom">
            <!-- Added zoom class here -->
            <div class="modal-content">
                <div class="img-container">
                    <img src="/public/images/Persona5.jpg" alt="" />
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                    ></button>
                    <!-- Play and Like buttons -->
                    <div class="action-buttons">
                        <!-- INI PLAY NANTI TAMBAHIN LINK AJA JADI DIRECT LANGSUNG KE DETAIL.VUE -->
                        <i class="fa fa-play-circle play-btn">
                            <font-awesome-icon icon="fa-play"
                        /></i>
                        <i class="like-btn">
                            <font-awesome-icon icon="fa-thumbs-up" />
                        </i>
                    </div>
                </div>
                <div class="modal-body">
                    <h1 class="modal-title f-5" id="exampleModalLabel">
                        judul film
                    </h1>
                    <div class="small-detail">
                        <p>2023 1h 23m</p>
                        <p class="age-rate">16+</p>
                    </div>
                    <span class="fs-5 fw-bold"
                        >Lorem ipsum dolor sit amet consectetur adipisicing
                        elit. Ratione magni delectus possimus, eligendi hic quae
                        ducimus ex consequatur fuga eveniet illo labore
                        voluptatum nesciunt maiores tempore! Sequi quas nisi
                        iste.
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
    bottom: 10px;
    left: 10px;
    display: flex;
    gap: 15px;
}

.action-buttons i {
    font-size: 30px;
    color: black;
    cursor: pointer;
    background-color: white;
    padding: 8px;
    border-radius: 25px;
    align-items: center;
}
.small-detail {
    display: flex;
    flex-direction: row;
    align-items: center;
    gap: 10px;
}
.age-rate {
    padding: 5px;
    border: 1px solid white;
    display: inline-block;
}
.play-btn:hover,
.like-btn:hover {
    color: blue;
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
