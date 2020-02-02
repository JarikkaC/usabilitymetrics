<template>
    <v-card width="250">
        <v-navigation-drawer floating permanent>
            <v-list class="mt-3" dense>
                <v-btn class="m-5" color="#E1DCD6"> Create Project</v-btn>

                <v-divider></v-divider>

                <v-list-item v-for="item in items" :key="item.title" link>
                    <v-list-item-content>
                        <v-list-item-title style="font-size: 15px">
                            <a :href="item.href">
                                {{ item.title }}
                            </a>
                        </v-list-item-title>
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
        {title: 'Home', href: '/home'},
        {title: 'Your Project', href: '/project'},
        {title: 'Evaluation Form', href: ''},
        {title: 'Report', href: ''}
      ]
    }
  }
}
</script>
