<template>
    <v-app>
        <v-card class="m-4">
            <v-data-table
                :headers="headers"
                :items="projects"
                sort-by="time"
                class="elevation-1"
            >
                <template v-slot:top>
                    <v-toolbar flat color="white">
                        <v-toolbar-title>My Project</v-toolbar-title>
                        <v-divider class="mx-4" inset vertical></v-divider>

                        <v-dialog v-model="dialog" max-width="500px">
                            <template v-slot:activator="{ on }">
                                <v-btn
                                    color="primary"
                                    dark
                                    class="mb-2"
                                    v-on="on"
                                    >New Project</v-btn
                                >
                            </template>

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
                                                    label="Project name"
                                                ></v-text-field>
                                            </v-col>
                                        </v-row>
                                    </v-container>
                                </v-card-text>

                                <v-card-actions>
                                    <v-spacer></v-spacer>
                                    <v-btn
                                        color="blue darken-1"
                                        text
                                        @click="close"
                                        >Cancel</v-btn
                                    >
                                    <v-btn
                                        color="blue darken-1"
                                        text
                                        @click="addProject"
                                        >Save</v-btn
                                    >
                                </v-card-actions>
                            </v-card>
                        </v-dialog>
                    </v-toolbar>
                </template>
                <template v-slot:item.action="{ item }">
                    <v-btn :href="/project/ + item.id">view</v-btn>

                    <v-icon small @click="deleteItem(item)">
                        delete
                    </v-icon>
                </template>
            </v-data-table>
        </v-card>
    </v-app>
</template>

<!-- ---------------------------------------------------------------------------------------->

<script>
export default {
    props: ["usernow"],
    mounted() {
        this.getProject();
        console.log(this.usernow);
    },
    data: () => ({
        dialog: false,
        headers: [
            {
                text: "Project Name",
                align: "left",
                sortable: false,
                value: "project_name"
            },
            { text: "Date/Time", value: "created_at" },
            { text: "Actions", value: "action", sortable: false }
        ],
        projects: [],
        editedIndex: -1,
        editedItem: {
            project_name: ""
        },
        defaultItem: {
            project_name: ""
        }
    }),

    computed: {
        formTitle() {
            return this.editedIndex === -1 ? "New Project" : "Edit Project";
        }
    },

    watch: {
        dialog(val) {
            val || this.close();
        }
    },

    methods: {
        getProject() {
            axios.get("api/project").then(response => {
                this.projects = response.data;
            });
        },

        addProject() {
            console.log(this.projects);
            axios.post("api/project", {
                user_id: this.usernow.user_id,
                project_name: this.editedItem.project_name
            });
        },

        editItem(item) {
            this.editedIndex = this.project.indexOf(item);
            this.editedItem = Object.assign({}, item);
            this.dialog = true;
        },

        deleteItem(item) {
            const index = this.project.indexOf(item);
            confirm("Are you sure you want to delete this item?") &&
                this.project.splice(index, 1);
        },

        close() {
            this.dialog = false;
            setTimeout(() => {
                this.editedItem = Object.assign({}, this.defaultItem);
                this.editedIndex = -1;
            }, 300);
        }

        // save() {
        //     if (this.editedIndex > -1) {
        //         Object.assign(this.project[this.editedIndex], this.editedItem);
        //     } else {
        //         this.project.push(this.editedItem);
        //     }
        //     this.close();
        // }
    }
};
</script>
