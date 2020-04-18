<template>
    <v-app>
        <v-card class="m-3">
            <v-card-title>
                <h3 class="mt-3 ml-5">
                    Metric Name: {{ this.metrics.metric_name }}
                </h3>

                <v-spacer></v-spacer>
                <v-btn color="#F4D03F" outlined href="/metric">
                    <v-icon class="mr-2"> mdi-arrow-left </v-icon>
                    Back
                </v-btn>
            </v-card-title>

            <v-data-table
                :headers="headers"
                :items="submetricFil"
                multi-sort
                class="elevation-1"
            ></v-data-table>

            <div v-for="submetric in submetricFil" :key="submetric">
               

                <div
                    v-for="question in questionFil(submetric.id)"
                    :key="question.id"
                >
                    <h5>Question: {{ question.question }}</h5>
                </div>
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
