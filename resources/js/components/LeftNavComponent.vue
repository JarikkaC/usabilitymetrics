<template>
  <v-card
    class="fill-height"
    max-width="250px"
    height="720"
    tile
  >
    <v-list disabled>
      <v-btn class="m-5" color="#E1DCD6">Create Project</v-btn>
      <v-list-item-group v-model="item" color="primary">
        <v-list-item
          v-for="(item, i) in items"
          :key="i"
        >
          <v-list-item-icon>
            <v-icon class="mr-2" v-text="item.icon"></v-icon>
          </v-list-item-icon>
          <v-list-item-content>
            <v-list-item-title v-text="item.text"></v-list-item-title>
          </v-list-item-content>
        </v-list-item>
      </v-list-item-group>
    </v-list>
  </v-card>
</template>


<script>
  export default {
    data: () => ({
      item: 1,
      items: [
        { text: 'All Your Project', icon: '#' },
        { text: 'Evaluation Form', icon: '#' },
        { text: 'Report', icon: '#' },
      ],
    }),
  }
</script>