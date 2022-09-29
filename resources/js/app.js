import './bootstrap';

import Vue from 'vue'
import RickAndMorty from './componentes/RickAndMorty'
import AuthorIndex from './componentes/author/index'
import PublisherIndex from './componentes/publisher/index'
import BookIndex from './componentes/book/index'

new Vue({
    el:'#app',
    components:{
        RickAndMorty,
        AuthorIndex,
        PublisherIndex,
        BookIndex
    }
})
