<template>
    <v-app>
        <v-card class="m-4">
            <v-card-title>
                Prepare Evaluation
            </v-card-title>
            <v-divider></v-divider>
            <v-card-text>
                เพื่อเริ่มต้นการประเมินสื่อเชิงภาพ กรุณา upload
                สื่อเชิงภาพที่ต้องการการประเมินของคุณ และสร้าง model
                ที่จะใช้เป็นตัวชี้วัดในการประเมิน
            </v-card-text>
            <v-card-text>
                <v-row>
                    <v-select
                        class="m-5"
                        :items="projectFil"
                        item-text="project_name"
                        item-value="id"
                        label="Select Your Project"
                        v-model="getProjectID"
                        dense
                        outlined
                    ></v-select>
                </v-row>

                <v-row>
                    <h5 class="mt-3 mx-3">Upload Your Graphic Media</h5>
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
                    <v-btn class="mr-4" color="#6495D9" @click="addPicture(projectFil.project_id)"
                        >Upload</v-btn
                    >
                    <v-btn @click="upload = false">Cancel</v-btn>
                </v-row>
            </v-card-text>
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
        today: new Date(),
        upload: false,
        projects: [],
        pictures: [],
        picture_path: null,
        image: null,
        getProjectID: null,
        pictureZoom: {},
        item: []
    }),

    methods: {
        getProject() {
            axios.get("/api/project/").then(response => {
                this.projects= response.data;
            });
            console.log("Project", this.project);
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
                project_id: this.getProjectID,
                image: this.image
            }) &&
                axios.post("/api/pictures", {
                    user_id: this.usernow.user_id,
                    picture_path: this.picture_path,
                    project_id: this.getProjectID,
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
        }
    },

    computed: {
        pictureFil: function() {
            return this.pictures.filter(picture => {
                return picture.project_id == this.id;
            });
        },

        projectFil: function() {
            return this.projects.filter(project => {
                return project.user_id == this.usernow.user_id;
            });
        }
    }
};
</script>
