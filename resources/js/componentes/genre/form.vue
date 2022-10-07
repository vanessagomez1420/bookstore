<template>
    <div class="modal" tabindex="-1" id="modalGenre">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Nuevo Genero</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                       <form @submit.prevent="storeGenre">
                        <div class="form-group">
                            <label>Nombre del genero</label>
                          <input type="text" class="form-control" placeholder="Ingrese el nombre del genero" v-model="genre.name" required>
                            </div>
                            <div class="form-group">
                                <label>Descripcion</label>
                                <textarea class="form-control" placeholder="agregue la descripcion" v-model="genre.description" required></textarea>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </template>

    <script>
        export default {
            props: ['genre'],
            methods: {
               async storeGenre() {

                let url = '/genre/store'
                let res = null

                if (!this.genre.id){
                    res = await axios.post(url, this.genre)
                } else{
                      url = `/genre/update/${this.genre.id}`
                      res = await axios.put(url, this.genre)
                }


                if (res.data.saved) {
                            alert(`${res.data.message}`)
                            if(!this.genre.id){
                            this.$parent.$parent.genres_news.push(res.data.genre)
                            }
                        }
                        this.$parent.closeModal()
                    }
            }
        }
    </script>
