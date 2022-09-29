<template >
<div class="table-responsive-md">
                        <table class="table table-hover text-center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Titulo</th>
                                    <th># paginas</th>
                                    <th>Idioma</th>
                                    <th>Fecha de publicacion</th>
                                    <th>Precio</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                        <tr v-for="(book, index) in books" :key="index">
                                    <td>{{book.id}}</td>
                                    <td>{{book.title}}</td>
                                    <td>{{book.pages}}</td>
                                    <td>{{book.language}}</td>
                                    <td>{{book.date_of_birth}}</td>
                                    <td>{{book.price}}</td>
                                    <!-- <td>
                                        <img :src="'/storage/images/authors${author.image}'" alt="" class="img-fluid w-25">
                                    </td> -->
                                    <td>
                                      <a class="btn btn-warning" href="#" @click.prevent="editbook(book)">Editar</a>
                                      <a class="btn btn-danger" href="#" @click.prevent="borrarbook(id)">Borrar</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div v-if="load_modal">
                        <book-form :book="book"></book-form>
                    </div>
                    </div>
</template>

<script>


import bookForm from './form'
export default {
    props:['books'],
    components:{
        bookForm
    },
    data(){
        return{
            book: {},
            load_modal: false
        }
    },
    methods:{
        editbook(book){
            this.load_modal = true
            this.book = book
            setTimeout(() =>
                    $('#modalBook').modal('show')
                , 200);
        },
        createbook() {
                this.load_modal = true
                this.book = {}
                setTimeout(() =>
                    $('#modalBook').modal('show')
                , 200);


            },
            closeModal() {
                $('#modalBook').modal('hide')
                setTimeout(() =>
                this.load_modal = false
                , 200);
            },

            borrarbook: function (id) {
              this.load_modal(id, 1)
            }
    }
}
</script>
