<template>
<div>
  <v-card  class="m-3 d-flex justify-center">
    <v-data-table
      :headers="headers"
      :items="desserts"
      multi-sort
      class="elevation-1"
    ></v-data-table>
  </v-card>
  <div class="text-center pt-2">
      <v-btn color="black" class="mr-5" width="350" >Black</v-btn>
      <v-btn color="black" class="ml-5" width="350" >Creat metric model</v-btn>
  </div>
</div>
</template>


<script>
  export default {
    data () {
      return {
        headers: [
          {
            text: 'Metric name',
            align: 'left',
            sortable: false,
            value: 'name',
          },
          { 
            text: 'Purpose of the metrics', 
            align: 'left',
            sortable: false,
            value: 'name',
          },
          { 
            text: 'Method of application',
            align: 'left',
            sortable: false,
            value: 'fat' 
          },
          { 
            text: 'Measurement, formula and data element computations', 
            align: 'left',
            sortable: false,
            value: 'carbs' 
          },
          { 
            text: 'Metric scale type',
            align: 'left',
            sortable: false,
            value: 'protein'
          },
          { 
            text: 'Measure type',
            align: 'left',
            sortable: false,
            value: 'iron' 
          },
          { 
            text: 'Input to measurement', 
            align: 'left',
            sortable: false,
            value: 'iron' 
          },
          {
            text: 'ISO/IEC 12207 SLCP Reference', 
            align: 'left',
            sortable: false,
            value: 'iron' 
          },
          { 
            text: 'Target audience', 
            align: 'left',
            sortable: false,
            value: 'iron' 
          },
        ],
        desserts: [
          {
            name: 'Frozen Yogurt',
            calories: 200,
            fat: 6.0,
            carbs: 24,
            protein: 4.0,
            iron: '1%',
          },
        ],
      }
    },
  }
</script>