<template>
    <v-card
    class="mx-auto my-12" 
    max-width="344" >
        <v-img
        :src="'http://127.0.0.1:8000/storage/productImages/'+product_data.image"
        height="250px"
        >
        </v-img>

        <v-card-title>
         <div class="productName">{{product_data.name}}</div> 
        </v-card-title>

        <v-card-subtitle>
          {{product_data.weight}}
        </v-card-subtitle>
          <v-card-text>
              
                <v-card-title 
                class="black--text"
                >
                <div class="priceValue"><strong class="green--text text--lighten-1">{{product_data.price}}  руб.</strong></div>
                
                </v-card-title>
            
          </v-card-text>

        <v-card-actions class="pb-5">

        <v-btn
            class="ml-5"
            color="deep-orange darken-1"
            @click="addToCart"
        >
            В корзину
        </v-btn>

        <v-spacer></v-spacer>
           
       <v-btn
        class="mr-5"
        icon
        text
        @click="show = !show"
      >
      <strong > Состав </strong> 
        <v-icon>{{ show ? 'mdi-chevron-up' : 'mdi-chevron-down' }}</v-icon>
      </v-btn>
    </v-card-actions>

    <v-expand-transition>
      <div v-show="show">
        <v-divider></v-divider>

        <v-card-text>
          <div> {{product_data.description}}</div>
        </v-card-text>
      </div>
    </v-expand-transition>
    </v-card>
</template>

<script>
  export default {
    name: "v-product-item",
    components: {
    },
    props: {
      product_data: {
        type: Object,
        default() {
          return {}
        }
      }
    },
    data() {
      return {
        show: false,
      }
    },
    computed: {},
    methods: {
      addToCart() {
        this.$emit('addToCart', this.product_data);
        
      }
    },
    mounted(){
      this.$set(this.product_data, 'quantity', 1);    
    }
  }
    
</script>

<style>
.priceValue {
  font-size: 35px;
}
.productName {
  font-size: 28px;
}
</style>