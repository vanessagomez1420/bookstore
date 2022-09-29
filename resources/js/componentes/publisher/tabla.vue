<template>
    <div class="table-responsive">
                        <table class="table table-hover text-center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Direccion</th>
                                    <th>Ciudad</th>
                                    <th>Sede</th>
                                    <th>Acciones</th>
                                    <!-- <th>Imagen</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(publisher, index) in publishers" :key="index">
                                    <td>{{publisher.id}}</td>
                                    <td>{{publisher.name }}</td>
                                    <td>{{publisher.address }}</td>
                                    <td>{{publisher.city }}</td>
                                    <td>{{publisher.site }}</td>
                                    <td>
                                      <a class="btn btn-warning" href="#" @click.prevent="editPublisher(publisher)">Editar</a>
                                      <a class="btn btn-danger" href="#" @click.prevent="borrarpublisher(id)">Borrar</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div v-if="load_modal">
                        <publisher-form :publisher="publisher"></publisher-form>
                    </div>
                </div>
    </template>
<script>

import publisherForm from './form'
export default {
    props:['publishers'],
    components:{
        publisherForm
    },
    data(){
        return{
            publisher: {},
            load_modal: false
        }
    },
    methods:{
        editPublisher(publisher){
            this.load_modal = true
            this.publisher = publisher
            setTimeout(() =>
                    $('#modalpublisher').modal('show')
                , 200);
        },
        createpublisher() {
                this.load_modal = true
                this.publisher = {}
                setTimeout(() =>
                    $('#modalpublisher').modal('show')
                , 200);


            },
            closeModal() {
                $('#modalpublisher').modal('hide')
                setTimeout(() =>
                this.load_modal = false
                , 200);
            },

            borrarpublisher: function (id) {
              this.load_modal(id, 1)
            }
    }
}

</script>
