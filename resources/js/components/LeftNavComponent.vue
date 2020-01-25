<template>
  
    <v-navigation-drawer
      absolute
      permanent
      left
    >
      <template v-slot:prepend>

          <v-list-item-content>
               <v-btn large color="#E1DCD6">Import</v-btn>
          </v-list-item-content>
        
      </template>

      <v-divider></v-divider>

      <v-list dense>
        <v-list-item
          v-for="item in items"
          :key="item.title"
          @click=""
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

</template>


<script>
  export default {
    data () {
      return {
        items: [
          { title: 'Home', icon: 'mdi-home-city' },
          { title: 'Import Graphic Media', icon: 'mdi-account' },
          { title: 'Evaluation Form', icon: 'mdi-account-group-outline' },
          {title: 'Report', icon: ''},
          {title: 'Trash', icon: ''}
        ],
      }
    },
  }




</script>