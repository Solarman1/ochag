<template>
  <v-app id="inspire">
    
    <v-app-bar
      app
      color="brown"
      dark
    >
      <v-app-bar-nav-icon @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
      <v-toolbar-title>Кафе-бистроgergregfas Очаг</v-toolbar-title>
      <v-icon></v-icon>
    </v-app-bar>

    <v-main>
     
    </v-main>
    <v-footer color="brown" app>
      
    </v-footer>
  </v-app>
</template>

<script>
  export default {
    props: {
      source: String,
    },
    data: () => ({
      drawer: null,
    }),
  }
</script>