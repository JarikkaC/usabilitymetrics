<template>
    <v-card width="250">
        <v-navigation-drawer floating permanent>
            <v-list class="mt-3" dense>
                <span class="text-center">
                  <p> You loged in as:  </p>
                    <h2>
                        {{ username }}
                    </h2>
                </span>

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
    props: ["username"],
    data() {
        return {
            items: [
                { title: "Home", href: "/home" },
                { title: "Your Project", href: "/project" },
                { title: "Evaluation Form", href: "" },
                { title: "Report", href: "" }
            ]
        };
    }
};
</script>
