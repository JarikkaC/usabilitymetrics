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

                    <!-- <v-row>
                        <v-data-table
                            :headers="headers"
                            :items="submetrics"
                            sort-by="time"
                            class="elevation-1"
                        >
                            <template v-slot:top>
                                <v-toolbar flat color="white">
                                    <v-toolbar-title>Metrics</v-toolbar-title>
                                </v-toolbar>
                            </template>
                        </v-data-table>
                    </v-row> -->

                    <template v-for="metric in metrics">
                        <v-checkbox
                            :key="metric.metric_name"
                            class="ml-5"
                            :label="metric.metric_name"
                            :value="metric.metric_name"
                        >
                        </v-checkbox>
                        <template v-if="metric.submetric" v-for="item in metric.submetric">
                            <v-checkbox
                                v-if="item.submetric_name"
                                :key="item.submetric_name"
                                class="ml-10"
                                :label="item.submetric_name"
                                :value="item.submetric_name"
                            >
                            </v-checkbox>
                        </template>
                    </template>
                </v-container>
            </v-card>
        </v-container>
    </v-app>
</template>

<script>
export default {
    // props: ["usernow", "id"],
    mounted() {
        this.getMetric();
        this.getSubmetric();
    },
    data: () => ({
        metrics: [],
        submetrics: [],
        selected: []

        // headers: [
        //     {
        //         text: "Metric Name",
        //         align: "left",
        //         sortable: false,
        //         value: "submetric_name"
        //     }
        // ]
    }),

    methods: {
        getMetric() {
            axios.get("api/metrics").then(response => {
                this.metrics = response.data;
                console.log(this.metrics);
            });
        },

        getSubmetric() {
            axios.get("api/submetrics").then(response => {
                this.submetrics = response.data;
            });
        }
    }
};
</script>
