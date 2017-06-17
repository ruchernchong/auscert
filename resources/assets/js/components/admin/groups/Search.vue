<template>
    <div class="uk-margin">
        <input type="search" class="uk-input" placeholder="Search Groups" v-model="query">
    </div>
</template>

<script>
    export default {
        name: 'groups-search',
        data() {
            return {
                query: '',
            }
        }
    }
</script>