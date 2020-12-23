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
                class="mt-15 mx-auto pa-16"
                v-if="cart_data.length"
                
            >
            <v-card-title class="text--center">Оформление заказа</v-card-title>

            <template>
              <v-form
                    ref="form"
                    v-model="valid"
                    lazy-validation
                    class="pb-10"
                >

                <v-container>
                <v-row>
                   <v-col md="5"> 
                     <v-text-field
                    v-model="name"
                    
                    :rules="nameRules"
                    name="Name"
                    label="Имя"
                    required
                    >
                    </v-text-field>
                   </v-col>

                  <v-col md="5">
                    <v-text-field
                    v-model="phone"
                    :counter="12"
                    :rules="phoneRules"
                    name="Phone"
                    label="Телефон"
                    required
                    ></v-text-field>
                  </v-col>                  
                </v-row>

                <v-row>

                  <v-col md="5"> 
                    <v-text-field
                    v-model="adres"
                    :rules="adresRules"
                    name="Adres"
                    label="Улица, дом/подьезд/квартира/офис"
                    required
                    ></v-text-field>
                  </v-col>
                  
                  <v-col md="5">
                    <v-text-field
                    v-model="email"
                    :rules="emailRules"
                    name="Email"
                    label="E-mail"
                    required
                    ></v-text-field>
                  </v-col>
                    
                </v-row>

                <v-row>
                  <v-col md="2">
                    <v-text-field
                        v-model="deliveryTime"
                        :rules="deliveryTimeRules"
                        name="DeliveryTime"
                        color="deep-purple"
                        label="Время заказа"
                    ></v-text-field>
                  </v-col>

                  <v-col md="2">
                    <v-text-field
                        v-model="personsCount"
                        name="PersonsCount"
                        color="deep-purple"
                        label="Количество персон(приборы)"
                    ></v-text-field>

                    
                  </v-col>
                   
                </v-row>
                <v-row>

                  <v-col md="10">
                  <v-textarea
                      name="Description"
                      filled
                      label="Комментарий к заказу"
                      auto-grow
                  ></v-textarea>
                  </v-col>
                  
                </v-row> 
                   
                </v-container>

          <v-container fluid>
            <v-radio-group v-model="radios">
              <template v-slot:label>
                <div>Способ оплаты</div>
              </template>
              <v-radio @click="paymentCashFalse" value="1">
                <template v-slot:label>
                  <div>Расчет на сайте</div>
                </template>
              </v-radio>
              <v-radio @click="paymentCash" value="2">
                <template v-slot:label>
                  <div>Расчет по карте курьеру</div>
                </template>
              </v-radio>
              <v-radio @click="paymentCashFalse" value="3">
                <template v-slot:label>
                  <div>Расчет наличными курьеру</div>
                </template>
              </v-radio>
            </v-radio-group>

            <v-row v-if="offlineCash == true" >
                  <v-col md="1">
                  Потребуется сдача? 
                    <v-text-field
                        name="Sdacha"
                        color="deep-purple"
                        label="руб."
                    ></v-text-field>
                  </v-col>              
                </v-row>
          </v-container>

                    
          <v-container fluid>
              <v-checkbox v-model="checkbox"  :rules="[v => !!v || 'Для офрмления вы должны ознакомиться с правилами оказания услуг']" required>
                <template v-slot:label>
                  <div>
                    Я прочитал и согласен с условиями 
                    <v-tooltip bottom>
                      <template v-slot:activator="{ on }">
                        <a
                          target="_blank"
                          href="http://vuetifyjs.com"
                          @click.stop
                          v-on="on"
                        >
                          пользовательского соглашения
                        </a>
                      </template>
                      Открыть 
                    </v-tooltip>
                    и
                    <v-tooltip bottom>
                      <template v-slot:activator="{ on }">
                        <a
                          target="_blank"
                          href="http://vuetifyjs.com"
                          @click.stop
                          v-on="on"
                        >
                          политики конфиденциальности
                        </a>
                      </template>
                      Открыть 
                    </v-tooltip>
                , даю согласие на обработку персональных данных.
                  </div>
                </template>
              </v-checkbox>
            </v-container>
   
 
                    

                    <v-btn
                    block
                    :disabled="!valid"
                    color="success"
                    class="mr-4"
                    @click="validate"
                    type="submit"
                    >
                    Заказать
                    </v-btn>

                </v-form >
              </template>
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
      return {
        offlineCash: false,

        valid: true,

      deliveryTime: '',
      deliveryTimeRules: [
        v => !!v || 'Введите желаемое время доставки',
      ],
      personsCount: '',
      adres: '',
      adresRules: [
        v => !!v || 'Введите адрес доставки',
      ],
      phone: '',
      phoneRules: [
        v => !!v || 'Введите ваш номер',
      ],
      name: '',
      nameRules: [
        v => !!v || 'Введите имя',
        v => (v && v.length <= 40) || 'Name must be less than 10 characters',
      ],
      email: '',
      emailRules: [
        v => !!v || 'E-mail поле обязательно для заполнения',
        v => /.+@.+\..+/.test(v) || 'Введите валидный - E-mail адрес',
      ],
      select: null,
      items: [
        'Item 1',
        'Item 2',
        'Item 3',
        'Item 4',
      ],
      checkbox: false,
      }
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
      },
      validate () {
        this.$refs.form.validate()
      },
      reset () {
        this.$refs.form.reset()
      },
      resetValidation () {
        this.$refs.form.resetValidation()
      },
      paymentCash()
      {
        this.offlineCash = true;
      },
      paymentCashFalse()
      {
        this.offlineCash = false;
      }
    }
  }
</script>
<style>

</style>