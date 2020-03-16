<template>
    <v-app>
        <v-card class="m-4">
            <v-data-table
                :headers="headers"
                :items="models"
                sort-by="project_name"
                class="elevation-1"
            >
                <template v-slot:top>
                    <v-toolbar flat color="white">
                        <v-toolbar-title>Measurement Model</v-toolbar-title>
                        <v-divider class="mx-4" inset vertical></v-divider>
                        <v-spacer></v-spacer>
                        <v-btn
                            color="#F4D03F"
                            dark
                            class="mb-2"
                            v-on="on"
                            :href="/addmodel/"
                            >Add Model</v-btn
                        >

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
                text: "Model ID",
                align: "center",
                sortable: false,
                value: "id"
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
        models: [],
        editedIndex: -1,
        editedItem: {
            id: "",
            project_name: 0,
            create_at: 0
        },
        defaultItem: {
            id: "",
            project_name: 0,
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

    created() {
        this.initialize();
    },

    methods: {
        initialize() {
            this.models = [
                {
                    id: "1",
                    // project_name: "testproject",
                    created_at: 0
                },
                {
                    id: "2",
                    // project_name: "testproject2",
                    created_at: 0
                },
                {
                    id: "3",
                    // project_name: "testproject3",
                    created_at: 0
                }
            ];
        },

        editItem(item) {
            this.editedIndex = this.models.indexOf(item);
            this.editedItem = Object.assign({}, item);
            this.dialog = true;
        },

        deleteItem(item) {
            const index = this.models.indexOf(item);
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
                Object.assign(this.models[this.editedIndex], this.editedItem);
            } else {
                this.models.push(this.editedItem);
            }
            this.close();
        }
    }
};
</script>
