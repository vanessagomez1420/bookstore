import './bootstrap';

import Vue from 'vue'
import RickAndMorty from './componentes/RickAndMorty'
import AuthorIndex from './componentes/author/index'

new Vue({
    el:'#app',
    components:{
        RickAndMorty,
        AuthorIndex
    }
})