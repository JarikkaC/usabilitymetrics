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

            <v-card class="d-inline-block mx-4" @click="upload = true">
                <v-row justify="space-between">
                    <v-container>
                        <v-col cols="auto">
                            <v-img
                                class="pl-1"
                                height="100"
                                width="100"
                                src="/images/element/add.png"
                            ></v-img>
                        </v-col>
                    </v-container>
                </v-row>
            </v-card>
            <br /><br />
            <v-card
                class="d-inline-block mx-4"
                v-for="picture in pictureFil"
                :key="picture.picture_path"
            >
                <v-row justify="space-between">
                    <v-container>
                        <v-col cols="auto">
                            <img
                                :src="'/storage/' + picture.picture_path"
                                height="200px"
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
        today: new Date(),
        upload: false,
        project: [],
        pictures: [],
        picture_path: null,
        image: null
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
                console.log("aaa", this.pictures);
            });
        },

        addPicture() {
            this.pictures.push({
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
        }
    },

    computed: {
        pictureFil: function() {
            return this.pictures.filter(picture => {
                return (
                    picture.project_id == this.id 
                );
            });
        }
    }
};
</script>
