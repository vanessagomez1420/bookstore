<template>
    <div class="card">
        <div class="card-header text-center">
            <h3 class="card-title">Genero</h3>
            <a class="btn btn-success" @click.prevent="createGenre">
                <i data-feather="plus-square"></i>Nuevo Genero
            </a>
        </div>
        <div class="card-body">
            <genre-tabla  ref="genreTabla" :genres="genres_news"></genre-tabla>
        </div>
    </div>
</template>

<script>
    import GenreTabla from './tabla'


    export default {
        props: ['genres'],
        components: {
            GenreTabla
        },
        data() {
            return {
                genres_news: this.genres
            }
        },
        methods: {
            createGenre(){
              this.$refs.genreTabla.createGenre()
            }
        }
    }
</script>
