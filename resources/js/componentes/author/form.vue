<template>
<div class="modal" tabindex="-1" id="modalAuthor">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Nuevo Autor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                   <form @submit.prevent="storeAuthor">
                    <div class="form-group">
                    <label>Nombres</label>
                      <input type="text" class="form-control" placeholder="Ingrese los nombres del autor" v-model="author.sur_name" required>
                        </div>
                        <div class="form-group">
                            <label>Apellidos</label>
                            <input type="text" class="form-control" placeholder="Ingrese los apellidos del autor"
                                v-model="author.last_name " required>
                        </div>
                        <div class="form-group">
                            <label>Nacionalidad</label>
                            <input type="text" class="form-control" placeholder="Ingrese la nacionalidad del autor"
                                v-model="author.citizenship " required>
                        </div>
                        <div class="form-group">
                            <label>Fecha de nacimiento</label>
                            <input type="date" class="form-control" v-model="author.date_of_birth " required>
                        </div>
                        <div class="form-group">
                            <label>Biografia</label>
                            <textarea class="form-control" placeholder="agregue la biografia del autor" v-model="author.bio " required></textarea>
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
        props: ['author'],
        methods: {
           async storeAuthor() {

            let url = '/author/store'
            let res = null

            if (!this.author.id){
                res = await axios.post(url, this.author) 
            } else{
                  url = `/author/update/${this.author.id}`
                  res = await axios.put(url, this.author)
            }
            

            if (res.data.saved) {
                        alert(`${res.data.message}`)
                        if(!this.author.id){
                        this.$parent.$parent.authors_news.push(res.data.author)
                        }
                    }
                    this.$parent.closeModal()
            }
        }
    }
</script>
