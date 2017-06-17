<template>
    <div class="uk-margin">
        <input type="search" class="uk-input" placeholder="Search Courses" v-model="query">
    </div>
</template>

<script>
    export default {
        name: 'courses-search',
        data() {
            return {
                query: '',
            }
        }
    }
</script>