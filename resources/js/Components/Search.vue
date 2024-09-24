<script setup>
import { ref } from "vue";

const isInputVisible = ref(false);
const searchQuery = ref("");

const toggleSearch = () => {
    isInputVisible.value = !isInputVisible.value;
};

const hideInput = () => {
    isInputVisible.value = false;
};
</script>

<template>
    <div class="search-container">
        <font-awesome-icon
            icon="magnifying-glass"
            class="search-icon"
            @click="toggleSearch"
        />
        <transition name="fade">
            <input
                v-if="isInputVisible"
                type="text"
                v-model="searchQuery"
                placeholder="Search..."
                class="search-input"
                @blur="hideInput"
            />
        </transition>
    </div>
</template>

<style scoped>
.search-container {
    position: relative;
    display: flex;
    align-items: center;
}

.search-icon {
    font-size: 24px;
    cursor: pointer;
    transition: transform 0.3s ease-in-out;
}

.search-icon:hover {
    transform: scale(1.2);
}

.search-input {
    width: 200px;
    opacity: 1;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
    margin-left: 10px;
    transition: width 0.3s ease-in-out, opacity 0.3s ease-in-out;
}

.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.3s ease-in-out, width 0.3s ease-in-out;
}

.fade-enter,
.fade-leave-to {
    opacity: 0;
    width: 0;
    padding: 0;
}
</style>
