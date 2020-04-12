<template>
    <v-app>
        <v-card class="m-4">
            <div>
                <v-row class="mr-3 ml-3">
                    <v-toolbar-title class="m-4">Evaluation </v-toolbar-title>
                    <v-spacer></v-spacer>
                    <v-btn
                        color="#F4D03F"
                        dark
                        class="m-4"
                        href="/evaluation/upload"
                    >
                        Prepare Evaluation
                    </v-btn>
                </v-row>
                <v-divider></v-divider>

                <div class="text-center d-flex pb-4 m-4">
                    <h5 class="ml-5">Your Project</h5>
                    <v-spacer></v-spacer>
                    <v-btn outlined small color="grey" @click="all">all</v-btn>

                    <v-btn
                        class="ml-4"
                        small
                        outlined
                        color="grey"
                        @click="none"
                    >
                        none
                    </v-btn>
                </div>
                <v-expansion-panels v-model="panel" multiple>
                    <v-expansion-panel
                        v-for="project in projectFil"
                        :key="project.id"
                    >
                        <v-expansion-panel-header>
                            {{ project.project_name }}
                        </v-expansion-panel-header>

                        <v-expansion-panel-content>
                            <v-row justify="space-between">
                                <v-card
                                    class="d-inline-block m-3"
                                    v-for="picture in pictureEachProject(
                                        project.id
                                    )"
                                    :key="picture.id"
                                >
                                    <v-container class="center">
                                        <v-col cols="auto">
                                            <center>
                                                <img
                                                    :src="
                                                        '/storage/' +
                                                            picture[0].picture_path
                                                    "
                                                    height="200px"
                                                />
                                                <div class="mt-5">
                                                    <v-btn color="teal" dark :href="/evaluation/ + picture[0].picture_path">
                                                        Evaluation
                                                    </v-btn>
                                                    <!-- <v-btn color="indigo" dark>
                                                        See Report
                                                    </v-btn> -->
                                                </div>
                                            </center>
                                        </v-col>
                                    </v-container>
                                </v-card>
                            </v-row>
                        </v-expansion-panel-content>
                    </v-expansion-panel>
                </v-expansion-panels>
            </div>
        </v-card>
    </v-app>
</template>

<script>
export default {
    props: ["usernow", "id"],
    mounted() {
        this.getProject();
        this.getPicture();
    },
    data() {
        return {
            upload: false,
            panel: [],
            today: new Date(),
            projects: [],
            pictures: [],
            picture_path: null,
            image: null
        };
    },
    methods: {
        // Create an array the length of our items
        // with all values as true
        all() {
            this.panel = [...Array(this.items).keys()].map((k, i) => i);
        },
        // Reset the panel
        none() {
            this.panel = [];
        },

        getProject() {
            axios.get("/api/project/").then(response => {
                this.projects = response.data;
            });
        },

        getPicture() {
            axios.get("/api/pictures/").then(response => {
                this.pictures = response.data;
            });
        },

        getMetric() {
            axios.get("/api/metrics").then(response => {
                let res = response.data;
                // this.metrics = response.data;
                this.metrics = this.tranFormData(res);
            });
        },

        groupBy(xs, key) {
            return xs.reduce(function(rv, x) {
                (rv[x[key]] = rv[x[key]] || []).push(x);
                return rv;
            }, {});
        },

        pictureEachProject(project_id) {
            let pic =  this.pictures.filter(picture => {
                return picture.project_id == project_id;
            });
            return this.groupBy(pic,'picture_path')
        }
    },

    computed: {
        projectFil: function() {
            return this.projects.filter(project => {
                return project.user_id == this.usernow.user_id;
            });
        }
    }
};
</script>
