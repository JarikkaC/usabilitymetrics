<template>
    <v-app>
        <v-card class="m-4">
            <v-card-title>
                Report
                <v-spacer></v-spacer>
                <v-btn color="grey" outlined href="/report">
                    <v-icon class="mr-2"> mdi-arrow-left </v-icon>
                    Back
                </v-btn>
            </v-card-title>
            <v-divider></v-divider>
            <v-container>
                <center>
                    <img
                        :src="'/storage/' + this.picture_path"
                        height="400px"
                        @click="(dialog = true), zoom(picture)"
                    />
                </center>
            </v-container>

            <v-divider></v-divider>

            <div class="ml-5">
                <v-card-text>
                    <h5>
                        <v-icon small class="mr-2" color="grey">
                            mdi-checkbox-blank-circle
                        </v-icon>
                        Question: <br />
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;คุณคิดว่า interface
                        นี้มีความน่าดึงดูดใจหรือไม่ (1-น้อยที่สุด, 5-มากที่สุด)
                    </h5>
                    <br /><br />
                    <h5>
                        <v-icon small class="mr-2" color="#F4D03F">
                            mdi-checkbox-blank-circle
                        </v-icon>
                        Your result: <br />
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3/5
                    </h5>
                    <br /><br />
                    <h5>
                        <v-icon small class="mr-2" color="#F4D03F">
                            mdi-checkbox-blank-circle
                        </v-icon>
                        Comment: <br />
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;interface
                        ใช้สีสันในการออกแบบได้ดี แต่มีการจัดวางหน้า layout
                        ที่ยากต่อการใช้งาน และตัวอักษรมีขนาดเล็กเกินไป
                    </h5>
                </v-card-text>
            </div>

            <v-divider></v-divider>

            <div class="ml-5">
                <v-card-text>
                    <br /><br />
                    <h5>
                        <v-icon small class="mr-2" color="grey">
                            mdi-checkbox-blank-circle
                        </v-icon>
                        Question: <br />
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;คุณเข้าใจหรือไม่กว่า
                        interface นี้มีฟังก์ชันอะไรบ้าง {1-ไม่เข้าใจ,
                        2-เข้าใจบางส่วน, 3-เข้าใจทั้งหมด)
                    </h5>
                    <br /><br />
                    <h5>
                        <v-icon small class="mr-2" color="#F4D03F">
                            mdi-checkbox-blank-circle
                        </v-icon>
                        Your result: <br />
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2/3
                    </h5>
                    <br /><br />
                    <h5>
                        <v-icon small class="mr-2" color="#F4D03F">
                            mdi-checkbox-blank-circle
                        </v-icon>
                        Comment: <br />
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ออกแบบ interface
                        ส่วนที่เป็นฟังก์ชันได้สังเกตง่าย
                        และสามารถคาดเดาการใช้งานได้ด้วยการมอง
                    </h5>
                </v-card-text>
            </div>

            <!-- <div v-for="(question, index) in questions" :key="question.id">
                <v-card-text>
                    <h6>Question: {{ question.question }}</h6>
                    <h6>Your result:</h6>
                    <h6>Comment:</h6>
                </v-card-text>
            </div> -->

            <v-divider></v-divider>
        </v-card>

        <v-dialog v-model="dialog" max-width="1000px">
            <v-card>
                <v-card-text>
                    <v-container>
                        <img
                            :src="'/storage/' + this.picture_path"
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
    props: ["usernow", "picture_path"],
    async created() {
        await this.getPicture();
        await this.getSubmetric();
        this.getAnswer();
    },
    data: () => ({
        dialog: false,
        pictureZoom: {},
        answer: [],
        row: null,
        picture: [],
        project: [],
        questions: [],
        submetric: [],
        choices: [],
    }),

    methods: {
        async getPicture() {
            await axios
                .get("/api/pictures/" + this.picture_path)
                .then((response) => {
                    this.picture = response.data;
                });
            //console.log("this.picture", this.picture);
            await this.getQuestion();
        },

        async getQuestion() {
            for (let index = 0; index < this.picture.length; index++) {
                const element = this.picture[index];
                let submetric_id = element.submetric_id;
                await axios
                    .get("/api/questions/" + submetric_id)
                    .then((response) => {
                        this.questions.push(response.data[0]);
                        this.questions.forEach((question) => {
                            question.choices = [];
                            for (
                                let index = 0;
                                index < question.max_select;
                                index++
                            ) {
                                question.choices.push(index + 1);
                            }
                        });
                    });
            }
            console.log(this.questions);
        },

        getSubmetric() {
            axios.get("/api/submetrics/").then((response) => {
                this.submetric = response.data;
                console.log("Submetric", this.submetric);
            });
        },

        getAnswer() {
            axios.get("/api/answers/").then((response) => {
                this.answer = response.data;
                console.log("answers", this.answer);
            });
        },

        zoom(val) {
            this.pictureZoom = val;
        },
    },

    computed: {
        submetricFill: function () {
            return this.submetric.filter((submetric) => {
                return submetric.id == this.submetric_id;
            });
        },
    },

    watch: {
        dialog(val) {
            val || this.close();
        },
    },
};
</script>
