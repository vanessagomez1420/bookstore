<template>
    <div class="card">
        <div class="card-header text-center">
            <h3 class="card-title">Carrito</h3>
            <a class="btn btn-success" @click.prevent="createCarrito">
                <i data-feather="plus-square"></i>Nuevo Producto
            </a>
        </div>
        <div class="card-body">
        <carrito-tabla  ref="carritoTabla" :carritos="carritos_news"></carrito-tabla>
        </div>
    </div>
</template>

<script>
    import carritoTabla from './tabla'


    export default {
        props: ['carritos'],
        components: {
            carritoTabla
        },
        data() {
            return {
            carritos_news: this.carritos
            }
        },
        methods: {
            createCarrito(){
              this.$refs.carritoTabla.createcarrito()
            }
        }
    }
</script>
