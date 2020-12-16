<template>
    <div class="categoryMeny ">
         <v-img
              src='../../assets/meat.gif'
              height="300px"
              >
              
        </v-img>
          <v-card
            class="pa-2"
            outlined
            shaped
            dark
          >
            <div class="menuTitle"> Меню </div>
          </v-card>
     
     
         <v-container fluid>
            
            <v-row dense>
             
                <v-col
                v-for="categorys in CATEGORYS"
                        :key="categorys.id"
                        
                > 
                <v-category-item  
                     :category_data="categorys"   
                />
            </v-col> 
        </v-row>   
    </v-container>
    </div>
</template>
<script>
import {mapGetters, mapActions} from 'vuex'
import vCategoryItem from '../components/v-category-item.vue';

export default {
  components: { vCategoryItem },
    name: "CategoryMenu",
    data(){
        return {
            drawer: null
        }
    },
    computed:{
      ...mapGetters([
        'CATEGORYS',
      ]),
    },
    methods:{
      ...mapActions([
        'GET_CATEGORYS_FROM_API',
      ]),
    },
    mounted() {
      if (!this.CATEGORYS.length) {
        this.GET_CATEGORYS_FROM_API();
    }
    }
}
</script>
<style scoped>
.menuTitle{
  font-size: 25px;
}
</style>