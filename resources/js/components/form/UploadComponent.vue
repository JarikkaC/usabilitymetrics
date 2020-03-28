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
                <v-select
                    class="m-5"
                    :items="projectFil"
                    item-text="project_name"
                    item-value="id"
                    label="Select Your Project"
                    v-model="getProjectID"
                    :rules="[v => !!v || 'Project is required']"
                    required
                    outlined
                ></v-select>

                <v-row class="mr-5 ml-5">
                    <h5 class="mt-3 mx-3">Upload Your Graphic Media</h5>
                </v-row>

                <v-row class="mr-5 ml-5">
                    <input
                        class="ml-5 mt-5 mr-5"
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
                        height="400px"
                    />
                </center>
                <v-row class="mr-5 ml-5 mt-5"> </v-row>
            </v-card-text>

            <v-card-text>
                <v-row class="mr-5 ml-5">
                    <h5 class="mt-3 mx-3">Select Metric</h5>
                </v-row>
                <v-row class="mr-5 ml-5">
                    <p class="mt-3 mx-3">
                        เลือก Metric ที่ต้องการเพื่อสร้าง Measurement Model
                    </p>
                </v-row>

                <v-row>
                    <v-col>
                        <v-card class="mx-auto" width="500px" outlined>
                            <template v-for="metric in metrics">
                                <v-checkbox
                                    :key="metric.metric_name"
                                    class="ml-5"
                                    :label="metric.metric_name"
                                    :value="metric.metric_name"
                                >
                                </v-checkbox>
                                <template
                                    v-if="metric.submetric"
                                    v-for="item in metric.submetric"
                                >
                                    <v-checkbox
                                        return-object
                                        v-model="selected"
                                        v-if="item.submetric_name"
                                        :key="item.submetric_name"
                                        class="ml-10"
                                        :label="item.submetric_name"
                                        :value="item"
                                    >
                                    </v-checkbox>
                                </template>
                            </template>
                        </v-card>

                        <div class="text-center mt-5">
                            <v-btn
                                class="ml-5 mr-3"
                                dark
                                large
                                color="teal"
                                @click="postMetric(projectFil.project_id)"
                            >
                                Save
                            </v-btn>

                            <v-btn
                                outlined
                                large
                                color="grey"
                                class="ml-5 mr-3"
                                href="/evaluation/"
                            >
                                Back
                            </v-btn>
                        </div>
                    </v-col>
                </v-row>
            </v-card-text>

            <v-dialog v-model="dialog" max-width="290">
                <v-card>
                    <v-card-title class="headline"
                        >Use Google's location service?</v-card-title
                    >

                    <v-card-text>
                        Let Google help apps determine location. This means
                        sending anonymous location data to Google, even when no
                        apps are running.
                    </v-card-text>

                    <v-card-actions>
                        <v-spacer></v-spacer>

                        <v-btn
                            color="green darken-1"
                            text
                            @click="dialog = false"
                        >
                            Disagree
                        </v-btn>

                        <v-btn
                            color="green darken-1"
                            text
                            @click="dialog = false"
                        >
                            Agree
                        </v-btn>
                    </v-card-actions>
                </v-card>
            </v-dialog>
        </v-card>
    </v-app>
</template>

<script>
export default {
    props: ["usernow", "id"],
    mounted() {
        this.getProject();
        this.getPicture();
        this.getMetric();
        this.postMetric();
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
        item: [],
        metrics: [],
        selected: [],
        dialog: false
    }),

    methods: {
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
                this.metrics = this.tranFormData(res);
            });
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

        postMetric() {
            for (let index = 0; index < this.selected.length; index++) {
                const element = this.selected[index];
                axios.post("/api/pictures", {
                    user_id: this.usernow.user_id,
                    project_id: this.getProjectID,
                    picture_path: this.picture_path,
                    image: this.image,
                    submetric_id: element.id,
                    metric_id: element.metric_id
                });
                this.upload = false;
                this.dialog = true;
            }
        },
        tranFormData(data) {
            const result = data.map(element => ({
                id: element.id,
                metric_name: element.metric_name,
                submetric: element.submetric
            }));
            return result;
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
