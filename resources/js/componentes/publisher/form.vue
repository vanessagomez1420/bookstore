<template>
    <div class="modal" tabindex="-1" id="modalpublisher">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Nuevo Editorial</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                       <form @submit.prevent="storepublisher">
                        <div class="form-group">
                        <label>Nombre</label>
                          <input type="text" class="form-control" placeholder="Ingrese los nombres del editorial" v-model="publisher.name" required>
                            </div>
                            <div class="form-group">
                                <label>Direccion de la editorial</label>
                                <input type="text" class="form-control" placeholder="Ingrese la direccion del editorial"
                                    v-model="publisher.address " required>
                            </div>
                            <div class="form-group">
                                <label>Cuidad de la editorial</label>
                                <input type="text" class="form-control" placeholder="Ingrese la ciudad del editorial"
                                    v-model="publisher.city" required>
                            </div>
                            <div class="form-group">
                                <label>Sede de la editorial</label>
                                <textarea class="form-control" placeholder="agregue la sede del editorial" v-model="publisher.site" required></textarea>
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
            props: ['publisher'],
            methods: {
               async storepublisher() {

                let url = '/publisher/store'
                let res = null

                if (!this.publisher.id){
                    res = await axios.post(url, this.publisher)
                } else{
                      url = `/publisher/update/${this.publisher.id}`
                      res = await axios.put(url, this.publisher)
                }
                const {data} = res
                console.log(data)


                if (data.saved) {
                            alert(`${data.message}`)
                            if(!data.publisher.id){
                            this.$parent.$parent.publishers_news.push(data.publisher)
                            }
                        }
                        this.$parent.closeModal()
                }
            }
        }
    </script>
