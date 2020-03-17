<template>
    <v-app>
        <v-card class="m-4">
            <v-card-title>
                Create Your Model
            </v-card-title>
            <v-divider></v-divider>
            <v-card-text>
                <v-container>
                    <v-row class="text-center">
                        <v-col>
                            <v-text-field
                                v-model="editedItem.submetric_name"
                                label="Metric Name"
                                persistent-hint
                                outlined
                            >
                            </v-text-field>
                        </v-col>
                    </v-row>

                    <div>
                        <v-card>
                            <v-card-title class="ml-3"
                                >เพิ่มรายละเอียดของ Sub-metric</v-card-title
                            >
                            <v-row class="text-center ml-5 mr-5 mt-3">
                                <v-col>
                                    <v-text-field
                                        v-model="editedItem.submetric_name"
                                        label="Sub-Metric Name"
                                        persistent-hint
                                        outlined
                                    ></v-text-field>
                                </v-col>
                            </v-row>
                            <v-row class="text-center ml-5 mr-5">
                                <v-col>
                                    <v-text-field
                                        v-model="editedItem.submetric_name"
                                        label="Purpose of the metrics"
                                        persistent-hint
                                        outlined
                                    ></v-text-field>
                                </v-col>
                                <v-col>
                                    <v-text-field
                                        v-model="editedItem.submetric_name"
                                        label="Method of application"
                                        persistent-hint
                                        outlined
                                    ></v-text-field>
                                </v-col>
                            </v-row>
                            <v-row class="text-center ml-5 mr-5 mt-3">
                                <v-col>
                                    <v-text-field
                                        v-model="editedItem.submetric_name"
                                        label="Measurement, formula and data element computation"
                                        persistent-hint
                                        outlined
                                    ></v-text-field>
                                </v-col>
                                <v-col>
                                    <v-text-field
                                        v-model="editedItem.submetric_name"
                                        label="Metric scale type"
                                        persistent-hint
                                        outlined
                                    ></v-text-field>
                                </v-col>
                            </v-row>
                            <v-row class="text-center ml-5 mr-5 mt-3">
                                <v-col>
                                    <v-text-field
                                        v-model="editedItem.submetric_name"
                                        label="Measure type"
                                        persistent-hint
                                        outlined
                                    ></v-text-field>
                                </v-col>
                                <v-col>
                                    <v-text-field
                                        v-model="editedItem.submetric_name"
                                        label="Input to measurement"
                                        persistent-hint
                                        outlined
                                    ></v-text-field>
                                </v-col>
                            </v-row>
                            <v-row class="text-center ml-5 mr-5 mt-3">
                                <v-col>
                                    <v-text-field
                                        v-model="editedItem.submetric_name"
                                        label="ISO/IEC 12207 SLCP Reference"
                                        persistent-hint
                                        outlined
                                    ></v-text-field>
                                </v-col>
                                <v-col>
                                    <v-text-field
                                        v-model="editedItem.submetric_name"
                                        label="Target audience"
                                        persistent-hint
                                        outlined
                                    ></v-text-field>
                                </v-col>
                            </v-row>

                            <v-divider></v-divider>
                            <v-row class="text-center ml-5 mr-5 mt-3">
                                <v-col cols="7">
                                    <v-container>
                                        <v-textarea
                                            v-model="editedItem.submetric_name"
                                            label="Question"
                                            persistent-hint
                                            outlined
                                        ></v-textarea>
                                    </v-container>
                                </v-col>
                                <v-col cols="4">
                                    <v-container id="dropdown-example-3">
                                        <v-overflow-btn
                                            class="my-2"
                                            :items="dropdown_edit"
                                            label="Type of question"
                                            counter
                                            item-value="text"
                                        ></v-overflow-btn>
                                    </v-container>
                                </v-col>
                                <v-col cols="1">
                                    <v-btn small outlined fab color="indigo">
                                        <v-icon> mdi-plus </v-icon>
                                    </v-btn>
                                    <v-btn small outlined fab color="red">
                                        <v-icon> mdi-delete </v-icon>
                                    </v-btn>
                                </v-col>
                            </v-row>
                        </v-card>
                    </div>
                </v-container>
            </v-card-text>

            <v-row justify="center" class="m-3">
                <v-btn class="m-2" outlined color="teal">
                    Save
                </v-btn>
                <v-btn class="m-2" outlined color="grey" href="/example/">
                    Back
                </v-btn>
            </v-row>
        </v-card>
    </v-app>
</template>

<script>
export default {
    data: () => ({
        dialog: false,

        metrics: [],
        editedIndex: -1,
        editedItem: {
            id: "",
            metric_name: ""
        },
        defaultItem: {
            id: "",
            metric_name: 0
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

    created() {
        this.initialize();
    },

    methods: {
        initialize() {
            this.metrics = [
                {
                    id: "1",
                    metric_name: "testmetrics"
                },
                {
                    id: "2",
                    metric_name: "testmetrics2"
                },
                {
                    id: "3",
                    metric_name: "testmetrics3"
                }
            ];
        },

        editItem(item) {
            this.editedIndex = this.metrics.indexOf(item);
            this.editedItem = Object.assign({}, item);
            this.dialog = true;
        },

        deleteItem(item) {
            const index = this.metrics.indexOf(item);
            confirm("Are you sure you want to delete this Model?") &&
                this.metrics.splice(index, 1);
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
