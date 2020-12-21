<template>
    <v-footer
      color="#474428"
      dark
      padless
    >
     
     <v-card
      class="flex"
      flat
      tile
      color = "#15151d"
    >
      <v-card-title >
        <v-spacer></v-spacer>

        <v-btn
          v-for="icon in icons"
          :key="icon"
          class="mx-4"
          dark
          icon
        >
          <v-icon size="24px">{{ icon }}</v-icon>
        </v-btn>
      </v-card-title>

      <v-card-text class="py-2 white--text text-center">
        <strong>г. Омск, Адреса: Ул. Волочаевская 19 к4 </strong>
        <strong>, ул. Карла Либкнехта, 6</strong>
      </v-card-text>
    </v-card>
  
    </v-footer>
</template>
<script>
export default {
    name: "v-footer-page",

    data(){
        return {
            icons: [
                'mdi-vk',
                'mdi-instagram',
            ],
        }
    },
}
</script>
<style>

</style>