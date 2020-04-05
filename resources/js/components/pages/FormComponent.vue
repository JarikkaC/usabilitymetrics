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

            <div v-for="(question, index) in questions" :key="question.id">
                <h4 class="p-3">Question:</h4>
                <p class="ml-5">
                    {{ question.question }}
                </p>
                <v-radio-group class="ml-5" v-model="answer[index]" column>
                    <v-radio
                        :label="choice.toString()"
                        v-for="choice in question.choices"
                        :key="choice"
                        :value="choice"
                        v-model="answer.level_selected"
                    >
                        {{ choice }}
                    </v-radio>
                </v-radio-group>
                <h5 class="p-3">Comment:</h5>
                <v-textarea
                    label="write a comment"
                    persistent-hint
                    outlined
                    class="ml-5 mr-5"
                    v-model="answer.comment"
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
                <v-btn
                    class="m-2"
                    large
                    outlined
                    color="grey"
                    href="/evaluation/"
                >
                    Back
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
    </v-app>
</template>

<script>
export default {
    props: ["usernow", "picture_path"],
    async created() {
        await this.getPicture();
        await this.getSubmetric();
    },
    data: () => ({
        dialog: false,
        pictureZoom: {},
        answer: [
            {
                comment: null,
                level_selected: null,
            },
        ],
        row: null,
        picture: [],
        project: [],
        questions: [],
        submetric: [],
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
            console.log("this.picture", this.picture);
            for (let index = 0; index < this.picture.length; index++) {
                const element = this.picture[index];
                let submetric_id = element.submetric_id;
                console.log(submetric_id);
                await axios
                    .get("/api/questions/" + submetric_id)
                    .then((response) => {
                        this.questions.push(response.data);
                        let temp = this.questions[0];
                        this.questions = temp
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
        },

        getSubmetric() {
            axios.get("/api/submetrics/").then((response) => {
                this.submetric = response.data;
                console.log("Submetric", this.submetric);
            });
        },

        zoom(val) {
            this.pictureZoom = val;
        },

        submit() {
            axios.post("/api/answers", {
                question_id: this.question_id,
                level_selected: this.answer.choice,
                comment: this.answer.comment,
            });
            // this.dialog = true;
        },
    },

    computed: {
        submetricFill: function () {
            return this.submetric.filter((submetric) => {
                return submetric.id == this.submetric_id;
            });
        },
        //  pictureFil: function() {
        //     return this.pictures.filter(picture => {
        //         return picture.project_id == this.id;
        //     });
        // }
    },

    watch: {
        dialog(val) {
            val || this.close();
        },
    },
};
</script>
