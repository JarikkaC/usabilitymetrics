<template>
    <v-app>
        <v-container class="mt-2 mx-2">
            <v-row>
                <v-col cols="auto">
                    <h3 class="mt-3">
                        Project Name: {{ this.project.project_name }}
                    </h3>
                </v-col>
            </v-row>
            <v-row>
                <p class="mt-3 ml-5">
                    {{ this.project.description }}
                </p>
            </v-row>

            <br />
            <v-card
                class="d-inline-block m-3"
                v-for="picture in pictureEachProject(project.id)"
                :key="picture.id"
            >
                <v-row justify="space-between">
                    <v-container>
                        <v-col cols="auto">
                            <img
                                :src="'/storage/' + picture[0].picture_path"
                                height="200px"
                                @click="(dialog = true), zoom(picture[0])"
                            />
                        </v-col>
                    </v-container>
                </v-row>
            </v-card>

            <!-- -------------------------------------------------------------------- -->
            <v-dialog v-model="dialog" max-width="1500px">
                <v-card>
                    <v-card-text>
                        <v-container>
                            <img
                                :src="
                                    '/storage/' + this.pictureZoom.picture_path
                                "
                                width="100%"
                            />
                        </v-container>
                    </v-card-text>
                </v-card>
            </v-dialog>
            <!-- -------------------------------------------------------------------- -->
        </v-container>
    </v-app>
</template>

<script>
export default {
    props: ["usernow", "id"],
    mounted() {
        this.getProject();
        this.getPicture();
    },
    data: () => ({
        dialog: false,
        today: new Date(),
        upload: false,
        project: [],
        pictures: [],
        picture_path: null,
        image: null,
        pictureZoom: {}
    }),

    methods: {
        getProject() {
            axios.get("/api/project/" + this.id).then(response => {
                this.project = response.data;
            });
        },

        getPicture() {
            axios.get("/api/pictures/").then(response => {
                this.pictures = response.data;
            });
        },

        zoom(val) {
            this.pictureZoom = val;
        },

        groupBy(xs, key) {
            return xs.reduce(function(rv, x) {
                (rv[x[key]] = rv[x[key]] || []).push(x);
                return rv;
            }, {});
        },

        pictureEachProject(project_id) {
            let pic = this.pictures.filter(picture => {
                return picture.project_id == project_id;
            });
            return this.groupBy(pic, "picture_path");
        },

        close() {
            this.dialog = false;
        }
    },

    computed: {
        pictureFil: function() {
            return this.pictures.filter(picture => {
                return picture.project_id == this.id;
            });
        }
    },

    watch: {
        dialog(val) {
            val || this.close();
        }
    }
};
</script>
