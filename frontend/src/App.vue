<template>
  <v-app id="inspire" class="text-center white--text">
    <v-header-page :drawerChange="drawerChange" :drawer="null" />
    <v-navigation-page  />
    <v-main>
      <v-container
        class="fill-height"
        fluid
      >
        <v-row
          align="center"
          justify="center"
        >
          <v-col class="text-center">
            
            <router-view />

          </v-col>
        </v-row>
      </v-container>
    </v-main>

    <v-footer-page />
  </v-app>
</template>

<script>
import VFooterPage from './views/components/v-footer-page.vue';
import VHeaderPage from './views/components/v-header-page.vue';
import VNavigationPage from './views/components/v-navigation-page.vue';


export default {
  name: 'App',
  
  components: {
    VFooterPage,
    VHeaderPage,
    VNavigationPage
     
    },
    data: () => ({
 
    }),
    computed:{},
    methods:{
      drawerChange(){

      },
    },
    mounted(){}
};
</script>
<style>
@import url('https://fonts.googleapis.com/css2?family=Balsamiq+Sans&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Fira+Sans+Extra+Condensed:wght@500&display=swap');
/* @import url('https://fonts.googleapis.com/css2?family=Fira+Sans+Extra+Condensed:wght@500;800&display=swap'); */

.v-application {
   font-family: 'Fira Sans Extra Condensed', sans-serif !important;
   
 }
.v-application a, a:active, a:visited, a:root, a:hover, a:before{
  color: #F4511E !important;
}
.v-list-item--active{
  color: #F4511E !important;
}

.v-list-item v-list-item--link theme--dark:visited, v-list-item--link theme--dark:active{
  color: #F4511E !important;
}
.v-list-item--dense .v-list-item__title, .v-list-item--dense .v-list-item__subtitle, .v-list--dense .v-list-item .v-list-item__title, .v-list--dense .v-list-item .v-list-item__subtitle{
  font-size: 17px;
}

#inspire{
   background-image: url("./assets/tree.jpg");
   background-size: cover;
}
a{
  background-color: transparent;
  text-decoration: none;
  color: white;
}
a:visited {
  color: white;
}
a:active {
  text-decoration: none;
  color: white;
}
/* a:hover{
  color: rgb(110, 48, 24);
}; */
</style>