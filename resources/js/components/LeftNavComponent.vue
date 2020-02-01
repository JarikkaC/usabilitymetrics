<template>

<v-card width="250" >
<v-navigation-drawer floating permanent>
<v-list class="mt-3" dense>
   
   <v-list-title>
     <v-btn class="m-5" color="#E1DCD6"> Create Project</v-btn>
   </v-list-title>

   <v-divider></v-divider>
   

  <v-list-item 
    v-for="item in items"
    :key="item.title"
    link
    >

  <v-list-item-content>
    <v-list-item-title style="font-size: 15px"> {{ item.title }}</v-list-item-title>
  </v-list-item-content>

  </v-list-item>
</v-list>
</v-navigation-drawer>
</v-card>


</template>

<script>
export default {
  data () {
    return {
      items: [
        {title: 'Home'},
        {title: 'Your Project'},
        {title: 'Evaluation Form'},
        {title: 'Report'}
      ]
    }
  }
}
</script>