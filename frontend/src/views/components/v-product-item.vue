<template>
    <v-card
    class="mx-auto" 
    max-width="344" >
        <v-img
        :src="'http://127.0.0.1:8000/storage/productImages/'+product_data.image"
        height="200px"
        >
        </v-img>

        <v-card-title>
          {{product_data.name}}
        </v-card-title>

        <v-card-subtitle>
          {{product_data.price}}
        </v-card-subtitle>

        <v-card-actions>
        <v-btn text>Share</v-btn>

        <v-btn
            color="purple"
            text
        >
            Explore
        </v-btn>

        <v-spacer></v-spacer>

      
        </v-card-actions>

        <v-expand-transition>
        <div >
            <v-divider></v-divider>

            <v-card-text>
                  {{product_data.description}}
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
      }
    },
    computed: {}
  }
    
</script>

<style>

</style>