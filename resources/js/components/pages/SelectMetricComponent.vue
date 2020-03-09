<template>
    <v-app>
        <v-container class="mt-2 mx-2">
            <v-card>
                <v-row>
                    <h3 class="mt-10 ml-10">
                        <b>Select Metrics</b>
                    </h3>
                </v-row>
                <v-row>
                    <p class="text-thai ml-10">
                        เลือก Metric ที่ต้องการเพื่อสร้าง Measurement Model
                    </p>
                </v-row>

                <v-divider></v-divider>
                <v-row>
                    <v-col>
                        <v-card class="mx-auto" width="500px" outlined>
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
                                        return-object
                                        v-model="selected"
                                        v-if="item.submetric_name"
                                        :key="item.submetric_name"
                                        class="ml-10"
                                        :label="item.submetric_name"
                                        :value="item"
                                    >
                                    </v-checkbox>
                                </template>
                            </template>
                        </v-card>

                        <div class="text-center">
                            <v-btn
                                class="mt-5"
                                color="#64AC8F"
                                width="150px"
                                @click="postMetric"
                                :href="/showmetric/ + this.id"
                            >
                                Save
                            </v-btn>

                            <v-btn
                                class="mt-5 ml-5"
                                width="150px"
                                :href="/project/ + this.id"
                            >
                                Back
                            </v-btn>
                        </div>
                    </v-col>
                    <!-- <v-col>
                        <v-card width="500px" outlined>
                            <h6 class="m-3">{{ selected }}</h6>
                        </v-card>
                        <v-btn
                            class="mt-5"
                            color="#64AC8F"
                            @click="postMetric"
                            :href="/showmetric/ + this.id"
                        >
                            Save
                        </v-btn>

                        <v-btn class="mt-5 ml-5" :href="/project/ + this.id">
                            Back
                        </v-btn>
                    </v-col> -->
                </v-row>
            </v-card>
        </v-container>
    </v-app>
</template>

<script>
export default {
    props: ["id"],
    mounted() {
        this.getMetric();
        this.postMetric();
    },
    data: () => ({
        metrics: [],
        selected: []
    }),

    methods: {
        getMetric() {
            axios.get("/api/metrics").then(response => {
                let res = response.data;
                // this.metrics = response.data;
                this.metrics = this.tranFormData(res);
                console.log(this.metrics);
            });
        },
        postMetric() {
            for (let index = 0; index < this.selected.length; index++) {
                const element = this.selected[index];
                axios.post("/api/metricmodel", {
                    project_id: this.id,
                    submetric_id: element.id,
                    metric_id: element.metric_id
                });
            }
        },
        tranFormData(data) {
            const result = data.map(element => ({
                id: element.id,
                metric_name: element.metric_name,
                submetric: element.submetric
            }));
            return result;
        }
    }
};
</script>
