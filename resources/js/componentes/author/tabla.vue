<template>
    <div class="table-responsive">
                        <table class="table table-hover text-center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombres</th>
                                    <th>Apellidos</th>
                                    <th>Fecha de Nacimiento</th>
                                    <th>Nacionalidad</th>
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
                                    <td>{{author.image}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
</template>

<script>
export default {
    props:['authors'],
}

</script>