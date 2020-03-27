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
                v-for="picture in pictureFil"
                :key="picture.id"
            >
                <v-row justify="space-between">
                    <v-container>
                        <v-col cols="auto">
                            <img
                                :src="'/storage/' + picture.picture_path"
                                height="250px"
                                @click="(dialog = true), zoom(picture)"
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
        zoom(val) {
            this.pictureZoom = val;
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


