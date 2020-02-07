<template>
    <v-app>
        <v-container class="mt-2 mx-2">
            <v-card>
                <br />
                <v-container class="m-4">
                    <v-row>
                        <h3>
                            Select Metrics
                        </h3>
                    </v-row>
                    <v-row>
                        <v-card
                            class="ml-3"
                            width="1000px"
                            max-height="300px"
                            outlined
                        >
                            <h6 class="m-3">{{ selected }}</h6>
                        </v-card>
                    </v-row>
                    <v-row>
                        <v-col>
                            <v-btn color="#64AC8F"> Save </v-btn>
                        </v-col>
                    </v-row>
                    <v-row>
                        <v-data-table
                            :headers="headers" 
                            :items="metrics"
                            sort-by="time"
                            class="elevation-1"
                        >
                            <template v-slot:top>
                                <v-toolbar flat color="white">
                                    <v-toolbar-title>Metrics</v-toolbar-title>
                                </v-toolbar>
                            </template>
                        </v-data-table>
                    </v-row>
                </v-container>

                <!-- 
                <v-checkbox
                    class="ml-5"
                    v-model="selected"
                    label="John"
                    value="John"
                ></v-checkbox>
                <v-checkbox
                    class="ml-5"
                    v-model="selected"
                    label="Jacob"
                    value="Jacob"
                ></v-checkbox> -->
            </v-card>
        </v-container>
    </v-app>
</template>

<script>
export default {
    // props: ["usernow", "id"],
    mounted() {
        this.getMetric();
        console.log("000", this.id);
    },
    data: () => ({
        metrics: [],
        selected: [],
        headers: [
            {
                text: "Metric Name",
                align: "left",
                sortable: false,
                value: "metric_name"
            }
        ],
        
    }),

    methods: {
        getMetric() {
            axios.get("api/metrics").then(response => {
                this.metrics= response.data;
            });
        }
    }
};
</script>
