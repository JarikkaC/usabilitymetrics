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
                                    color="#F4D03F"
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
                                                <v-textarea
                                                    v-model="
                                                        editedItem.description
                                                    "
                                                    autocomplete="description"
                                                    label="Description"
                                                ></v-textarea>
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
                    <v-btn
                        class="m-2"
                        outlined
                        color="teal"
                        :href="/project/ + item.id"
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
                align: "center",
                sortable: false,
                value: "project_name"
            },
            { text: "Date/Time", value: "created_at", align: "center" },
            {
                text: "Actions",
                value: "action",
                align: "center",
                sortable: false
            }
        ],
        projects: [],
        description: [],
        editedID: null,
        editedIndex: -1,
        editedItem: {
            project_name: "",
            description: ""
        },
        defaultItem: {
            project_name: "",
            description: ""
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
                project_name: this.editedItem.project_name,
                description: this.editedItem.description
            }) &&
                axios.post("api/project", {
                    user_id: this.usernow.user_id,
                    project_name: this.editedItem.project_name,
                    description: this.editedItem.description
                });
            this.close();
        },

        editItem(item) {
            this.editedIndex = this.projects.indexOf(item);
            this.editedItem = Object.assign({}, item);
            this.dialog = true;
        },

        deleteItem(item) {
            console.log(item);
            const index = this.projects.indexOf(item);
            confirm("Are you sure you want to delete this project?") &&
                axios.delete("api/project/" + item.id).then(response => {
                    this.projects.splice(index, 1);
                });
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
                Object.assign(
                    this.projects[this.editedIndex],
                    this.editedItem
                ) &&
                    axios.put("/api/project/" + this.editedID, {
                        project_name: this.editedItem.project_name,
                        description: this.editedItem.description
                    });
            } else {
                this.projects.push(this.editedItem);
            }
            this.close();
        }
    }
};
</script>
