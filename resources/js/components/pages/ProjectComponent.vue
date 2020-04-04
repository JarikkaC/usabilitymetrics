<template>
    <v-app>
        <v-card class="m-4">
            <v-row class="mt-5 ml-5">
                <h3>
                    Project Name: {{ this.project.project_name }}
                </h3>
                <v-spacer></v-spacer>
                <v-btn class="mr-10" color="grey" outlined href="/project">
                    <v-icon class="mr-2"> mdi-arrow-left </v-icon>
                    Back
                </v-btn>
            </v-row>
            <v-row class="mt-5 ml-5 mr-5">
                <h5>Description: <br /></h5>
                <p>{{ this.project.description }}</p>
            </v-row>
            <v-divider></v-divider>
            <v-row class="mt-4 ml-5">
                <p style="color: grey;">
                    *หากต้องการเริ่มขั้นตอนการ upload รูปภาพและการประเมินรูปภาพ
                    กรุณา click ที่ปุ่ม <u>Prepare Evaluation
                        </u>
                </p>
            </v-row>
            <v-row class="ml-5">
                <v-btn
                    color="#F4D03F"
                    dark
                    href="/evaluation/upload"
                >
                    <v-icon class="mr-2"> mdi-upload </v-icon>
                    Prepare Evaluation
                </v-btn>
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
