<template>
    <v-app>
        <v-card class="m-4">
            <div>
                <v-toolbar-title class="m-4">Evaluation</v-toolbar-title>
                <div class="text-center d-flex pb-4 m-4">
                    <v-spacer></v-spacer>
                    <v-btn @click="all">all</v-btn>
                    <!-- <div>{{ panel }}</div> -->
                    <v-btn class="ml-4" @click="none">none</v-btn>
                </div>

                <v-expansion-panels v-model="panel" multiple>
                    <v-expansion-panel v-for="(item, i) in items" :key="i">
                        <v-expansion-panel-header
                            >Project {{ item }}</v-expansion-panel-header
                        >
                        <v-expansion-panel-content>
                            <v-img
                                src="https://cdn.pixabay.com/photo/2020/03/08/11/21/british-4912211_1280.jpg"
                                max-width="300px"
                            ></v-img>

                            <div class="m-3">
                                <v-btn>Evaluation</v-btn>
                                <v-btn>See Report</v-btn>
                            </div>
                        </v-expansion-panel-content>
                    </v-expansion-panel>
                </v-expansion-panels>
            </div>
        </v-card>
    </v-app>
</template>

<script>
export default {
    data() {
        return {
            panel: [],
            items: 5
        };
    },
    methods: {
        // Create an array the length of our items
        // with all values as true
        all() {
            this.panel = [...Array(this.items).keys()].map((k, i) => i);
        },
        // Reset the panel
        none() {
            this.panel = [];
        }
    }
};
</script>
