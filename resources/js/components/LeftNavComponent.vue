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
                            <v-list-item-title class="mb-2" style="font-size: 16px">
                                <v-icon class="mr-2">{{ item.icon }}</v-icon>
                                {{ item.title }}
                            </v-list-item-title>
                        </a>
                    </v-list-item-content>
                </v-list-item>

                <v-divider></v-divider>

                <v-list-item>
                    <v-list-item-content>
                        <a class="ml-3" href="/logout">
                            <v-list-item-title style="font-size: 15px">
                                <v-icon>mdi-logout</v-icon>
                                Logout
                            </v-list-item-title></a
                        >
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
                { title: "Home", icon: "mdi-home", href: "/home" },
                {
                    title: "Your Project",
                    icon: "mdi-archive-outline",
                    href: "/project"
                },
                { title: "Metrics", icon: "mdi-check", href: "/metric" },
                { title: "Evaluation", icon: "mdi-draw", href: "/evaluation" },
                {
                    title: "Report",
                    icon: "mdi-google-analytics",
                    href: "/report"
                }
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
