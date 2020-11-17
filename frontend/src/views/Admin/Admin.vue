<template>
<v-card height="350px">
    <v-navigation-drawer
      absolute
      permanent
      right
    >
      <template v-slot:prepend>
        <v-list-item two-line>
          <v-list-item-avatar>
            <v-icon>mdi-account</v-icon>
          </v-list-item-avatar>

          <v-list-item-content>
            <v-list-item-title>Admin</v-list-item-title>
            <v-list-item-subtitle>Выйти из админки</v-list-item-subtitle>
          </v-list-item-content>
        </v-list-item>
      </template>

      <v-divider></v-divider>

      <v-list dense>
        <v-list-item
          v-for="product in PRODUCTS"
          :key="product.id"
          
        >
          <v-list-item-icon>
            <v-icon>{{ item.icon }}</v-icon>
          </v-list-item-icon>

          <v-list-item-content>
            <v-list-item-title>{{ item.title }}</v-list-item-title>
          </v-list-item-content>
        </v-list-item>
      </v-list>
    </v-navigation-drawer>

      
    <v-data-table dense :headers="headers" :items="PRODUCTS" item-key="name" class="elevation-1"></v-data-table>
  </v-card>

       
     
</template>

<script>
import {mapActions, mapGetters} from 'vuex'

  export default {
    props: {
      source: String,
    },
    data() {
      return {
        headers: [
        {
          text: 'Name',
          align: 'start',
          sortable: false,
          value: 'name',
        },
        { text: 'Price', value: 'price' },
        { text: 'Description', value: 'description' },
        { text: 'image', value: 'image' },
      ],
      }
    },
    computed: {
      ...mapGetters([
        'PRODUCTS'
      ])
    },
    methods: {
      ...mapActions([
        'GET_PRODUCTS_FROM_API'
      ])
    },
    mounted() {
      this.GET_PRODUCTS_FROM_API()
    },
  }
</script>