<template>
    <div>
        <div class="card-header text-center">
            <h3 class="card-title">Libros</h3>
            <a class="btn btn-success" @click.prevent="createBook">
                <i data-feather="plus-square"></i>Nuevo libro
            </a>
        </div>
        <div>
            <book-tabla  ref="bookTabla" :books="books_news"></book-tabla>
        </div>
    </div>
</template>

<script>
    import BookTabla from './tabla'


    export default {
        props: ['books'],
        components: {
            BookTabla
        },
        data() {
            return {
                books_news: this.books
            }
        },
        methods: {
            createBook(){
              this.$refs.bookTabla.createBook()
            }

        }
    }
</script>

