<template>
    <section class="row mt-5">
    <div class="col-md-4 p-4 text-center" v-for="(character, index) in rick_and_morty.results" :key="index">
    <div @click="showCharacter(character)">
    <div>
       <img :src="`${character.image}`" alt="" class="img-fluid">
       <p>{{character.name}}</p>
  </div>
  </div>
</div>
    <div class="modal" tabindex="-1" id="modalRick">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">{{character.name}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <ul>
            <li>{{character.is_mega}}</li>
            <li>{{character.name}}</li>
            <li>{{character.abilities}}</li>
            <li>{{character.is_default}}</li>
        </ul>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

     </section>
</template>
<script>


export default {
    data(){
        return{
            rick_and_morty:[],
            character:{}
        }
    },
   created(){
      this.getData()
   },
   methods:{
     async getData(){
        await axios.get('https://rickandmortyapi.com/api/character').then(res=>{
            this.rick_and_morty = res.data
        })

     },
     showCharacter(character){
        this.character = character
        $('modalRick').modal('show')
     }
   }
}
</script>
