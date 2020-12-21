<template>
    <v-app-bar
      app
      color="#15151d"
      dark
    >
    
      <v-app-bar-nav-icon @click.stop="drawerChange"></v-app-bar-nav-icon>
       <v-img
        max-height="150"
        max-width="50"
        src="../../assets/ochag_grill.png"
        >
        </v-img>

      <v-toolbar-title class="ml-5 text-center white--text"> <router-link to="/" class="white--text"> Кафе-бистро Очаг </router-link> </v-toolbar-title>
      <strong class="subheading  ml-5 text-h5 text-center text-decoration-none"> <v-icon>mdi-phone</v-icon> <a href="tel:+7(3812)472211" ><span class="white--text">47-22-11</span></a></strong>
        <v-spacer>  
     </v-spacer>

       
      <v-spacer></v-spacer>
       <v-btn icon x-large class="mr-15">
       <router-link :to="{name: 'Cart', params: {cart_data: CART}}">
          <v-icon>mdi-cart</v-icon>
          : {{CARTITEMSLENGTH}}
        </router-link>  
        </v-btn>
    </v-app-bar>
</template>
<script>

import {eventEmitter} from '../../main';
import {mapActions, mapGetters} from 'vuex'

export default {
     data() {
      return {
      }
    },
    name: "v-header-page",
    props: {
      cart_data: {
        type: Array,
        default() {
          return []
        }
      }
    },
    computed: {
      ...mapGetters([
        'CART',
        'CARTITEMSLENGTH'
      ])
    }, 
    methods: {
      ...mapActions([
      ]),
      drawerChange(){
          eventEmitter.$emit('changeDrawer');
      },      
    },
    // mounted() {
    //   this.ADD_TO_CART()
    //   .then((response)=> 
    //   {
    //     if(response)
    //     {
    //       console.log('up to cart'+response);
    //     }
    //   })
    // },   
}
</script>
<style>

</style>