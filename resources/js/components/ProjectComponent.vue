<template>
  <div class="ma-6 pa-5">
    <v-container class="grey lighten-5">
      <v-row no-gutters>
      <v-col md="6" offset-md="1">

        <h1 class="headline">Project Name: </h1>
       <v-text-field :rules="rules"></v-text-field>
     
        <v-card outlined tile width="150px" height="150px" >
           <v-col cols="mx-auto">
          <v-img
            height="100"
            width="100"
            src="/images/element/add.png"
          ></v-img>
        </v-col>
        
        </v-card>
        
      </v-col>
    </v-row>



     
    </v-container>
  </div>

</template>  





<script>
  export default {
    data () {
      return {
        dialog: false,
        items: [
          { icon: 'folder', iconClass: 'grey lighten-1 white--text', title: 'Photos', subtitle: 'Jan 9, 2014' },
          { icon: 'folder', iconClass: 'grey lighten-1 white--text', title: 'Recipes', subtitle: 'Jan 17, 2014' },
          { icon: 'folder', iconClass: 'grey lighten-1 white--text', title: 'Work', subtitle: 'Jan 28, 2014' },
        ],
        items2: [
          { icon: 'assignment', iconClass: 'blue white--text', title: 'Vacation itinerary', subtitle: 'Jan 20, 2014' },
          { icon: 'call_to_action', iconClass: 'amber white--text', title: 'Kitchen remodel', subtitle: 'Jan 10, 2014' },
        ],
      }
    },
  }
</script>