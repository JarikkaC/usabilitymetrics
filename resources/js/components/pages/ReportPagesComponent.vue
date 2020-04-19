<template>
    <v-app>
        <v-card class="m-4">
            <v-card-title>
                Evaluation Report
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

            <div v-for="question in questions" :key="question.id">
                <v-card-text>
                    <h5>
                        <v-icon small class="mr-2" color="#F4D03F">
                            mdi-checkbox-blank-circle
                        </v-icon>
                        Question: {{ question.question }}
                    </h5>

                    <!-- <div
                        v-for="answer in answerFills(question.id)"
                        :key="answer.id"
                    >
                        <h5>Average:</h5>
                        <h5>Your result: {{ answer.level_selected }}</h5>
                        <h5>Comment: {{ answer.comment }}</h5>
                    </div> -->

                    <v-data-table
                        :headers="headers"
                        :items="answerFills(question.id)"
                        multi-sort
                        hide-details
                        hide-default-footer
                        outlined
                        class="elevation-1 mx-10 mt-3 mb-3"
                    ></v-data-table>

                    <v-spacer></v-spacer>

                    <v-btn outlined large class="ml-10">
                        AVG: {{ avgAnswer(answerFills(question.id)) }}/{{
                            question.max_select
                        }}
                    </v-btn>

                    <v-data-table
                        :headers="headers_freq"
                        :items="stat_Answer(answerFills(question.id))"
                        multi-sort
                        hide-details
                        hide-default-footer
                        outlined
                        class="elevation-1 mx-10 mt-3 mb-3"
                    ></v-data-table>

                    <div id="chart">
                        <apexchart
                            type="bar"
                            height="350"
                            :options="chartOptions"
                            :series="series"
                        ></apexchart>
                    </div>
                </v-card-text>
            </div>

            <v-divider></v-divider>
            <v-card-title>
                <v-spacer></v-spacer>
                <v-btn color="grey" outlined href="/report">
                    <v-icon class="mr-2"> mdi-arrow-left </v-icon>
                    Back
                </v-btn>
            </v-card-title>
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

        <!-- --------------------------------------------------------------------------------- -->
    </v-app>
</template>

<script>
export default {
    props: ["usernow", "picture_path"],
    async created() {
        await this.getPicture();
        await this.getSubmetric();
        await this.getAnswer();
    },
    data: () => ({
        dialog: false,
        pictureZoom: {},
        answers: [],
        row: null,
        picture: [],
        project: [],
        questions: [],
        submetric: [],
        choices: [],
        headers_freq: [
            {
                text: "Level Selected",
                align: "start",
                sortable: false,
                value: "level_selected"
            },
            {
                text: "count",
                align: "left",
                sortable: false,
                value: "count"
            }
        ],
        headers: [
            {
                text: "Level Selected",
                align: "start",
                sortable: false,
                value: "level_selected"
            },
            {
                text: "Comment",
                align: "left",
                sortable: false,
                value: "comment"
            },
            {
                text: "Date/Time",
                align: "left",
                sortable: false,
                value: "created_at"
            }
        ],
        series: [
            {
                data: [1,2,5]
            }
        ],
        chartOptions: {
            chart: {
                type: "bar",
                height: 350
            },
            plotOptions: {
                bar: {
                    horizontal: true
                }
            },
            dataLabels: {
                enabled: false
            },
            xaxis: {
                categories: [
                    "South Korea",
                    "Canada",
                    "United Kingdom",
                ]
            }
        }
    }),

    methods: {
        avgAnswer(data) {
            let sum = 0;
            data.forEach(el => {
                sum += el.level_selected;
            });
            return sum / data.length;
        },

        async getPicture() {
            await axios
                .get("/api/pictures/" + this.picture_path)
                .then(response => {
                    this.picture = response.data;
                });
            await this.getQuestion();
            await this.getAnswer();
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
        getSubmetric() {
            axios.get("/api/submetrics/").then(response => {
                this.submetric = response.data;
            });
        },
        getAnswer() {
            axios.get("/api/answers/").then(response => {
                this.answers = response.data;
                console.log(this.answers);
            });
        },

        zoom(val) {
            this.pictureZoom = val;
        },

        answerFills(id) {
            return this.answers.filter(answers => {
                return (
                    answers.picture_path == this.picture_path &&
                    answers.question_id == id
                );
            });
        },
        stat_Answer(arr) {
            var temp = [];
            var produce = [];
            for (var i = 0; i < arr.length; i++) {
                if (temp.indexOf(arr[i].level_selected) == -1) {
                    temp.push(arr[i].level_selected);
                    var _data = {};
                    _data.level_selected = arr[i].level_selected;
                    _data.count = 1;
                    produce.push(_data);
                } else {
                    for (var j = 0; j < produce.length; j++) {
                        if (
                            produce[j].level_selected === arr[i].level_selected
                        ) {
                            var _x = parseInt(produce[j].count) + 1;
                            produce[j].count = _x;
                        }
                    }
                }
            }
            produce.sort((a, b) => parseInt(b.count) - parseInt(a.count));
            console.log(produce);
            
            return produce;
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
