<template>
  <div>

    <div class="flip-all">
      <div class="flip-col" v-if="show" >
        <div  v-for="(vote , index) in takevote()" :key="index" class="flip-card" @click.once ="voteone(vote)"   >
          <transition name="fade">
          <div class="flip-card-inner">
            <div class="flip-card-front">
              <img src="/assets/images.jpeg" alt="Avatar" style="width:300px;height:300px;" />
            </div>
            <div class="flip-card-back" :class="[ (vote == 'yes') ? 'win' : 'lose']"  >
              <h1>Voting result</h1>
                <p v-if="vote =='yes'" class="text h1 text-success text-bold text-center"  > Congradulations!! You  won this time </p>
              <p v-else class="h1 text text-warning text-bold" > You can try your lack next time </p>
            </div>
          </div>
        </transition>
        </div>
      </div>
      <div v-else class="col-8 offset-2 jumbotron center m-3" >
          <div class="responce text text-success text-center h1 " v-html="response"> </div>
          <div class="result">

               <p v-if="result =='yes'" class="text h2 text-success text-bold text-center"  > Congradulations!! You  won this time </p>
              <p v-else class="h2 text text-warning text-bold" > You can try your lack next time </p>
          </div>


      </div>
    </div>

  </div>
</template>

<script>
import _ from 'lodash';
// import { shuffle } from '../../../public/admin/plugins/filterizr/utils';
import Axios from "axios";
export default {
  props: {
    tickets: {
      type: Array,
      required: true
    },
    chama:Object,
    user:Object
  },

  name: "Tickects",
  data() {
    return {
      countTickets: "",
      show: true ,
      response:'',
      result:''
    };
  },

  computed: {
    Tickets() {
      return this.tickets;
    }
  },
  methods: {
    takevote() {
      let countTickets = this.Tickets.length;
      let nextTicket = [];
      for (let j = 0; j < countTickets - 1; j++) {
        nextTicket.push("no");
      }
      nextTicket.push("yes");
      var shuffleTicket =  _.shuffle(nextTicket);
      return shuffleTicket;
    },

    voteone(result){

       var url  = "https://togethergloballyup.com/api/subscribed-chama/" + this.chama.id ;

        var data = {
            pay:result,
            chama_id:this.chama.id,
            'user_id':this.user.id

        }

        $(document).ready(function () {

            $(".flip-card .flip-card-inner").addClass("voted")
        });


        Axios.post(url,data).then((response)=>{
           console.log(response.message)
            this.response = response.data.message;
            this.show = false ;
            this.result = result ;


        $(document).ready(function () {
            setTimeout(() => {
                 $(".flip-card .flip-card-inner").removeClass("voted")
            }, 200);


        });



        }).catch((error)=>{
            alert(error)
            console.error(error)
        }).finally(()=>{
            console.log("Complete")
        })
    }

  },
  created () {

  }
};
</script>
<style >
body {
  font-family: Arial, Helvetica, sans-serif;
}

.flip-all {
  background-color: wheat;
  width: auto;
  height: auto;
  display: grid;
  place-items: center;

}

.flip-col {
  display: grid;
  grid-gap: 1rem;
  padding: 1rem;
  max-width: 1024px;
  margin: 0 auto;
  font-family: var(--font-sans);

  grid-template-columns: repeat(3, 1fr);
}

.flip-card {
  background-color: transparent;
  width: 300px;
  height: 300px;
  perspective: 1000px;
  cursor: pointer;

  box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1), 0 2px 2px rgba(0, 0, 0, 0.1),
    0 4px 4px rgba(0, 0, 0, 0.1), 0 8px 8px rgba(0, 0, 0, 0.1),
    0 16px 16px rgba(0, 0, 0, 0.1);
}

.flip-card-inner {
  position: relative;
  width: 100%;
  height: 100%;
  text-align: center;
  transition: transform 0.6s;
  transform-style: preserve-3d;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
}

/* .flip-card:hover .flip-card-inner {
  transform: rotateY(180deg);
} */

.voted:hover{
      transform: rotateY(180deg);
}

.flip-card-front,
.flip-card-back {
  position: absolute;
  width: 100%;
  height: 100%;
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
}

.flip-card-front {
  background-color: #bbb;
  color: black;
}

.flip-card-back {

  color: white;
  transform: rotateY(180deg);
}

.win{
    background-color: darkgrey;
}
.lose{
    background-color: #2980b9;
}

.responce{
    border: 1px solid rgba(0, 0, 0, 0.1);
    border-radius: 10px;

}

/*
*/
</style>
