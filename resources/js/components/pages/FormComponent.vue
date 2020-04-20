<template>
    <v-app>
        <v-card class="m-4">
            <v-card-title>
                Evaluation Form
                <v-spacer></v-spacer>
                <v-btn color="grey" outlined href="/metric">
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

            <v-card-text class="ml-5">
                หมายเหตุ: ในกรณีที่ต้องการเปลี่ยนแปลงคำถาม
                สามารถแก้ไขคำถามได้โดยคลิกที่ หน้า
                <a href="/metric/">Metrics</a> และกดเข้าไปแก้ไข
            </v-card-text>

            <div v-for="question in questions" :key="question.id">
                <h4 class="p-3">Question:</h4>
                <p class="ml-5">
                    {{ question.question }}
                </p>
                <v-radio-group
                    class="ml-5"
                    v-model="question.level_selected"
                    column
                >
                    <v-radio
                        v-for="choice in getChoice(question)"
                        :label="choice.toString()"
                        :key="choice"
                        :value="choice"
                    />
                </v-radio-group>
                <h5 class="p-3">Comment:</h5>
                <v-textarea
                    label="write a comment"
                    persistent-hint
                    outlined
                    class="ml-5 mr-5"
                    v-model="question.comment"
                >
                </v-textarea>
            </div>

            <v-divider></v-divider>

            <v-row class="m-3">
                <v-spacer></v-spacer>
                <v-btn class="m-2" large dark color="teal" @click="submit">
                    <v-icon large class="mr-3">mdi-application-import</v-icon>
                    Submit
                </v-btn>
            </v-row>
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

        <v-dialog v-model="savedialog" max-width="400">
            <v-card>
                <v-container>
                    <center>
                        <v-btn
                            class="m-5"
                            outlined
                            fab
                            color="green darken-1"
                            height="70px"
                            width="70px"
                        >
                            <v-icon height="700px">
                                mdi-check-outline
                            </v-icon>
                        </template>

                        <h2><b>คุณได้ตอบคำถามเรียบร้อยแล้ว!!</b></h2>
                        <h5>
                            เพื่อดูรายงานผลการประเมิน กรุณาคลิกที่หน้า Report
                            หรือกลับไปที่หน้าประเมิน
                        </h5>

                        <br />
                    </center>
                </v-container>
            </v-card>
        </v-dialog>
    </v-app>
</template>

<script>
export default {
    props: ["picture_path"],
    async created() {
        await this.getPicture();
        await this.getSubmetric();
    },
    data: () => ({
        dialog: false,
        savedialog: false,
        pictureZoom: {},
        row: null,
        picture: [],
        project: [],
        questions: [],
        submetric: []
    }),
    methods: {
        async getPicture() {
            // console.log(this.picture_path);
            await axios
                .get("/api/pictures/" + this.picture_path)
                .then(response => {
                    this.picture = response.data;
                });
            await this.getQuestion();
        },
        async getQuestion() {
            for (let index = 0; index < this.picture.length; index++) {
                const element = await this.picture[index];
                let submetric_id = await element.submetric_id;
                //console.log('submetric_id',submetric_id)
                await axios
                    .get("/api/questions/" + submetric_id)
                    .then(async response => {
                        await this.questions.push(...response.data);
                    });
            }
        },
        getChoice(question) {
            let choices = [];
            for (let index = 0; index < question.max_select; index++) {
                choices.push(index + 1);
            }
            return choices;
        },
        getSubmetric() {
            axios.get("/api/submetrics/").then(response => {
                this.submetric = response.data;
            });
        },
        zoom(val) {
            this.pictureZoom = val;
        },
        submit() {
            for (let index = 0; index < this.questions.length; index++) {
                const element = this.questions[index];
                axios.post("/api/answers", {
                    question_id: element.id,
                    level_selected: element.level_selected,
                    comment: element.comment,
                    picture_path: this.picture_path
                });
            }
            this.savedialog = true;
        }
    },
    computed: {
        submetricFill: function() {
            return this.submetric.filter(submetric => {
                return submetric.id == this.submetric_id;
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
