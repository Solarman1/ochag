<template>
<v-navigation-drawer
      v-model="drawer"
      app
      color="#15151d"
      dark
    >
      <v-list dense>

        <v-list-group dark>
        <template v-slot:activator  >
          <v-list-item-content>
            <v-list-item-title>Меню</v-list-item-title>
          </v-list-item-content>
        </template>

        <v-list-item
          v-for="categorys in CATEGORYS"
          :key="categorys.id"
          @click="productClick(categorys.id)"
      
        >
        <!-- <router-link :to="{ name: '/menu', params: { 'product': categorys.id }}">User</router-link> -->
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
    </v-navigation-drawer>
</template>
<script>
import { mapActions, mapGetters } from 'vuex';
import {eventEmitter} from '../../main';


export default {
    name: "v-navigation-page",
    data(){
        return {
            drawer: null
        }
    },
    computed:{
      ...mapGetters([
        'CATEGORYS',
      ]),
    },
    methods:{
        ...mapActions([
            'GET_CATEGORYS_FROM_API',
        ]),
        productClick(article) {
            this.$router.push({name: 'ProductMenu', query: { 'product': article }}).catch(()=>{});
        },
        
    },
    mounted(){
        this.GET_CATEGORYS_FROM_API()
        .then((response)=>{
            if(response.data)
            {
                console.log('data is true');
            }
        }),
        eventEmitter.$on('changeDrawer', () => {
            this.drawer = !(this.drawer);
        })
    }
}
</script>
<style>

</style>