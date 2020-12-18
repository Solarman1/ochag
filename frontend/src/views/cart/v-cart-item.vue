<template>
  <div class='v-cart-item'>


    <v-simple-table>
        <template v-slot:default>
        <thead>
            <tr>
            <th class="text-left">
               
            </th>
            <th class="text-left">
               
            </th>
            <th class="text-left">
               
            </th>
            <th class="text-left">
               
            </th>
            <th class="text-left">
               
            </th>
            <th class="text-left">
               
            </th>
            </tr>
        </thead>
        <tbody>
            <tr
            >
            <td>
                <v-img 
                max-height="100"
                max-width="200"
                :src="'http://127.0.0.1:8000/storage/productImages/'+cart_item_data.image">
                </v-img>
            </td>
            <td  class="text-center">
              <p>{{cart_item_data.name}}</p>
              </td>
            <td class="text-center">
              <p>{{cart_item_data.price}}</p>
              </td>
            <td>
                <span class="quantity__btn" @click="decrementItem">-</span>
                  {{cart_item_data.quantity}}
                <span class="quantity__btn" @click="incrementItem">+</span>
            </td>
            <td>{{formattedPrice}}</td>
            <td><button @click="deleteFromCart">Delete</button></td>
            </tr>
        </tbody>
          </template>
          
    </v-simple-table>  
       
 </div>
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

</style>

