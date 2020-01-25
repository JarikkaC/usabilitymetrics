<template>
  <div>
    <v-app-bar :clipped-left="$vuetify.breakpoint.lgAndUp" height="70" app class="shadow-header">
      <v-toolbar-title class="ml-0 pl-4">
        <span class="hidden-sm-and-down d-flex align-center">
          <v-img src="/logo.png" max-width="189" max-height="77" />
          <!-- <h3 class="text-primary pl-3 text-brand">ssc-guard</h3> -->
        </span>
      </v-toolbar-title>
      <v-spacer />
      <v-menu offset-y>
        <template v-slot:activator="{ on }">
          <v-btn
            v-on="on"
            icon
          >
            <v-icon class="text-primary">
              mdi-account
            </v-icon>
          </v-btn>
        </template>

        <v-list>
          <v-list-item
          >
            <v-list-item-title>ออกจากระบบ</v-list-item-title>
          </v-list-item>
        </v-list>
      </v-menu>
    </v-app-bar>

    <v-navigation-drawer v-model="drawer" :clipped="$vuetify.breakpoint.lgAndUp" class="background-gradient" dark app>
      <v-list
        nav
        dense
      >
        <template v-for="item in menu">
          <v-row v-if="item.heading" :key="item.heading" align="center">
            <v-col cols="6">
              <v-subheader v-if="item.heading" class="text-menu">
                {{ item.heading }}
              </v-subheader>
            </v-col>
          </v-row>

          <v-list-group
            v-else-if="item.children"
            :key="item.text"
            v-model="item.model"
            :prepend-icon="item.model ? item.icon : item['icon-alt']"
            class="my-3 text-menu"
          >
            <template v-slot:activator>
              <v-list-item-title class="text-menu">
                {{ item.text }}
              </v-list-item-title>
            </template>
            <v-list-item v-for="child in item.children" :key="child.text" :to="child.route" nuxt>
              <v-list-item-action>
                <v-icon class="mr-0">
                  {{ child.icon }}
                </v-icon>
              </v-list-item-action>
              <v-list-item-content>
                <v-list-item-title class="text-sub-menu">
                  {{ child.text }}
                </v-list-item-title>
              </v-list-item-content>
            </v-list-item>
          </v-list-group>

          <v-list-item v-else :key="item.text" :to="item.route" nuxt>
            <v-list-item-action>
              <v-icon>{{ item.icon }}</v-icon>
            </v-list-item-action>
            <v-list-item-content>
              <v-list-item-title class="text-menu">
                {{ item.text }}
              </v-list-item-title>
            </v-list-item-content>
          </v-list-item>
        </template>
      </v-list>
    </v-navigation-drawer>
  </div>
</template>

<script>
export default {
  name: 'Header',
  components: {},
  props: {
    menu: {
      type: Array,
      default: null
    }
  },
  data: () => ({
    appName: process.env.APP_NAME,
    fixed: false,
    dialog: false,
    drawer: true
  }),
  computed: {

  },
  watch: {
    // userData: {
    //   handler (val) {
    //     // if (val.status) {
    //     //   await this.fetchCertificates()
    //     // }
    //   },
    //   deep: true
    // }
  },
  methods: {

  }
}
</script>
