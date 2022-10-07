<template>
    <div class="table-responsive">
                        <table class="table table-hover text-center" id="authorTabla">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombres</th>
                                    <th>Apellidos</th>
                                    <th>Nacionalidad</th>
                                    <th>Fecha de Nacimiento</th>
                                    <th>Biografia</th>
                                    <th>Imagen</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(author, index) in authors" :key="index">
                                    <td>{{author.id}}</td>
                                    <td>{{author.sur_name}}</td>
                                    <td>{{author.last_name}}</td>
                                    <td>{{author.citizenship}}</td>
                                    <td>{{author.date_of_birth}}</td>
                                    <td>{{author.bio}}</td>
                                    <td>
                                        <img :src="'/storage/images/authors${author.image}'" alt="" class="img-fluid w-25">
                                    </td>
                                    <td>
                                      <a class="btn btn-warning" href="#" @click.prevent="editAuthor(author)">Editar</a>
                                      <a class="btn btn-danger" href="#" @click.prevent="borrarAuthor(index)">Borrar</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div v-if="load_modal">
                        <author-form :author="author"></author-form>
                    </div>
                </div>
</template>
<script>


import AuthorForm from './form'
export default {
    props:['authors',],
    components:{
        AuthorForm,
    },

    data(){
        return{
            author: {},
            load_modal: false
        }
    },
    mounted(){
        this.tabla()

    },
    methods:{
        editAuthor(author){
            this.load_modal = true
            this.author = author
            setTimeout(() =>
                $('#modalAuthor').modal('show')
            , 200);
        },
        createAuthor() {
            this.load_modal = true
            this.author = {}
            setTimeout(() =>
                $('#modalAuthor').modal('show')
            , 200);
        },
        closeModal() {
            $('#modalAuthor').modal('hide')
            setTimeout(() =>
            this.load_modal = false
            , 200);
        },

        borrarAuthor(index)
        {
            if (!confirm('¿desea eliminar el registro')) return;
            this.authors.splice(index, 1);
        },

        tabla(){
            setTimeout(() => {
                $('#authorTabla').DataTable({
                    dom: 'Bfrtip',
                    buttons: ['copy', 'excel'],
                    processing: true
                })
            }, 1000)
        },
    }
}




</script>
