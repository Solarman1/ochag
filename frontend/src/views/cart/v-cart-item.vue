<template>
  <div class='v-cart-item'>


    <v-simple-table dark>
        <template v-slot:default>
        <thead>
            <tr>
            <th class="text-left">
                img
            </th>
            <th class="text-left">
                name
            </th>
            <th class="text-left">
                price
            </th>
            <th class="text-left">
                actions
            </th>
            <th class="text-left">
                total price
            </th>
            <th class="text-left">
                delete
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
            <td>{{cart_item_data.name}}</td>
            <td>{{cart_item_data.price}}</td>
            <td>
                <span class="quantity__btn" @click="decrementItem">-</span>
                 <!-- <p>{{cartTotalCost | toFix | formattedPrice}}</p> -->
                <span class="quantity__btn" @click="incrementItem">+</span>
            </td>
            <td>{{formattedPrice}}</td>
            <td><button @click="deleteFromCart">Delete</button></td>
            </tr>
        </tbody>
          </template>
          
    </v-simple-table>  
       
            <v-card
                class="mt-15 mx-auto"
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

    

      <!-- <v-card
        class="mx-auto" 
        max-width="344" >

        <v-img 
        :src="'http://127.0.0.1:8000/storage/productImages/'+cart_item_data.image">

        </v-img>
        <v-card-text>
        <v-card-title 
                class="black--text"
                >
                {{cart_item_data.name}}
        </v-card-title>
        <p>{{cart_item_data.price | toFix | formattedPrice}}</p>
        <p>{{cart_item_data.description}}</p>
        </v-card-text>
        <div class="v-cart-item__quantity">
        <p>Qty:</p>
        <span class="quantity__tools">
            <span class="quantity__btn" @click="decrementItem">-</span>
            {{cart_item_data.quantity}} 
             <span class="quantity__btn" @click="incrementItem">+</span>
        </span>
        </div>
        <button @click="deleteFromCart">Delete</button>
    </v-card> -->
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

