<template>
    <v-app>
        <v-card class="m-4">
            <v-data-table
                :headers="headers"
                :items="metrics"
                sort-by="project_name"
                class="elevation-1"
            >
                <template v-slot:top>
                    <v-toolbar flat color="white">
                        <v-toolbar-title>Usability Report</v-toolbar-title>
                        <v-divider class="mx-4" inset vertical></v-divider>
                        <v-spacer></v-spacer>
                        <v-dialog v-model="dialog" max-width="500px">
                            <v-card>
                                <v-card-title>
                                    <span class="headline">{{
                                        formTitle
                                    }}</span>
                                </v-card-title>

                                <v-card-text>
                                    <v-container>
                                        <v-row>
                                            <v-col>
                                                <v-text-field
                                                    v-model="
                                                        editedItem.project_name
                                                    "
                                                    label="Metric Name"
                                                ></v-text-field>
                                            </v-col>
                                        </v-row>
                                    </v-container>
                                </v-card-text>

                                <v-card-actions>
                                    <v-spacer></v-spacer>

                                    <v-btn color="blue darken-1" text
                                        >Save</v-btn
                                    >

                                    <v-btn color="#CD4D4D" text @click="close"
                                        >Cancel</v-btn
                                    >
                                </v-card-actions>
                            </v-card>
                        </v-dialog>
                    </v-toolbar>
                </template>
                <template v-slot:item.actions="{ item }">
                    <v-btn
                        class="m-2"
                        outlined
                        color="teal"
                        href="/addmetricdetail/"
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
                        color="red"
                        @click="deleteItem(item)"
                    >
                        <v-icon> mdi-delete</v-icon>
                    </v-btn>
                </template>
                <template v-slot:no-data>
                    <v-btn color="primary" @click="initialize">Reset</v-btn>
                </template>
            </v-data-table>
        </v-card>
    </v-app>
</template>

<script>
export default {
    data: () => ({
        dialog: false,
        headers: [
            {
                text: "Metric ID",
                align: "center",
                sortable: false,
                value: "id"
            },
            { text: "Metric Name", value: "metric_name", align: "center" },
            {
                text: "Actions",
                value: "actions",
                sortable: false,
                align: "center"
            }
        ],
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
