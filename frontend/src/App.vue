<template>

  <v-app id="inspire" >
    <v-navigation-drawer
      v-model="drawer"
      app
      color = "#15151d"
    >
      <v-list dense>


        <v-expansion-panels accordion>
          <v-expansion-panel>
            <v-expansion-panel-header>О нас <v-icon>mdi-home</v-icon></v-expansion-panel-header>
              <v-expansion-panel-content>

                <v-list-item  to='/about' link>
                  <v-list-item-action >
                   
                  </v-list-item-action>
                    <v-list-item-content>
                      <v-list-item-title>О нас</v-list-item-title>
                    </v-list-item-content>
                </v-list-item>

                <v-list-item to='/' link>
                  <v-list-item-content>
                      <v-list-item-title>Фото</v-list-item-title>
                    </v-list-item-content>
                  <v-list-item-action>
                    <v-icon>mdi-camera</v-icon>
                  </v-list-item-action>
                    
                </v-list-item>

                <v-list-item to='/' link>
                  
                    <v-list-item-content>
                      <v-list-item-title>Летняя веранда</v-list-item-title>
                    </v-list-item-content>
                    <v-list-item-action>
                    
                  </v-list-item-action>
                </v-list-item>

                <v-list-item to='/' link>
            
                    <v-list-item-content>
                      <v-list-item-title>Комплексные обеды</v-list-item-title>
                    </v-list-item-content>
                          <v-list-item-action>
                    
                  </v-list-item-action>
                </v-list-item>



              </v-expansion-panel-content>
          </v-expansion-panel>
        </v-expansion-panels>

        <v-expansion-panels accordion>
          <v-expansion-panel>
            <v-expansion-panel-header>Меню<v-icon>mdi-food</v-icon></v-expansion-panel-header>
              <v-expansion-panel-content>

                <v-list-item to='/menu' link>
                 
                    <v-list-item-content>
                      <v-list-item-title>Шашлыки</v-list-item-title>
                    </v-list-item-content>
                     <v-list-item-action>
                    
                  </v-list-item-action>
                </v-list-item>

                <v-list-item to='/' link>
                  
                    <v-list-item-content>
                      <v-list-item-title>Комплексные обеды</v-list-item-title>
                    </v-list-item-content>
                    <v-list-item-action>
                   
                  </v-list-item-action>
                </v-list-item>

                <v-list-item to='/' link>
                 
                    <v-list-item-content>
                      <v-list-item-title>Пицца</v-list-item-title>
                    </v-list-item-content>
                     <v-list-item-action>
                    <v-icon>mdi-pizza</v-icon>
                  </v-list-item-action>
                </v-list-item>

                <v-list-item to='/' link>
                
                    <v-list-item-content>
                      <v-list-item-title>Супы</v-list-item-title>
                    </v-list-item-content>
                      <v-list-item-action>
                    <v-icon>mdi-soup</v-icon>
                  </v-list-item-action>
                </v-list-item>


              </v-expansion-panel-content>
          </v-expansion-panel>
        </v-expansion-panels>


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
    </v-navigation-drawer>


    <v-app-bar
      app
      color="#15151d"
      dark
    >
      <v-app-bar-nav-icon @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
      <v-toolbar-title>Кафе-бистро Очаг</v-toolbar-title>
        <v-spacer></v-spacer>
        <v-spacer></v-spacer>
        <v-btn icon>
          <v-icon>mdi-cart</v-icon>
        </v-btn>
     
    </v-app-bar>

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
    <v-footer
      color="#474428"
      dark
      padless
    >
     
     <v-card
      class="flex"
      flat
      tile
      color = "#15151d"
    >
      <v-card-title >
        <strong class="subheading"><a href="tel:+496170961709" >Тел: 47-22-11</a></strong>
        

        <v-spacer></v-spacer>

        <v-btn
          v-for="icon in icons"
          :key="icon"
          class="mx-4"
          dark
          icon
        >
          <v-icon size="24px">{{ icon }}</v-icon>
        </v-btn>
      </v-card-title>

      <v-card-text class="py-2 white--text text-center">
        <strong>г. Омск, Адреса: Ул. Волочаевская 19 к4 </strong>
        <strong>, ул. Карла Либкнехта, 6</strong>
      </v-card-text>
    </v-card>
  
    </v-footer>
  </v-app>
</template>

<script>
export default {
  name: 'App',

   props: {
      source: String,
    },
    data: () => ({
      drawer: null,
      icons: [
        'mdi-vk',
        'mdi-instagram',
      ],
    }),
};
</script>
<style scoped>
#inspire{
   background-image: url("./assets/tree.jpg");
   background-size: cover;
}
a:hover{
  color: rgb(110, 48, 24);
};
</style>