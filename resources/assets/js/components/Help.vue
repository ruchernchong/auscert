<template>
    <ul data-uk-accordion>
        <li v-for="item in items">
            <h4 class="uk-accordion-title">{{ item.question }}</h4>
            <div class="uk-accordion-content">{{ item.answer }}</div>
        </li>
    </ul>
</template>

<script>
    export default {
        name: 'help',
        data() {
            return {
                items: [
                    {
                        question: null,
                        answer: null,
                    }
                ],
            }
        },
        mounted() {
            axios.get('/data/help.json').then(response => this.items = response.data)
        }
    }
</script>