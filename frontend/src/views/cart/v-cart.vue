<template>
  <div class='v-cart'>
        <v-card
            class="pa-2"
            outlined
            shaped
            dark
        >
            <router-link :to="{name: 'CategoryMenu'}">
                <div class="v-catalog__link_to_cart">Вернуться к меню</div>
            </router-link>
            <h1>Корзина</h1>
            <p v-if="!cart_data.length">Корзина пуста...</p>
        </v-card>   
    
    <vCartItem
    class="mx-auto" 
    max-width="344" 
     v-for="(item, index) in cart_data"
        :key="item.name"
        :cart_item_data="item"
        @deleteFromCart="deleteFromCart(index)"
        @increment="increment(index)"
        @decrement="decrement(index)"
    />    
  </div>
</template>
<script>
import vCartItem from './v-cart-item'
import {mapActions} from 'vuex'

export default {
 name: "v-cart",
    components: {
      vCartItem
    },
    props: {
      cart_data: {
        type: Array,
        default() {
          return []
        }
      }
    },
    data() {
      return {}
    },
    filters: {
    //   formattedPrice,
    //   toFix
    },
    computed: {
      cartTotalCost() {
        let result = []
        if (this.cart_data.length) {
          for (let item of this.cart_data) {
            result.push(item.price * item.quantity)
          }
          result = result.reduce(function (sum, el) {
            return sum + el;
          })
          return result;
        } else {
          return 0
        }
      }
    },
    methods: {
      ...mapActions([
        'DELETE_FROM_CART',
        'INCREMENT_CART_ITEM',
        'DECREMENT_CART_ITEM'
      ]),
      increment(index) {
        this.INCREMENT_CART_ITEM(index)
      },
      decrement(index) {
        this.DECREMENT_CART_ITEM(index)
      },
      deleteFromCart(index) {
        this.DELETE_FROM_CART(index)
      }
    }
  }
</script>
<style>

</style>