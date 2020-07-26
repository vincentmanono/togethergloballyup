<template>
    <div class="container">
        <div class="row justify-content-center">
              <div id="tikect" class="tikect col-md-3" data-id="one">
               <div class="tikectvalue">Next Time</div>
               <div class="title" > {{ chama['name'] }} </div>
              </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['chama',],
        name:"Tikect",
     data () {
         return {

         }
     }
    }
</script>

<style>
.title{
    color :white;
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
}

</style>
