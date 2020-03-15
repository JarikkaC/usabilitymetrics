<template>
    <v-app>
        <v-card class="m-4">
            <v-data-table
                :headers="headers"
                :items="projectFil"
                sort-by="time"
                class="elevation-1"
            >
                <template v-slot:top>
                    <v-toolbar flat color="white">
                        <v-toolbar-title>My Project</v-toolbar-title>
                        <v-divider class="mx-4" inset vertical></v-divider>

                        <v-spacer></v-spacer>

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
                                        @click="addProject"
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
                <template v-slot:item.action="{ item }">
                    <v-btn :href="/project/ + item.id">view</v-btn>
                    <v-btn
                        class="ml-4"
                        outlined
                        color="#337aff"
                        @click="deleteItem(item)"
                    >
                        edit
                    </v-btn>

                    <v-btn
                        class="ml-4"
                        outlined
                        color="#CD4D4D"
                        @click="deleteItem(item)"
                    >
                        delete
                    </v-btn>
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
        },

        projectFil: function() {
            return this.projects.filter(project => {
                return project.user_id == this.usernow.user_id;
            });
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
            this.projects.push({
                user_id: this.usernow.user_id,
                project_name: this.editedItem.project_name
            }) &&
                axios.post("api/project", {
                    user_id: this.usernow.user_id,
                    project_name: this.editedItem.project_name
                });
            this.close();
        },

        deleteItem(item) {
            const index = this.project.indexOf(item);
            confirm("Are you sure you want to delete this item?") &&
                this.project.splice(index, 1);
            axios
                .delete("api/project" + item.id)
                .then(response => console.log(response.data));
        },

        close() {
            this.dialog = false;
            setTimeout(() => {
                this.editedIndex = -1;
            }, 300);
        }
    }
};
</script>
