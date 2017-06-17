<template>
    <div class="uk-margin">
        <input type="search" class="uk-input" placeholder="Search Members" v-model="query">
    </div>
</template>

<script>
    export default {
        name: 'members-search',
        data() {
            return {
                query: '',
            }
        }
    }
</script>