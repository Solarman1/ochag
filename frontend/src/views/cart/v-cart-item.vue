<template>
  <div class='v-cart-item'>
    <v-img 
    :src="'http://127.0.0.1:8000/storage/productImages/'+cart_item_data.image">

    </v-img>
    <div class="v-cart-item__info">
      <p>{{cart_item_data.name}}</p>
      <p>{{cart_item_data.price | toFix | formattedPrice}}</p>
      <p>{{cart_item_data.description}}</p>
    </div>
    <div class="v-cart-item__quantity">
      <p>Qty:</p>
      <span class="quantity__tools">
        <span class="quantity__btn" @click="decrementItem">-</span>
        <!-- {{cart_item_data.quantity}} -->
        <span class="quantity__btn" @click="incrementItem">+</span>
      </span>
    </div>
    <button @click="deleteFromCart">Delete</button>
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

