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
  components: {VProductItem},
    name: "ProductMenu",
    props: {},
    data() {
        return {
        }

    },
    computed: {
      ...mapGetters([
        'PRODUCTS',
        'CATEGORYPRODUCTS'
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
      ]),
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