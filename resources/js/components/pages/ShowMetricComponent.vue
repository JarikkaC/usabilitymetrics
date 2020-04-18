<template>
    <v-app>
        <v-card class="m-3">
            <v-card-title>
                <h3 class="mt-3 ml-5">
                    Metric Name: {{ this.metrics.metric_name }}
                </h3>

                <v-spacer></v-spacer>
                <v-btn color="grey" outlined href="/metric">
                    <v-icon class="mr-2"> mdi-arrow-left </v-icon>
                    Back
                </v-btn>
            </v-card-title>

            <!-- <v-data-table
                :headers="headers"
                :items="submetricFil"
                multi-sort
                class="elevation-1"
            ></v-data-table> -->

            <div>
                <v-row justify="space-between" class="m-3">
                    <v-card
                        class="d-inline-block m-3"
                        v-for="submetric in submetricFil"
                        :key="submetric"
                        width="570px"
                    >
                        <v-toolbar color="teal" dark flat>
                            <v-toolbar-title
                                class="subheading font-weight-bold"
                            >
                                {{ submetric.submetric_name }} 
                            </v-toolbar-title>

                            <v-spacer></v-spacer>
                                <v-btn
                                    small
                                    fab
                                    dark
                                    color="indigo"
                                    @click="editItem(item)"
                                >
                                    <v-icon> mdi-pencil</v-icon>
                                </v-btn>
                        </v-toolbar>
                        <v-card-text>
                            <div
                                v-for="question in questionFil(submetric.id)"
                                :key="question.id"
                            >
                                <v-row>
                                    <v-col cols="3">
                                        <h5 style="font-size: 16px;">
                                            Question:
                                        </h5>
                                    </v-col>
                                    <v-col cols="9">
                                        {{ question.question }}
                                    </v-col>
                                </v-row>
                            </div>

                            <v-divider></v-divider>

                            <v-row>
                                <v-col cols="3">
                                    <h5 style="font-size: 16px;">
                                        Purpose of the metrics:
                                    </h5>
                                </v-col>
                                <v-col cols="9">
                                    {{ submetric.purpose }}
                                </v-col>
                            </v-row>
                            <v-divider></v-divider>

                            <v-row>
                                <v-col cols="3">
                                    <h5 style="font-size: 16px;">
                                        Method of application:
                                    </h5>
                                </v-col>
                                <v-col cols="9">
                                    {{ submetric.method }}
                                </v-col>
                            </v-row>
                            <v-divider></v-divider>

                            <v-row>
                                <v-col cols="3">
                                    <h5 style="font-size: 15px;">
                                        Measurement, formula and data element
                                        computations:
                                    </h5>
                                </v-col>
                                <v-col cols="9">
                                    {{ submetric.measurement }}
                                </v-col>
                            </v-row>
                            <v-divider></v-divider>

                            <v-row>
                                <v-col cols="3">
                                    <h5 style="font-size: 16px;">
                                        Metric scale type
                                    </h5>
                                </v-col>
                                <v-col cols="9">
                                    {{ submetric.type }}
                                </v-col>
                            </v-row>
                            <v-divider></v-divider>

                            <v-row>
                                <v-col cols="3">
                                    <h5 style="font-size: 16px;">
                                        Input to measurement
                                    </h5>
                                </v-col>
                                <v-col cols="9">
                                    {{ submetric.input }}
                                </v-col>
                            </v-row>
                            <v-divider></v-divider>

                            <v-row>
                                <v-col cols="3">
                                    <h5 style="font-size: 16px;">
                                        ISO/IEC 12207 SLCP Reference
                                    </h5>
                                </v-col>
                                <v-col cols="9">
                                    {{ submetric.iso }}
                                </v-col>
                            </v-row>
                            <v-divider></v-divider>

                            <v-row>
                                <v-col cols="3">
                                    <h5 style="font-size: 16px;">
                                        Target audience
                                    </h5>
                                </v-col>
                                <v-col cols="9">
                                    {{ submetric.target }}
                                </v-col>
                            </v-row>
                        </v-card-text>
                    </v-card>
                </v-row>
            </div>
        </v-card>
    </v-app>
</template>

<script>
export default {
    props: ["usernow", "id"],
    mounted() {
        this.getMetric();
        this.getSubmetric();
        this.getQuestion();
    },
    data() {
        return {
            itemsPerPage: 2,
            submetrics: [],
            metrics: [],
            question: [],
            headers: [
                {
                    text: "Metric name",
                    align: "left",
                    sortable: false,
                    value: "submetric_name"
                },
                {
                    text: "Purpose of the metrics",
                    align: "left",
                    sortable: false,
                    value: "purpose"
                },
                {
                    text: "Method of application",
                    align: "left",
                    sortable: false,
                    value: "method"
                },
                {
                    text: "Measurement, formula and data element computations",
                    align: "left",
                    sortable: false,
                    value: "measurement"
                },
                {
                    text: "Metric scale type",
                    align: "left",
                    sortable: false,
                    value: "scale"
                },
                {
                    text: "Measure type",
                    align: "left",
                    sortable: false,
                    value: "type"
                },
                {
                    text: "Input to measurement",
                    align: "left",
                    sortable: false,
                    value: "input"
                },
                {
                    text: "ISO/IEC 12207 SLCP Reference",
                    align: "left",
                    sortable: false,
                    value: "iso"
                },
                {
                    text: "Target audience",
                    align: "left",
                    sortable: false,
                    value: "target"
                }
            ]
        };
    },

    methods: {
        getMetric() {
            axios.get("/api/metrics/" + this.id).then(response => {
                this.metrics = response.data;
                console.log(this.metrics);
            });
        },

        getSubmetric() {
            axios.get("/api/submetrics/").then(response => {
                this.submetrics = response.data;
                console.log("submetric", this.submetricFil);
            });
        },

        getQuestion() {
            axios.get("/api/questions/").then(response => {
                this.question = response.data;
                console.log("question", this.question);
            });
        },

        questionFil(id) {
            return this.question.filter(question => {
                return question.submetric_id == id;
            });
        }
    },

    computed: {
        submetricFil: function() {
            return this.submetrics.filter(submetrics => {
                return submetrics.metric_id == this.id;
            });
        }
    }
};
</script>
