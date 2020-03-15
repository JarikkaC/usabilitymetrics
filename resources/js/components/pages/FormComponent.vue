<template>
    <v-app>
        <v-card class="m-4">
            <h2 class="p-3">Evaluation Form</h2>
            <v-divider></v-divider>

            <v-container>
                <center>
                    <img
                        :src="'/storage/' + pictureFil.picture_path"
                        height="250px"
                        @click="(dialog = true), zoom(picture)"
                    />
                </center>
            </v-container>

            <v-divider></v-divider>

            <h4 class="p-3">Question:</h4>
            <p class="ml-5">
                คุณคิดว่า Interface นี้มีความน่าสนใจมากแค่ไหน? (1-น้อยที่สุด
                5-มากที่สุด)
            </p>

            <v-radio-group class="ml-5" v-model="column" column>
                <v-radio label="1" value="1"></v-radio>
                <v-radio label="2" value="2"></v-radio>
                <v-radio label="3" value="3"></v-radio>
                <v-radio label="4" value="4"></v-radio>
                <v-radio label="5" value="5"></v-radio>
            </v-radio-group>

            <h4 class="p-3">Question:</h4>
            <p class="ml-5">
                คุณเข้าใจหรือไม่ว่า interface นี่ทำงานอย่างไร
            </p>
            <v-radio-group class="ml-5" v-model="column" column>
                <v-radio label="เข้าใจ" value="1"></v-radio>
                <v-radio label="เข้าใจบางส่วน" value="2"></v-radio>
                <v-radio label="ไม่เข้าใจ" value="3"></v-radio>
            </v-radio-group>

            <h4 class="p-3">Question:</h4>
            <p class="ml-5">
                คุณเข้าใจหรือไม่ว่า interface นี่ทำงานอย่างไร
            </p>
            <v-radio-group class="ml-5" v-model="column" column>
                <v-radio label="เข้าใจ" value="1"></v-radio>
                <v-radio label="เข้าใจบางส่วน" value="2"></v-radio>
                <v-radio label="ไม่เข้าใจ" value="3"></v-radio>
            </v-radio-group>
            <h4 class="p-3">Question:</h4>
            <p class="ml-5">
                คุณคิดว่า Interface นี้มีความน่าสนใจมากแค่ไหน? (1-น้อยที่สุด
                5-มากที่สุด)
            </p>

            <v-radio-group class="ml-5" v-model="column" column>
                <v-radio label="1" value="1"></v-radio>
                <v-radio label="2" value="2"></v-radio>
                <v-radio label="3" value="3"></v-radio>
                <v-radio label="4" value="4"></v-radio>
                <v-radio label="5" value="5"></v-radio>
            </v-radio-group>

            <h4 class="p-3">Question:</h4>
            <p class="ml-5">
                คุณเข้าใจหรือไม่ว่า interface นี่ทำงานอย่างไร
            </p>
            <v-radio-group class="ml-5" v-model="column" column>
                <v-radio label="เข้าใจ" value="1"></v-radio>
                <v-radio label="เข้าใจบางส่วน" value="2"></v-radio>
                <v-radio label="ไม่เข้าใจ" value="3"></v-radio>
            </v-radio-group>

            <h4 class="p-3">Question:</h4>
            <p class="ml-5">
                คุณเข้าใจหรือไม่ว่า interface นี่ทำงานอย่างไร
            </p>
            <v-radio-group class="ml-5" v-model="column" column>
                <v-radio label="เข้าใจ" value="1"></v-radio>
                <v-radio label="เข้าใจบางส่วน" value="2"></v-radio>
                <v-radio label="ไม่เข้าใจ" value="3"></v-radio>
            </v-radio-group>

            <v-divider></v-divider>
            <v-btn class="m-5" color="#64AC8F">Create Form</v-btn>
            <v-btn class="m-5" :href="/showmetric/ + this.id">Back</v-btn>
        </v-card>

        <v-dialog v-model="dialog" max-width="800px">
            <v-card>
                <v-card-text>
                    <v-container>
                        <img
                            :src="'/storage/' + this.pictureZoom.picture_path"
                            width="100%"
                        />
                    </v-container>
                </v-card-text>
            </v-card>
        </v-dialog>
    </v-app>
</template>

<script>
export default {
    props: ["id"],
    mounted() {
        this.getQuestion();
        this.getPicture();
        this.postPicture();
    },
    data: () => ({
        dialog: false,
        pictureZoom: {},
        questions: [],
        column: null,
        row: null,
        pictures: [],
        picture_path: null
    }),

    methods: {
        getPicture() {
            axios.get("/api/pictures/" + this.id).then(response => {
                this.pictures = response.data;
                console.log("Picture", this.pictures);
            });
        },

        getQuestion() {
            axios.get("/api/questions/").then(response => {
                this.questions = response.data;
            });
        },

        postPicture() {
            axios.post("/api/pictures/", {
                picture_path: this.picture_path,
                project_id: this.id
            });
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
