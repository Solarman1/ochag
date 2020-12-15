<template>
    <v-card
    :loading="loading"
    class="mx-auto my-12" 
    max-width="344" >
        <v-img
        :src="'http://127.0.0.1:8000/storage/productImages/'+product_data.image"
        height="250px"
        >
        </v-img>

        <v-card-title>
          {{product_data.name}}
        </v-card-title>

          <v-card-text>

            <div class="my-4 subtitle-1">
              $ • {{product_data.price}}
            </div>

            <div> {{product_data.description}}</div>
          </v-card-text>


        <v-card-actions>
        <v-btn text></v-btn>

        <v-btn
            color="purple"
            text
        >
            В корзину
        </v-btn>

        <v-spacer></v-spacer>

      
        </v-card-actions>

        <v-expand-transition>
        <div >
            <v-divider></v-divider>

            <v-card-text>
                 
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
        default() {
          return {}
        }
      }
    },
    data() {
      return {
      }
    },
    computed: {}
  }
    
</script>

<style>

</style>