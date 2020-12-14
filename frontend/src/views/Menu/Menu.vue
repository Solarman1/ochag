<template>
  <v-product-item />
</template>

<script>
import {mapGetters, mapActions} from 'vuex'

import VProductItem from '../components/v-product-item.vue'

export default {
  components: {VProductItem},
    name: "Menu",
    props: {},
    data() {
        return {}
    },
    computed: {
      ...mapGetters([
        'PRODUCTS'
      ]),
      product() {
        let result = {}
        let vm = this;
        this.PRODUCTS.find(function (item) {
          if (item.article === vm.$route.query.product) {
            result = item;
          }
        })
        return result;
      }
    },
    methods: {
      ...mapActions([
        'GET_PRODUCTS_FROM_API',
      ]),
    },
    mounted() {
      if (!this.PRODUCTS.length) {
        this.GET_PRODUCTS_FROM_API()
      }
      
    }
  }
</script>


<style lang="stylus" scoped>

</style>