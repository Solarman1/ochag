<template>
 <div class="categoryMeny">
         <v-container fluid> 
            <v-row dense>
                <v-col
                v-for="products in productItems"
                :key="products.id"        
                > 
                <v-product-item 
                     :product_data="products"
                     @addToCart="addToCart" 
                />
            </v-col> 
        </v-row>   
    </v-container>
    </div>
</template>

<script>
import {mapGetters, mapActions} from 'vuex'

import VProductItem from '../components/v-product-item.vue'

export default {
    name: "ProductMenu",
    components: {VProductItem},
    props: {},
    data() {
        return {
          messages: [],
        }

    },
    computed: {
      ...mapGetters([
        'PRODUCTS',
        'CART'
      ]),
      productItems()  {
          let productSorted = this.PRODUCTS.filter(item => item.categoriId == this.$route.query.product);
          // console.log(productSorted);
          return productSorted;
        }
      },
    methods: {
      ...mapActions([
        'GET_PRODUCTS_FROM_API',
        'ADD_TO_CART'
      ]),

      addToCart(data){
        this.ADD_TO_CART(data).
        then(() => {
          let timeStamp = Date.now().toLocaleString();
          this.messages.unshift(
            {name: 'Товар добавлен', id: timeStamp}
          )
        })
      },
    },
    mounted() {
      if (!this.PRODUCTS.length) {
        this.GET_PRODUCTS_FROM_API();
        // console.log('this route -> ');
        // console.log(this.$route.query.product);

      }      
    }
  }
</script>


<style lang="stylus" scoped>

</style>