<template>
     <div class="card">
                <div class="card-header text-center">
                    <h3 class="card-title">Autores</h3>
                    <a class="btn btn-success" href=""></a>"
                </div>
                <div class="card-body">
                    <author-tabla :authors="$authors"></author-tabla>
                </div>
            </div>
</template>

<script>

import AuthorTabla from './tabla'
export default {
    props:['authors'],
   components:{
        AuthorTabla
   }
}

</script>


