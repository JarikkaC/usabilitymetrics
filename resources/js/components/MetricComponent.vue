<template>
    <v-app>
        <v-card class="m-4">
            <v-card-title><h2>Metrics</h2></v-card-title>
            <v-data-table
                :headers="headers"
                :items="metrics"
                sort-by="metric_name"
                class="elevation-1"
            >
                <template v-slot:top>
                    <v-toolbar flat color="white">
                        <v-toolbar-title>Default Metrics</v-toolbar-title>
                        <v-divider class="mx-4" inset vertical></v-divider>
                        <v-spacer></v-spacer>
                        <v-btn
                            color="#F4D03F"
                            dark
                            class="mb-2"
                            href="/addmodel/"
                        >
                            Add Metrics
                        </v-btn>
                    </v-toolbar>
                </template>
                <template v-slot:item.actions="{ item }">
                    <v-btn class="m-2" outlined color="teal">
                        <v-icon small class="mr-2">
                            mdi-view-grid-outline
                        </v-icon>
                        view
                    </v-btn>

                    <v-btn
                        class="m-2"
                        small
                        outlined
                        fab
                        color="indigo"
                        @click="editItem(item)"
                    >
                        <v-icon> mdi-pencil</v-icon>
                    </v-btn>

                    <v-btn
                        class="m-2"
                        small
                        outlined
                        fab
                        color="red"
                        @click="deleteItem(item)"
                    >
                        <v-icon> mdi-delete </v-icon>
                    </v-btn>
                </template>
                
            </v-data-table>
        </v-card>
    </v-app>
</template>

<script>
export default {
    mounted() {
        this.getMetric();
      
    },
    data: () => ({
        dialog: false,
        headers: [
            {
                text: "Metric Name",
                align: "center",
                sortable: false,
                value: "metric_name"
            },
            // { text: "Model Name", value: "project_name", align: "center" },
            { text: "Date/Time", value: "create_at", align: "center" },
            {
                text: "Actions",
                value: "actions",
                sortable: false,
                align: "center"
            }
        ],
        metrics: [],
        submetrics: [],
        editedIndex: -1,
        editedItem: {
            id: "",
            metric_name: 0,
            create_at: 0
        },
        defaultItem: {
            id: "",
            metric_name: 0,
            create_at: 0
        }
    }),

    computed: {
        formTitle() {
            return this.editedIndex === -1 ? "New Item" : "Edit Item";
        }
    },

    watch: {
        dialog(val) {
            val || this.close();
        }
    },

    methods: {

        getMetric() {
            axios.get("/api/metrics").then(response => {
                let res = response.data;
                // this.metrics = response.data;
                this.metrics = this.tranFormData(res);
                console.log(this.metrics);
            });
        },

        tranFormData(data) {
            const result = data.map(element => ({
                id: element.id,
                metric_name: element.metric_name,
                submetric: element.submetric
            }));
            return result;
        },

        editItem(item) {
            this.editedIndex = this.metrics.indexOf(item);
            this.editedItem = Object.assign({}, item);
            this.dialog = true;
        },

        deleteItem(item) {
            const index = this.metrics.indexOf(item);
            confirm("Are you sure you want to delete this Model?") &&
                this.models.splice(index, 1);
        },

        close() {
            this.dialog = false;
            setTimeout(() => {
                this.editedItem = Object.assign({}, this.defaultItem);
                this.editedIndex = -1;
            }, 300);
        },

        save() {
            if (this.editedIndex > -1) {
                Object.assign(this.metrics[this.editedIndex], this.editedItem);
            } else {
                this.metrics.push(this.editedItem);
            }
            this.close();
        }
    }
};
</script>
