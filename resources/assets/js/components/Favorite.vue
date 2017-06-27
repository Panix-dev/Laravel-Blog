<template>
        <a href="#" v-if="isFavorited" @click.prevent="unFavorite(item)">
            <i  class="fa fa-heart"></i>
        </a>
        <a href="#" v-else @click.prevent="favorite(item)">
            <i  class="fa fa-heart-o"></i>
        </a>
</template>

<script>
    export default {
        props: ['item', 'favorited'],

        data: function() {
            return {
                isFavorited: '',
            }
        },

        mounted() {
            this.isFavorited = this.isFavorite ? true : false;
        },

        computed: {
            isFavorite() {
                return this.favorited;
            },
        },

        methods: {
            favorite(item) {
                axios.post('/favorite/'+item)
                    .then(response => this.isFavorited = true)
                    .catch(response => console.log(response.data));
            },

            unFavorite(item) {
                axios.post('/unfavorite/'+item)
                    .then(response => this.isFavorited = false)
                    .catch(response => console.log(response.data));
            }
        }
    }
</script>