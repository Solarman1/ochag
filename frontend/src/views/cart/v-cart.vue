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
    
    <v-simple-table v-if="cart_data.length">
        <template v-slot:default>
        <thead>
            <tr>
            <th class="text-left">
               
            </th>
            <th class="text-left">
               
            </th>
            <th class="text-left">
               
            </th>
            <th class="text-center">
               Количество
            </th>
            <th class="text-center">
               
            </th>
            <th class="text-left">
               
            </th>
            </tr>
        </thead>
 <tbody>
    <vCartItem
    class="mx-auto" 
    
     v-for="(item, index) in cart_data"
      :key="item.id"
        :cart_item_data="item"
        @deleteFromCart="deleteFromCart(index)"
        @increment="increment(index)"
        @decrement="decrement(index)"
    />
       </tbody>
        </template>
    </v-simple-table>  
    <v-card
            class="pa-2"
            outlined
           
            dark
        >
            <h2 v-if="cart_data.length">
            <p class="total__name">Итого:  {{cartTotalCost}} руб. </p>
           
            <!-- <p> | toFix | formattedPrice}}</p> -->
            </h2>
    </v-card>    
  
      
    
            <v-card
                class="mt-15 mx-auto"
                v-if="cart_data.length"
            >
            <v-card-title class="text--center">Оформление заказа</v-card-title>
              <v-form
                    ref="form"
                    v-model="valid"
                    lazy-validation
                    class="pb-10"
                >
                    <v-text-field
                    v-model="name"
                    :counter="10"
                    :rules="nameRules"
                    label="Имя"
                    required
                    ></v-text-field>

                    <v-text-field
                    v-model="email"
                    :rules="emailRules"
                    label="Телефон"
                    required
                    ></v-text-field>

                    <v-text-field
                    v-model="email"
                    :rules="emailRules"
                    label="E-mail"
                    required
                    ></v-text-field>

                    <v-text-field
                    v-model="name"
                    :rules="nameRules"
                    label="Улица и дом"
                    required
                    ></v-text-field>

                     <v-textarea
                        v-model="bio"
                        auto-grow
                        filled
                        color="deep-purple"
                        label="Время заказа"
                        rows="1"
                    ></v-textarea>

                    <v-textarea
                        name="input-7-1"
                        filled
                        label="Комментарий к заказу"
                        auto-grow
                        value="The Woodman set to work at once, and so sharp was his axe that the tree was soon chopped nearly through."
                    ></v-textarea>

                    <v-checkbox
                    v-model="checkbox"
                    :rules="[v => !!v || 'You must agree to continue!']"
                    label="Я прочитал и согласен с условиями пользовательского соглашения и политики конфиденциальности, даю согласие на обработку персональных данных."
                    required
                    >
                    </v-checkbox>

                    <v-btn
                    :disabled="!valid"
                    color="success"
                    class="mr-4"
                    >
                    Оплата на сайте
                    </v-btn>

                    <v-btn
                    color="error"
                    class="mr-4"
                    
                    >
                    Курьеру наличными
                    </v-btn>

                    <v-btn
                    color="warning"
                    >
                    Курьеру картой
                    </v-btn>
                </v-form >

            </v-card>   
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
      logdata(){
        console.log('cart data');
        return console.log(this.cart_data);
      },
      cartTotalCost() {
        let result = []
        if (this.cart_data.length) {
          console.log(this.cart_data)
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