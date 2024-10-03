<script setup>
import { computed } from "vue";

// Props
const props = defineProps(["movies", "query"]);

// Variables
const currentPage = props.movies.page;
const totalPages = props.movies.total_pages;

// Number of pages to show around the current page
const pageNeighbors = 2;

// Computed properties to control pagination
const pageRange = computed(() => {
    const startPage = Math.max(1, currentPage - pageNeighbors);
    const endPage = Math.min(totalPages, currentPage + pageNeighbors);
    const range = [];

    for (let i = startPage; i <= endPage; i++) {
        range.push(i);
    }

    return range;
});

const shouldShowFirst = computed(() => currentPage > pageNeighbors + 1);
const shouldShowLeftEllipsis = computed(() => currentPage > pageNeighbors + 2);
const shouldShowRightEllipsis = computed(
    () => currentPage < totalPages - pageNeighbors - 1,
);
const shouldShowLast = computed(() => currentPage < totalPages - pageNeighbors);
</script>
<template>
    <div class="page">
        <!-- Previous Page Link -->
        <Link
            v-if="currentPage > 1"
            :href="`/search?page=${currentPage - 1}&search_query=${query}`"
            >Previous</Link
        >

        <!-- First Page -->
        <Link
            v-if="shouldShowFirst"
            :href="`/search?page=1&search_query=${query}`"
        >
            <span>1</span>
        </Link>

        <!-- Ellipsis before the current range -->
        <span v-if="shouldShowLeftEllipsis">...</span>

        <!-- Page Numbers -->
        <Link
            v-for="page in pageRange"
            :key="page"
            :href="`/search?page=${page}&search_query=${query}`"
            :class="{ active: page === currentPage }"
        >
            <span>{{ page }}</span>
        </Link>

        <!-- Ellipsis after the current range -->
        <span v-if="shouldShowRightEllipsis">...</span>

        <!-- Last Page -->
        <Link
            v-if="shouldShowLast"
            :href="`/search?page=${totalPages}&search_query=${query}`"
        >
            <span>{{ totalPages }}</span>
        </Link>

        <!-- Next Page Link -->
        <Link
            v-if="currentPage < totalPages"
            :href="`/search?page=${currentPage + 1}&search_query=${query}`"
            >Next</Link
        >
    </div>
</template>

<style scoped>
.page {
    display: flex;
    flex-direction: row;
    gap: 5px;
    justify-content: center;
}

.page a {
    text-decoration: none;
    color: white;
    border: 1px solid white;
    border-radius: 3px;
    padding: 10px;
}

.page a.active {
    border: 1px solid white;
    background-color: white;
    color: gray;
}

.page a:hover {
    border: 1px solid white;
    background-color: white;
    color: gray;
}

.page span {
    padding: 5px 10px;
}

.page span.active {
    background-color: #007bff;
    color: white;
}

.page span.ellipsis {
    cursor: default;
    pointer-events: none;
}
</style>
