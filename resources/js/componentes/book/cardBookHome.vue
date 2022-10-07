<template>
    <section class="d-flex justify-content-between flex-wrap">
        <div id="bookCard" class="card mx-2 my-4" style="width: 17rem; height: 17rem" v-for="(book, index) in books" :key="index" >
            <img src="" class="card-img-top" alt="default"/>
            <div class="card-body">
                <h5 class="card-title">{{book.title}}</h5>
                <p class="card-text">{{ book.image}}</p>
                <p class="card-text">{{book.author.sur_name}}</p>
                <p class="card-text">{{book.price }}</p>
                <p class="card-text">{{book.publisher.name}}</p>
                <p class="card-text">{{book.genre.name}}</p>

                <a href="carrito" @submit.prevent="añadircarrito"  class="btn btn-primary">Agregar al carrito</a>
            </div>
        </div>
    </section>
</template>
<script>
export default {
    props: ["books"],
    data() {
        return {

        };
    },
    mounted() {
        $("#bookCard");
    },

};
</script>
