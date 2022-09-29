<template>
    <div class="modal" tabindex="-1" id="modalBook">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Nuevo Libro</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                       <form @submit.prevent="storeAuthor">
                        <div class="form-group">
                        <label>Titulo</label>
                          <input type="text" class="form-control" placeholder="Ingrese el titulo" v-model="book.title" required>
                            </div>
                            <div class="form-group">
                                <label>Paginas</label>
                                <input type="text" class="form-control" placeholder="Ingrese el numero de paginas"
                                    v-model="book.pages" required>
                            </div>
                            <div class="form-group">
                                <label>Lenguaje</label>
                                <input type="text" class="form-control" placeholder="Ingrese el lenguaje del libro"
                                    v-model="book.language" required>
                            </div>
                            <div class="form-group">
                                <label>Fecha de publicacion</label>
                                <input type="date" class="form-control" v-model="book.publication_date" required>
                            </div>
                            <div class="form-group">
                                <label>Precio</label>
                                <textarea class="form-control" placeholder="agregue el precio" v-model="book.price" required></textarea>
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
            props: ['book'],
            methods: {
               async storeBook() {

                let url = '/book/store'
                let res = null

                if (!this.book.id){
                    res = await axios.post(url, this.book)
                } else{
                      url = `/book/update/${this.book.id}`
                      res = await axios.put(url, this.book)
                }


                if (res.data.saved) {
                            alert(`${res.data.message}`)
                            if(!this.book.id){
                            this.$parent.$parent.books_news.push(res.data.book)
                            }
                        }
                        this.$parent.closeModal()
                }
            }
        }
    </script>

