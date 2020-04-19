<template>
    <v-app>
        <v-card class="m-3">
            <v-card-title>
                <h3 class="mt-3 ml-5">
                    Metric Name: {{ this.metrics.metric_name }}
                </h3>

                <v-spacer></v-spacer>
                <v-btn color="grey" outlined href="/metric">
                    <v-icon class="mr-2"> mdi-arrow-left </v-icon>
                    Back
                </v-btn>
            </v-card-title>

            <!-- <v-data-table
                :headers="headers"
                :items="submetricFil"
                multi-sort
                class="elevation-1"
            ></v-data-table> -->

            <div>
                <v-row justify="space-between" class="m-3">
                    <v-card
                        class="d-inline-block m-3"
                        v-for="submetric in submetricFil"
                        :key="submetric.id"
                        width="100%"
                    >
                        <v-toolbar color="teal" dark flat>
                            <v-toolbar-title
                                class="subheading font-weight-bold"
                            >
                                {{ submetric.submetric_name }}
                            </v-toolbar-title>

                            <v-spacer></v-spacer>
                            <v-btn
                                small
                                fab
                                dark
                                color="indigo"
                                @click="(dialog = !dialog), editItem(submetric)"
                            >
                                <v-icon> mdi-pencil</v-icon>
                            </v-btn>
                        </v-toolbar>

                        <v-card-text>
                            <div
                                v-for="question in questionFil(submetric.id)"
                                :key="question.id"
                            >
                                <v-row>
                                    <v-col cols="3">
                                        <h5 style="font-size: 16px;">
                                            Question:
                                        </h5>
                                    </v-col>
                                    <v-col cols="9">
                                        {{ question.question }}
                                    </v-col>
                                </v-row>
                                <v-row>
                                    <v-col cols="3">
                                        <h5 style="font-size: 16px;">
                                            Level Select:
                                        </h5>
                                    </v-col>
                                    <v-col cols="9">
                                        {{ question.max_select }}
                                    </v-col>
                                </v-row>
                            </div>

                            <v-divider></v-divider>

                            <v-row>
                                <v-col cols="3">
                                    <h5 style="font-size: 16px;">
                                        วัตถุประสงค์ของตัวชี้วัด:
                                        <br />(Purpose of the metrics)
                                        <br />
                                    </h5>
                                </v-col>
                                <v-col cols="9">
                                    {{ submetric.purpose }}
                                </v-col>
                            </v-row>

                            <v-divider></v-divider>

                            <v-row>
                                <v-col cols="3">
                                    <h5 style="font-size: 16px;">
                                        วิธีในการใช้งาน:<br />
                                        (Method of application)
                                    </h5>
                                </v-col>
                                <v-col cols="9">
                                    {{ submetric.method }}
                                </v-col>
                            </v-row>

                            <v-divider></v-divider>

                            <v-row>
                                <v-col cols="3">
                                    <h5 style="font-size: 15px;">
                                        สูตรและข้อมูลในการคำนวณ:
                                        <br />
                                        (formula and data element computations)
                                    </h5>
                                </v-col>
                                <v-col cols="9">
                                    {{ submetric.measurement }}
                                </v-col>
                            </v-row>

                            <v-divider></v-divider>

                            <v-row>
                                <v-col cols="3">
                                    <h5 style="font-size: 16px;">
                                        ประเภทการวัด: <br />
                                        (Measure type)
                                    </h5>
                                </v-col>
                                <v-col cols="9">
                                    {{ submetric.type }}
                                </v-col>
                            </v-row>

                            <v-divider></v-divider>

                            <v-row>
                                <v-col cols="3">
                                    <h5 style="font-size: 16px;">
                                        สิ่งที่ใช้ในการวัด: <br />
                                        (Input to measurement)
                                    </h5>
                                </v-col>
                                <v-col cols="9">
                                    {{ submetric.input }}
                                </v-col>
                            </v-row>

                            <v-divider></v-divider>

                            <v-row>
                                <v-col cols="3">
                                    <h5 style="font-size: 16px;">
                                        มาตรฐานที่อ้างอิง: <br />
                                        (ISO/IEC 12207 SLCP Reference)
                                    </h5>
                                </v-col>
                                <v-col cols="9">
                                    {{ submetric.iso }}
                                </v-col>
                            </v-row>

                            <v-divider></v-divider>

                            <v-row>
                                <v-col cols="3">
                                    <h5 style="font-size: 16px;">
                                        กลุ่มเป้าหมาย: <br />
                                        (Target audience)
                                    </h5>
                                </v-col>
                                <v-col cols="9">
                                    {{ submetric.target }}
                                </v-col>
                            </v-row>
                        </v-card-text>

                        <!-- -------------------------------------------------------------------------- -->

                        <v-dialog
                            v-model="dialog"
                            max-width="700px"
                            max-height="700px"
                        >
                            <v-card>
                                <v-form v-model="valid">
                                    <v-card-title>
                                        <span class="headline"
                                            >Edit Sub-Metric</span
                                        >
                                    </v-card-title>

                                    <v-card-text>
                                        <v-container>
                                            <v-text-field
                                                v-model="
                                                    editedItem.submetric_name
                                                "
                                                label="Sub-Metric Name"
                                                persistent-hint
                                                :rules="[
                                                    required('Sub-Metric Name')
                                                ]"
                                            ></v-text-field>

                                            <div
                                                v-for="(question,
                                                index) in editedItem.questions"
                                                :key="question.id"
                                            >
                                                <v-text-field
                                                    v-model="
                                                        editedItem.questions[
                                                            index
                                                        ].question
                                                    "
                                                    label="Question"
                                                    persistent-hint
                                                    :rules="[
                                                        required('Question')
                                                    ]"
                                                ></v-text-field>

                                                <v-select
                                                    v-model="
                                                        editedItem.questions[
                                                            index
                                                        ].max_select
                                                    "
                                                    :items="items"
                                                    label="Level"
                                                    outlined
                                                    :rules="[
                                                        v =>
                                                            !!v ||
                                                            'Level is require!'
                                                    ]"
                                                    required
                                                ></v-select>
                                            </div>

                                            <v-text-field
                                                v-model="editedItem.purpose"
                                                label="Purpose of the metrics"
                                                persistent-hint
                                                :rules="[
                                                    required(
                                                        'Purpose of the metrics'
                                                    )
                                                ]"
                                            ></v-text-field>

                                            <v-text-field
                                                v-model="editedItem.method"
                                                label="Method of application"
                                                persistent-hint
                                                :rules="[
                                                    required(
                                                        'Method of application'
                                                    )
                                                ]"
                                            ></v-text-field>

                                            <v-textarea
                                                v-model="editedItem.measurement"
                                                label="Measurement, formula and data element computation"
                                                persistent-hint
                                                :rules="[
                                                    required(
                                                        'Measurement, formula and data element computation'
                                                    )
                                                ]"
                                            ></v-textarea>

                                            <v-text-field
                                                v-model="editedItem.type"
                                                label="Measure type"
                                                persistent-hint
                                                :rules="[
                                                    required('Measure type')
                                                ]"
                                            ></v-text-field>

                                            <v-text-field
                                                v-model="editedItem.input"
                                                label="Input to measurement"
                                                persistent-hint
                                                :rules="[
                                                    required(
                                                        'Input to measurement'
                                                    )
                                                ]"
                                            ></v-text-field>

                                            <v-text-field
                                                v-model="editedItem.iso"
                                                label="ISO/IEC 12207 SLCP Reference"
                                                persistent-hint
                                                :rules="[
                                                    required(
                                                        'ISO/IEC 12207 SLCP Reference'
                                                    )
                                                ]"
                                            ></v-text-field>

                                            <v-text-field
                                                v-model="editedItem.target"
                                                label="Target audience"
                                                persistent-hint
                                            ></v-text-field>
                                        </v-container>
                                    </v-card-text>

                                    <v-card-actions>
                                        <v-spacer></v-spacer>
                                        <v-btn
                                            color="blue darken-1"
                                            text
                                            @click="save"
                                            :disabled="!valid"
                                            >Save</v-btn
                                        >
                                        <v-btn
                                            color="#CD4D4D"
                                            text
                                            @click="close"
                                            >Cancel</v-btn
                                        >
                                    </v-card-actions>
                                </v-form>
                            </v-card>
                        </v-dialog>
                    </v-card>
                </v-row>
            </div>
        </v-card>
    </v-app>
