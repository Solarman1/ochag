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
        src="../../assets/logo.jpg"
        >
        </v-img>

      <v-toolbar-title > <router-link to="/"> Кафе-бистро Очаг </router-link> </v-toolbar-title>
      <strong class="subheading  ml-5 text-h5 text-center text-decoration-none"><a href="tel:+7(3812)472211" ><span class="white--text">47-22-11</span></a></strong>
        <v-spacer>  
     </v-spacer>

       
      <v-spacer></v-spacer>
       <v-btn icon x-large class="mr-15">
       
          <v-icon>mdi-cart</v-icon>
          
        </v-btn>
    </v-app-bar>
</template>
<script>

import {eventEmitter} from '../../main';

export default {
    
    name: "v-header-page",
    props: {
    },
    methods: {
        drawerChange(){
            eventEmitter.$emit('changeDrawer');
        },  
    },
    data() {
      return {
      }
    }
}
</script>
<style>

</style>