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

                    <template v-for="metric in metrics">
                        <v-checkbox
                            :key="metric.metric_name"
                            class="ml-5"
                            :label="metric.metric_name"
                            :value="metric.metric_name"
                        >
                        </v-checkbox>
                        <template
                            v-if="metric.submetric"
                            v-for="item in metric.submetric"
                        >
                            <v-checkbox
                                v-model="selected"
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
    mounted() {
        this.getMetric();
    },
    data: () => ({
        metrics: [],
        submetrics: [],
        selected: []
    }),

    methods: {
        getMetric() {
            axios.get("api/metrics").then(response => {
                this.metrics = response.data;
                this.submetrics = response.data;
              
            });
        }
    }
};
</script>
