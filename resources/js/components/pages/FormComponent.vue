<template>
    <v-app>
        <v-card class="m-4">
            <v-card-title>Evaluation Form</v-card-title>
            <v-divider></v-divider>
            <v-container>
                <center>
                    <img
                        :src="'/storage/' + picture.picture_path"
                        height="400px"
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

            <h4 class="p-3">Question:</h4>
            <p class="ml-5">
                คุณคิดว่า Interface นี้มีความน่าสนใจมากแค่ไหน? (1-น้อยที่สุด
                5-มากที่สุด)
            </p>

            <!-- <v-radio-group class="ml-5" v-model="column" column>
                <v-radio label="1" value="1"></v-radio>
                <v-radio label="2" value="2"></v-radio>
                <v-radio label="3" value="3"></v-radio>
                <v-radio label="4" value="4"></v-radio>
                <v-radio label="5" value="5"></v-radio>
            </v-radio-group> -->

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

        <v-dialog v-model="dialog" max-width="1000px">
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
    props: ["usernow", "id"],
    mounted() {
        this.getPicture();
        this.getQuestion();
        this.getSubmetric();
    },
    data: () => ({
        dialog: false,
        pictureZoom: {},
        column: null,
        row: null,

        picture_path: null,

        picture: [],
        project: [],
        question: [],
        submetric: []
    }),

    methods: {
        getPicture() {
            axios.get("/api/pictures/" + this.id).then(response => {
                this.picture = response.data;
                console.log("Picture", this.picture);
            });
        },

        getQuestion() {
            axios.get("/api/questions/").then(response => {
                this.question = response.data;
                console.log("Question", this.question);
            });
        },

        getSubmetric() {
            axios.get("/api/submetrics/").then(response => {
                this.submetric = response.data;
                console.log("Submetric", this.submetric);
            });
        },

        zoom(val) {
            this.pictureZoom = val;
        },

    },

    computed: {
        submetricFill: function() {
            return this.submetric.filter(submetric => {
                return submetric.id == this.submetric_id;
            });
        }
        //  pictureFil: function() {
        //     return this.pictures.filter(picture => {
        //         return picture.project_id == this.id;
        //     });
        // }
    },

    watch: {
        dialog(val) {
            val || this.close();
        }
    }
};
</script>
