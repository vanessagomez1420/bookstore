<template>
    <div class="card">
        <div class="card-header text-center">
            <h3 class="card-title">Editorial</h3>
            <a class="btn btn-success" @click.prevent="createpublisher">
                <i data-feather="plus-square"></i>Nuevo Editorial
            </a>
        </div>
        <div class="card-body">
            <publisher-tabla ref="publisherTabla" :publishers="publishers_news"></publisher-tabla>
        </div>
    </div>
</template>

<script>
    import publisherTabla from './tabla'


    export default {
        props: ['publishers'],
        components: {
            publisherTabla
        },
        data() {
            return {
                publishers_news: this.publishers
            }
        },
        methods: {
            createpublisher(){
              this.$refs.publisherTabla.createpublisher()
            }
        }
    }
</script>
