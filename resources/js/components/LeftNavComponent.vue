<template>
    <v-card width="250">
        <v-navigation-drawer permanent>
            <v-list class="mt-3" dense>
                <v-list-item>
                    <v-list-item-avatar class="ml-2">
                        <v-img
                            src="https://randomuser.me/api/portraits/men/78.jpg"
                        ></v-img>
                    </v-list-item-avatar>

                    <v-list-item-content>
                        <v-list-item-title class="m-3"
                            >You logged in as:
                            <h2>
                                {{ username }}
                            </h2>
                        </v-list-item-title>
                    </v-list-item-content>
                </v-list-item>

                <v-divider></v-divider>
                <v-list-item v-for="item in items" :key="item.title" link>
                    <v-list-item-content>
                        <a class="ml-3" :href="item.href">
                            <v-list-item-title style="font-size: 15px">
                                {{ item.title }}
                            </v-list-item-title>
                        </a>
                    </v-list-item-content>
                </v-list-item>

                <v-divider></v-divider>

                <v-list-item>
                    <v-list-item-content>
                        <v-list-item-title style="font-size: 15px">
                            <a class="ml-3" href="/logout"> Logout </a>
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
                { title: "Measurement Model", href: "/model" },
                { title: "Evaluation Form", href: "/evaluation" },
                { title: "Report", href: "/report" }
            ]
        };
    }
};
</script>

<style scope>
a:hover {
    text-decoration: none;
    color: #fed136;
}

</style>