</template>

<script>
export default {
    props: ["usernow", "id"],
    mounted() {
        this.getMetric();
        this.getSubmetric();
        this.getQuestion();
    },
    data() {
        return {
            dialog: false,
            itemsPerPage: 2,
            submetrics: [],
            metrics: [],
            question: [],
            headers: [
                {
                    text: "Metric name",
                    align: "left",
                    sortable: false,
                    value: "submetric_name"
                },
                {
                    text: "Purpose of the metrics",
                    align: "left",
                    sortable: false,
                    value: "purpose"
                },
                {
                    text: "Method of application",
                    align: "left",
                    sortable: false,
                    value: "method"
                },
                {
                    text: "Measurement, formula and data element computations",
                    align: "left",
                    sortable: false,
                    value: "measurement"
                },
                {
                    text: "Metric scale type",
                    align: "left",
                    sortable: false,
                    value: "scale"
                },
                {
                    text: "Measure type",
                    align: "left",
                    sortable: false,
                    value: "type"
                },
                {
                    text: "Input to measurement",
                    align: "left",
                    sortable: false,
                    value: "input"
                },
                {
                    text: "ISO/IEC 12207 SLCP Reference",
                    align: "left",
                    sortable: false,
                    value: "iso"
                },
                {
                    text: "Target audience",
                    align: "left",
                    sortable: false,
                    value: "target"
                }
            ],

            editedItem: {
                submetric_name: "",
                questions: [],
                purpose: "",
                method: "",
                measurement: "",
                scale: "",
                type: "",
                input: "",
                iso: "",
                target: "",
                max_select: ""
            },
            defaultItem: {
                submetric_name: "",
                questions: [],
                purpose: "",
                method: "",
                measurement: "",
                scale: "",
                type: "",
                input: "",
                iso: "",
                target: "",
                max_select: ""
            },
            editedID: null,
            items: [1, 2, 3, 4, 5],

            valid: false,
            required(propertyType) {
                return v =>
                    (v && v.length > 0) || propertyType + " is required";
            }
        };
    },

    methods: {
        getMetric() {
            axios.get("/api/metrics/" + this.id).then(response => {
                this.metrics = response.data;
                console.log(this.metrics);
            });
        },

        getSubmetric() {
            axios.get("/api/submetrics/").then(response => {
                this.submetrics = response.data;
                console.log("submetric", this.submetricFil);
            });
        },

        getQuestion() {
            axios.get("/api/questions/").then(response => {
                this.question = response.data;
                console.log("question", this.question);
            });
        },

        questionFil(id) {
            return this.question.filter(question => {
                return question.submetric_id == id;
            });
        },

        save() {
            Object.assign(this.submetrics[this.editedIndex], this.editedItem) &&
                axios.put("/api/submetrics/" + this.editedID, {
                    submetric_name: this.editedItem.submetric_name,
                    purpose: this.editedItem.purpose,
                    method: this.editedItem.method,
                    measurement: this.editedItem.measurement,
                    scale: this.editedItem.scale,
                    type: this.editedItem.type,
                    input: this.editedItem.input,
                    iso: this.editedItem.iso,
                    target: this.editedItem.target
                }) &&
                this.editedItem.questions.forEach(element => {
                    axios.put("/api/questions/" + element.id, {
                        question: element.question,
                        max_select: element.max_select
                    });
                });
            this.close();
        },

        close() {
            this.dialog = false;
            setTimeout(() => {
                this.editedItem = Object.assign({}, this.defaultItem);
                this.editedIndex = -1;
            }, 300);
        },

        async editItem(item) {
            this.editedIndex = await this.submetrics.indexOf(item);
            this.editedItem = await Object.assign({}, item);
            this.editedItem.questions = this.questionFil(item.id);
            this.dialog = await true;
            this.editedID = await item.id;
        }
    },

    computed: {
        submetricFil: function() {
            return this.submetrics.filter(submetrics => {
                return submetrics.metric_id == this.id;
            });
        }
    }
};
</script>
