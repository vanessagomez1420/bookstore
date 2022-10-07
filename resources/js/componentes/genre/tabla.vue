<template>
    <div class="table-responsive">
                        <table class="table table-hover text-center" id="genreTabla">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Descripción</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(genre, index) in genres" :key="index">
                                    <td>{{genre.id}}</td>
                                    <td>{{genre.name}}</td>
                                    <td>{{genre.description}}</td>
                                    <!-- <td>
                                        <img :src="'/storage/images/authors${author.image}'" alt="" class="img-fluid w-25">
                                    </td> -->
                                    <td>
                                      <a class="btn btn-warning" href="#" @click.prevent="editGenre(genre)">Editar</a>
                                      <a class="btn btn-danger" href="#" @click.prevent="borrarGenre(index)">Borrar</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div v-if="load_modal">
                        <genre-form :genre="genre"></genre-form>
                    </div>
                </div>
</template>
<script>

import GenreForm from './form'
export default {
    props:['genres'],
    components:{
        GenreForm
    },
    data(){
        return{
            genre: {},
            load_modal: false
        }
    },
    mounted(){
        this.tabla()

    },
    methods:{
        editGenre(genre){
            this.load_modal = true
            this.genre = genre
            setTimeout(() =>
                    $('#modalGenre').modal('show')
                , 200);
        },
        createGenre() {
                this.load_modal = true
                this.genre = {}
                setTimeout(() =>
                    $('#modalGenre').modal('show')
                , 200);


            },
            closeModal() {
                $('#modalGenre').modal('hide')
                setTimeout(() =>
                this.load_modal = false
                , 200);
            },

            borrarGenre(index)
            {
               if (!confirm('¿desea eliminar el registro')) return;
               this.genres.splice(index, 1);
            },
            tabla(){
                setTimeout(() => {
            $('#genreTabla').DataTable({
                dom: 'Bfrtip',
                buttons: ['copy', 'excel'],
                processing: true
            })
              }, 1000)
            },
    }
}

</script>
