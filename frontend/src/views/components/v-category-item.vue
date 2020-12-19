<template>
<div class="v-category-item">
           
              <v-card
                class="mx-auto" 
                max-width="344" >

                <router-link :to="{name: 'ProductMenu', query: { 'product': category_data.id }}">
                        <v-img
                        :src="'http://127.0.0.1:8000/storage/categoryImages/'+category_data.image"
                        height="250px"
                        ></v-img>

                        <v-card-title>
                        {{category_data.name}}
                        </v-card-title> 
                </router-link>
              </v-card>    
                    
</div>
    
</template>
<script>
  export default {
    name: "v-category-item",
    components: {
    },
    props: {
      category_data: {
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