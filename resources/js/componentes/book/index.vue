<template>
    <div class="card">
        <div class="card-header text-center">
            <h3 class="card-title">Libros</h3>
            <a class="btn btn-success" @click.prevent="createbook">
                <i data-feather="plus-square"></i>Nuevo autor
            </a>
        </div>
        <div class="card-body">
            <book-tabla  ref="bookTabla" :books="books_news"></book-tabla>
        </div>
    </div>
</template>

<script>
    import bookTabla from './tabla'


    export default {
        props: ['books'],
        components: {
            bookTabla
        },
        data() {
            return {
                books_news: this.books
            }
        },
        methods: {
            createbook(){
              this.$refs.bookTabla.createbook()
            }
        }
    }
</script>

