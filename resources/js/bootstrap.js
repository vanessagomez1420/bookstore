window._ = require('lodash');
import bootstrap from "bootstrap"

// import DataTable from 'datatables.net-bs4'

// DataTable(window, jQuery)

try {
    window.Popper = require('popper.js').default
    window.$ = window.jQuery = require('jquery')
    window.bootstrap = bootstrap;
    require('./dataTables/jquery.dataTables.min.js')
    require('./dataTables/dataTables.bootstrap4.min.js')

} catch (e) {
}

window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}
