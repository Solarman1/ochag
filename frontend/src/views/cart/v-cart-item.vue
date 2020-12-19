<template>
            <tr
            >

            <td>
                <v-img 
                max-height="70"
                max-width="150"
                :src="'http://127.0.0.1:8000/storage/productImages/'+cart_item_data.image">
                </v-img>
            </td>

            <td  class="text-center">
              <p class="price_p">{{cart_item_data.name}}</p>
            </td>

            <td class="text-center">
              <p class="price_p">{{cart_item_data.price}} руб. </p>
              </td>
            <td>
                
                 <p class="price_p">
                  <span class="quantity__btn" @click="decrementItem"><v-icon>mdi-minus</v-icon></span> 
                  {{cart_item_data.quantity}} 
                 <span class="quantity__btn" @click="incrementItem"><v-icon>mdi-plus</v-icon></span>
                 </p> 
                
            </td>
            <td>{{formattedPrice}}</td>
            <td><button @click="deleteFromCart"><v-icon>mdi-delete</v-icon></button></td>
            </tr>
</template>
<script>
export default {
    name: "v-cart-item",
    props: {
      cart_item_data: {
        type: Object,
        default() {
          return {}
        }
      }
    },
    data() {
      return {}
    },
    filters: {
    //   toFix,
    //   formattedPrice
    },
    computed: {},
    methods: {
      decrementItem() {
        this.$emit('decrement')
      },
      incrementItem() {
        this.$emit('increment')
      },
      deleteFromCart() {
        this.$emit('deleteFromCart')
      }
    }
  }
</script>
<style>
.price_p{
  font-size: 20px;
}
</style>

