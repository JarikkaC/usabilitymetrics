<template>
    <v-app>
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
                <v-btn
                    class="mr-5"
                    width="350"
                    :href="/selectmetric/ + this.id"
                    >Back</v-btn
                >
                <v-btn class="ml-5" width="350"
                    >Create metric model</v-btn
                >
            </div>
        </div>
    </v-app>
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
                // console.log('res',res);
                this.metricmodels = this.tranFormData(res);
                // console.log(this.metricmodels);
            });
        },
        tranFormData(data) {
            const result = data.map(element => ({
                submetric_name: element.submetric.submetric_name,
                purpose: element.submetric.purpose,
                method: element.submetric.method,
                measurement: element.submetric.measurement,
                scale: element.submetric.scale,
                type: element.submetric.type,
                input: element.submetric.input,
                iso: element.submetric.iso,
                target: element.submetric.target
            }));
            return result;

        }
    }
};
</script>
