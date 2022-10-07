import './bootstrap';

import Vue from 'vue'
import RickAndMorty from './componentes/RickAndMorty'
import AuthorIndex from './componentes/author/index'
import PublisherIndex from './componentes/publisher/index'
import BookIndex from './componentes/book/index'
import GenreIndex from './componentes/genre/index'
import cardBook from './componentes/book/cardBook'
import cardBookIndex from './componentes/book/cardBookIndex'

// import datatables from './componentes/book/datatables'



new Vue({
    el:'#app',
    components:{
        RickAndMorty,
        AuthorIndex,
        PublisherIndex,
        BookIndex,
        GenreIndex,
        cardBook,
        cardBookIndex

    }
})
