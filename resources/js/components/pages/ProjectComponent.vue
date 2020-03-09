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

            <v-btn @click="upload = true" color="#64AC8F">
                Upload Graphic Media
                <v-icon class="ml-3" right dark>mdi-cloud-upload</v-icon>
            </v-btn>

            <v-btn
                class="ml-5"
                color="#648BAC"
                :href="/selectmetric/ + this.id"
            >
                Create Model
            </v-btn>

            <br /><br />
            <v-card
                class="d-inline-block m-3"
                v-for="picture in pictureFil"
                :key="picture.picture_path"
                @click="dialog = true"
            >
                <v-row justify="space-between">
                    <v-container>
                        <v-col cols="auto">
                            <img
                                :src="'/storage/' + picture.picture_path"
                                height="250px"
                            />
                        </v-col>
                    </v-container>
                </v-row>
            </v-card>

            <v-dialog v-model="upload" width="600px" height="400px">
                <v-card>
                    <v-card-text>
                        <v-row>
                            <h3 class="mt-3 mx-3">Upload Your Graphic Media</h3>
                        </v-row>

                        <v-row class="mx-3 mb-3 mt-3">
                            <input
                                id="uploadImage"
                                type="file"
                                @change="onImageChange"
                            />
                        </v-row>
                        <center>
                            <img
                                :src="image"
                                v-if="image"
                                class="img-responsive"
                                height="120"
                            />
                        </center>
                        <v-row class="mx-5 mb-3 mt-3">
                            <v-btn
                                class="mr-4"
                                color="#6495D9"
                                @click="addPicture"
                                >Upload</v-btn
                            >
                            <v-btn @click="upload = false">Cancel</v-btn>
                        </v-row>
                    </v-card-text>
                </v-card>
            </v-dialog>

            <!-- -------------------------------------------------------------------- -->

            <v-dialog v-model="dialog" max-width="500px">
                <v-card
                    v-if="selectedPicture"
                >
                    <v-card-text>
                        <v-container>
                            <img
                                :src="'/storage/' + picture.picture_path"
                                height="800px"
                            />
                        </v-container>
                    </v-card-text>
                </v-card>
            </v-dialog>
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
        selectedPicture: null
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

        addPicture() {
            this.pictureFil.push({
                user_id: this.usernow.user_id,
                picture_path: this.picture_path,
                project_id: this.id,
                image: this.image
            }) &&
                axios.post("/api/pictures", {
                    user_id: this.usernow.user_id,
                    picture_path: this.picture_path,
                    project_id: this.id,
                    image: this.image
                });
            this.upload = false;
        },

        onImageChange(e) {
            let file = e.target.files[0];
            let reader = new FileReader();
            this.noUpload = false;
            reader.onloadend = e => {
                this.image = reader.result;
                var date =
                    this.today.getFullYear() +
                    "-" +
                    (this.today.getMonth() + 1) +
                    "-" +
                    this.today.getDate();
                var time =
                    this.today.getHours() + "-" + this.today.getMinutes();
                var x = Math.floor(Math.random() * 100);
                var dateTime = date + "_" + time;
                const file_name = "image_" + dateTime + "_" + x + ".png";
                this.picture_path = file_name;
            };
            reader.readAsDataURL(file);
        },

        zoom(picture_path) {
            console.log("Zoom", picture_path);
            this.selectedPicture = picture_path;
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
