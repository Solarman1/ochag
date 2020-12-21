<template>
<div class="v-category-item">
                <v-card
                    class="mx-auto" 
                    max-width="344" >
                        <v-img
                        src="https://cdn.vuetifyjs.com/images/cards/sunshine.jpg"
                        height="200px"
                        ></v-img>

                        <v-card-title>
                        {{category_data.name}}
                        </v-card-title> 

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