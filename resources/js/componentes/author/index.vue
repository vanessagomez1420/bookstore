<template>
    <div class="card">
        <div class="card-header text-center">
            <h3 class="card-title">Autores</h3>
            <a class="btn btn-success" @click.prevent="createAuthor">
                <i data-feather="plus-square"></i>Nuevo autor
            </a>
        </div>
        <div class="card-body">
            <author-tabla  ref="authorTabla" :authors="authors_news"></author-tabla>
        </div>
    </div>
</template>

<script>
    import AuthorTabla from './tabla'
    
    
    export default {
        props: ['authors'],
        components: {
            AuthorTabla
        },
        data() {
            return {
                authors_news: this.authors
            }
        },
        methods: {
            createAuthor(){
              this.$refs.authorTabla.createAuthor()
            }
        }
    }
</script>
