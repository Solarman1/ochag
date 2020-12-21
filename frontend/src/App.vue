<template>

  <v-app id="inspire" >


    <!-- <v-navigation-drawer
      v-model="drawer"
      app
      color="#15151d"
      dark
    >
      <v-list dense>

        <v-list-group dark>
        <template v-slot:activator>
          <v-list-item-content>
            <v-list-item-title>Меню</v-list-item-title>
          </v-list-item-content>
        </template>

        <v-list-item
          v-for="categorys in CATEGORYS"
          :key="categorys.id"
          @click="productClick(categorys.id)"
      
        >
          <v-list-item-content>
            <v-list-item-title v-text="categorys.name"></v-list-item-title>
          </v-list-item-content>
        </v-list-item>
      </v-list-group>

          <v-list-item to='/' link>
            <v-list-item-action>
              <v-icon>mdi-gift</v-icon>
            </v-list-item-action>
            <v-list-item-content>
              <v-list-item-title>Акции</v-list-item-title>
            </v-list-item-content>
          </v-list-item>

          <v-list-item to='/' link>
                  <v-list-item-action>
                    <v-icon>mdi-currency-usd</v-icon>
                  </v-list-item-action>
                    <v-list-item-content >
                      <v-list-item-title>Оплата и доставка</v-list-item-title>
                    </v-list-item-content>
                </v-list-item>

                <v-list-item to='/' link>
                  <v-list-item-action>
                    <v-icon>mdi-heart</v-icon>
                  </v-list-item-action>
                    <v-list-item-content>
                      <v-list-item-title>Отзывы</v-list-item-title>
                    </v-list-item-content>
                </v-list-item>

                <v-list-item to='/contacts' link>
                  <v-list-item-action>
                    <v-icon>mdi-email</v-icon>
                  </v-list-item-action>
                    <v-list-item-content>
                      <v-list-item-title>Контакты</v-list-item-title>
                    </v-list-item-content>
                </v-list-item>

      </v-list>
    </v-navigation-drawer> -->

    <v-header-page :drawerChange="drawerChange" :drawer="null" />
    <v-navigation-page  />
    <!-- <v-app-bar
      app
      color="#15151d"
      dark
    >
    
      <v-app-bar-nav-icon @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
       
      <v-toolbar-title>Кафе-бистро Очаг</v-toolbar-title>
      <strong class="subheading  ml-5 text-h5 text-center text-decoration-none"><a href="tel:+7(3812)472211" ><span class="white--text">47-22-11</span></a></strong>
        <v-spacer>  
     </v-spacer>

       
      <v-spacer></v-spacer>
       <v-btn icon x-large class="mr-15">
       
          <v-icon>mdi-cart</v-icon>
          
        </v-btn>
    </v-app-bar> -->

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
<style scoped>
#inspire{
   background-image: url("./assets/tree.jpg");
   background-size: cover;
}
a{
  text-decoration: none;
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