<template>
 <div class="categoryMeny">
         <v-container fluid> 
            <v-row dense>
                <v-col
                v-for="products in PRODUCTS"
                :key="products.id"        
                > 
                <v-product-item 
                     :product_data="product" 
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
        'PRODUCTS'
      ]),
      product() {
        let result = {}
        let arrResult = []
        let vm = this;

        this.PRODUCTS.find(function(item) {
          if (item.categoriId === vm.$route.query.product) {
            result = item;
            arrResult[item.categoriId] = result;
            console.log('this if');  
          }
        })
        console.log(arrResult);
        return result;
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
        console.log('this route -> ');
        console.log(this.$route.query.product);
      }      
    }
  }
</script>


<style lang="stylus" scoped>

</style>