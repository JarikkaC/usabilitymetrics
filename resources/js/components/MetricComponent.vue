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
                        <v-toolbar-title>Metrics</v-toolbar-title>
                        <v-divider class="mx-4" inset vertical></v-divider>
                        <v-spacer></v-spacer>
                        <v-btn
                            color="#F4D03F"
                            dark
                            class="mb-2"
                            href="/metric/addmetric/"
                        >
                            Add Metrics
                        </v-btn>
                    </v-toolbar>
                </template>
                <template v-slot:item.actions="{ item }">
                    <v-btn
                        class="m-2"
                        outlined
                        color="teal"
                        :href="/metric/ + item.id"
                    >
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
                        @click="dialog=!dialog,editItem(item)"
                       
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

            <!-- ---------------------------------------------- -->

            <v-dialog v-model="dialog" max-width="500px">
                <v-card>
                    <v-card-title>
                        <span class="headline">Edit Metric Name</span>
                    </v-card-title>

                    <v-card-text>
                        <v-container>
                            <v-row>
                                <v-col>
                                    <v-text-field
                                        v-model="editedItem.metric_name"
                                        label="Metric Name"
                                    ></v-text-field>
                                </v-col>
                            </v-row>
                        </v-container>
                    </v-card-text>

                    <v-card-actions>
                        <v-spacer></v-spacer>

                        <v-btn color="blue darken-1" text @click="save"
                            >Save</v-btn
                        >

                        <v-btn color="#CD4D4D" text @click="close"
                            >Cancel</v-btn
                        >
                    </v-card-actions>
                </v-card>
            </v-dialog>

            <!-- ------------------------------------------------ -->
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
            { text: "Date/Time", value: "create_at", align: "center" },
            {
                text: "Actions",
                value: "actions",
                sortable: false,
                align: "center"
            }
        ],
        metrics: [],
        editedID: null,
        editedIndex: -1,
        editedItem: {
            metric_name: "",
        },
        defaultItem: {
            metric_name: "",
        }
    }),

    watch: {
        dialog(val) {
            val || this.close();
        }
    },

    methods: {
        getMetric() {
            axios.get("/api/metrics").then(response => {
                // let res = response.data;
                this.metrics = response.data;
                // this.metrics = this.tranFormData(res);
                // console.log(this.metrics);
            });
        },

        // tranFormData(data) {
        //     const result = data.map(element => ({
        //         id: element.id,
        //         metric_name: element.metric_name,
        //         submetric: element.submetric
        //     }));
        //     return result;
        // },

         save() {
            if (this.editedIndex > -1) {
                Object.assign(
                    this.metrics[this.editedIndex],
                    this.editedItem
                ) &&
                    axios.put("/api/metrics/" + this.editedID, {
                        metric_name: this.editedItem.metric_name,
                    });
            } else {
                this.metrics.push({
                    user_id: this.usernow.user_id,
                    metric_name: this.editedItem.metric_name,
                }) &&
                    axios.post("api/metrics", {
                        user_id: this.usernow.user_id,
                        metric_name: this.editedItem.metric_name,
                    });
            }
            this.close();
        },

        editItem(item) {
            this.editedIndex = this.metrics.indexOf(item);
            this.editedItem = Object.assign({}, item);
            this.dialog = true;
            this.editedID = item.id;
        },

        deleteItem(item) {
            const index = this.metrics.indexOf(item);
            confirm("Are you sure you want to delete this Model?") &&
                axios.delete("api/metrics/" + item.id).then(response => {
                    this.metrics.splice(index, 1);
                });
        },

        close() {
            this.dialog = false;
            setTimeout(() => {
                this.editedItem = Object.assign({}, this.defaultItem);
                this.editedIndex = -1;
            }, 300);
        },
    }
};
</script>
