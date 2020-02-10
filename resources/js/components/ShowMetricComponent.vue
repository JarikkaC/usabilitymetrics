<template>
    <div>
        <v-card class="m-3 d-flex justify-center">
            <v-data-table
                :headers="headers"
                :items="metricmodels"
                multi-sort
                class="elevation-1"
            ></v-data-table>
        </v-card>
        <div class="text-center pt-2">
            <v-btn color="black" class="mr-5" width="350" :href="/selectmetric/ + this.id">Back</v-btn>
            <v-btn color="black" class="ml-5" width="350"
                >Create metric model</v-btn
            >
        </div>
    </div>
</template>

<script>
export default {
    props: ["id"],
    mounted() {
        this.getModel();
    },
    data() {
        return {
            metricmodels: [],
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
        getModel() {
            axios.get("/api/metricmodel").then(response => {
                let res = response.data;
                console.log(res)
                this.metricmodels = this.tranFormData(res);
            });
        },
        tranFormData(data) {
            const result = data.map(element => ({
                submetric_name: element.metric[0].metric_name,
                purpose: element.submetric[0].purpose,
                method: element.submetric[0].method,
                measurement: element.submetric[0].measurement,
                scale: element.submetric[0].scale,
                type: element.submetric[0].type,
                input: element.submetric[0].input,
                iso: element.submetric[0].iso,
                target: element.submetric[0].target
            }));
            return result;
        }
    }
};
</script>
