<template>
    <v-footer
      color="#474428"
      dark
      padless
    >
     
     <v-card
      class="flex text-center"
      flat
      tile
      color = "#15151d"
    >
      <v-card-text >
        <v-spacer></v-spacer>

        <v-btn
          class="mx-4"
          dark
          icon
        >
          <a href="https://vk.com/ochag55" target="_blank"><v-icon size="24px">mdi-vk</v-icon></a>
        </v-btn>
        
        <v-btn
          class="mx-4"
          dark
          icon
        >
          <a href="https://www.instagram.com/ochag_55/" target="_blank"><v-icon size="24px">mdi-instagram</v-icon></a>
        </v-btn>
      </v-card-text>

      <v-card-text class="py-2 white--text text-center">
        <strong class="footerText">Адреса: г. Омск, ул. Волочаевская 19 к4 </strong>
        <strong class="footerText">, ул. Карла Либкнехта, 6</strong>
      </v-card-text>
    </v-card>
  
    </v-footer>
</template>
<script>
export default {
    name: "v-footer-page",

    data(){
        return {
        }
    },
}
</script>
<style>
.footerText{
  font-size: 20px;
}
</style>