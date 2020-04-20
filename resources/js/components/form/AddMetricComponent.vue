<template>
    <v-app>
        <v-card class="m-4">
            <v-card-title>
                Create Your Metrics

                <v-spacer></v-spacer>
                <v-btn color="#F4D03F" outlined href="/metric">
                    <v-icon class="mr-2"> mdi-arrow-left </v-icon>
                    Back
                </v-btn>
            </v-card-title>
            <v-divider></v-divider>
            <v-card-text>
                <p class="ml-5 mr-5">
                    สร้างตัวชี้วัดที่ต้องการใช้ในการประเมิน
                    โดยผู้ใช้ต้องกรอกข้อมูลให้ครบถ้วน เพื่อประโยชน์ในการใช้ประเมิน
                </p>
                <v-container>
                    <v-form v-model="valid">
                    <v-row class="text-center">
                        <v-col>
                            <v-text-field
                                v-model="metric_name"
                                label="Metric Name"
                                persistent-hint
                                filled
                                :rules="[v => !!v || 'Metric Name is require!']"
                                required
                            >
                            </v-text-field>
                        </v-col>
                    </v-row>

                    <div>
                        <v-card
                            class="mt-5"
                            v-for="(s, indexSubmetrics) in submetrics"
                            :key="indexSubmetrics"
                        >
                            <v-card-title class="ml-3"
                                >เพิ่มรายละเอียดของ Sub-metric</v-card-title
                            >
                            <v-row class="text-center ml-5 mr-5 mt-3">
                                <v-col>
                                    <v-text-field
                                        v-model="
                                            submetrics[indexSubmetrics]
                                                .submetric_name
                                        "
                                        label="Sub-Metric Name"
                                        persistent-hint
                                        outlined
                                        :rules="[
                                            v =>
                                                !!v ||
                                                'Sub-metric Name is require!'
                                        ]"
                                        required
                                    ></v-text-field>
                                </v-col>
                            </v-row>
                            <!-- -------------------------------------------------------------- -->
                            <v-row class="text-center ml-5 mr-5">
                                <v-col>
                                    <v-textarea
                                        v-model="
                                            submetrics[indexSubmetrics].purpose
                                        "
                                        label="Purpose of the metrics"
                                        persistent-hint
                                        outlined
                                    ></v-textarea>
                                </v-col>
                                <v-col>
                                    <v-textarea
                                        v-model="
                                            submetrics[indexSubmetrics].method
                                        "
                                        label="Method of application"
                                        persistent-hint
                                        outlined
                                    ></v-textarea>
                                </v-col>
                            </v-row>
                            <!-- -------------------------------------------------------------- -->
                            <v-row class="text-center ml-5 mr-5">
                                <v-col>
                                    <v-textarea
                                        v-model="
                                            submetrics[indexSubmetrics]
                                                .measurement
                                        "
                                        label="Measurement, formula and data element computation"
                                        persistent-hint
                                        outlined
                                    ></v-textarea>
                                </v-col>
                                <v-col>
                                    <v-textarea
                                        v-model="
                                            submetrics[indexSubmetrics].input
                                        "
                                        label="Input to measurement"
                                        persistent-hint
                                        outlined
                                    ></v-textarea>
                                </v-col>
                            </v-row>
                            <!-- -------------------------------------------------------------- -->
                            <v-row class="text-center ml-5 mr-5">
                                <v-col>
                                    <v-text-field
                                        v-model="
                                            submetrics[indexSubmetrics].type
                                        "
                                        label="Measure type"
                                        persistent-hint
                                        outlined
                                    ></v-text-field>
                                </v-col>
                                <v-col>
                                    <v-text-field
                                        v-model="
                                            submetrics[indexSubmetrics].scale
                                        "
                                        label="Metric scale type"
                                        persistent-hint
                                        outlined
                                    ></v-text-field>
                                </v-col>
                            </v-row>
                            <!-- -------------------------------------------------------------- -->
                            <v-row class="text-center ml-5 mr-5">
                                <v-col>
                                    <v-text-field
                                        v-model="
                                            submetrics[indexSubmetrics].iso
                                        "
                                        label="ISO/IEC 12207 SLCP Reference"
                                        persistent-hint
                                        outlined
                                    ></v-text-field>
                                </v-col>
                                <v-col>
                                    <v-text-field
                                        v-model="
                                            submetrics[indexSubmetrics].target
                                        "
                                        label="Target audience"
                                        persistent-hint
                                        outlined
                                    ></v-text-field>
                                </v-col>
                            </v-row>
                            <!-- -------------------------------------------------------------- -->
                            <v-divider></v-divider>
                            <p class="mr-5 mt-3 ml-5" style="color: #5f7daf;">
                                หมายเหตุ: ในการสร้างคำถาม
                                ต้องเป็นคำถามที่ไม่ใช่คำถามปลายเปิด
                                เนื่องจากข้อจำกัดในการใช้งานเว็บแอพลิเคชั่น
                                และในแต่ละ metric สามารถกำหนดคำถามได้หลายคำถาม
                                โดยวิธีการเพิ่มคำถาม ทำได้โดยกดที่ปุ่ม +
                                ด้านหลังข้อความ และสามารถลบคำถามที่เพิ่มไปได้
                                โดยการกดที่ปุ่มรูปถังขยะ
                            </p>
                            <v-row
                                class="text-center ml-5 mr-5 mt-3"
                                v-for="(q, indexQuestions) in submetrics[
                                    indexSubmetrics
                                ].questions"
                                :key="indexQuestions"
                            >
                                <v-col cols="8">
                                    <v-text-field
                                        v-model="
                                            submetrics[indexSubmetrics]
                                                .questions[indexQuestions]
                                                .question
                                        "
                                        label="Question"
                                        persistent-hint
                                        outlined
                                        :rules="[
                                            v => !!v || 'Question is require!'
                                        ]"
                                        required
                                    ></v-text-field>
                                </v-col>
                                <v-col cols="2">
                                    <v-select
                                        v-model="
                                            submetrics[indexSubmetrics]
                                                .questions[indexQuestions]
                                                .max_select
                                        "
                                        :items="items"
                                        label="Level"
                                        outlined
                                        :rules="[
                                            v => !!v || 'Level is require!'
                                        ]"
                                        required
                                    ></v-select>
                                </v-col>
                                <v-col cols="2">
                                    <v-btn
                                        v-if="
                                            indexQuestions ===
                                                submetrics[indexSubmetrics]
                                                    .questions.length -
                                                    1
                                        "
                                        small
                                        outlined
                                        color="indigo"
                                    >
                                        <v-icon
                                            @click="
                                                addQuestion(indexSubmetrics)
                                            "
                                        >
                                            mdi-plus
                                        </v-icon>
                                    </v-btn>
                                    <v-btn small outlined color="red">
                                        <v-icon
                                            @click="
                                                deleteQuestion(
                                                    item,
                                                    indexSubmetrics
                                                )
                                            "
                                        >
                                            mdi-delete
                                        </v-icon>
                                    </v-btn>
                                </v-col>
                            </v-row>
                            <!-- -------------------------------------------------------------- -->

                            <v-row class="text-center">
                                <v-col cols="12">
                                    <v-btn
                                        v-if="
                                            indexSubmetrics ===
                                                submetrics.length - 1
                                        "
                                        color="teal"
                                        dark
                                        outlined
                                        class="mb-2"
                                        @click="addSubmetric"
                                    >
                                        <v-icon> mdi-plus</v-icon>
                                        Add Sub-Metric
                                    </v-btn>
                                    <v-btn
                                        color="red"
                                        dark
                                        outlined
                                        class="mb-2"
                                        @click="deleteSubmetric"
                                        v-if="submetrics.length > 1"
                                    >
                                        <v-icon> mdi-delete</v-icon>
                                        Detete Sub-Metric
                                    </v-btn>
                                </v-col>
                            </v-row>
                        </v-card>
                    </div>
                    </v-form>
                </v-container>
            </v-card-text>
            <!-- -------------------------------------------------------------- -->
            <v-row class="m-3">
                <v-spacer></v-spacer>
                <v-btn
                    class="m-2"
                    large
                    light
                    color="teal"
                    @click="submit"
                    href="/metric/"
                    :disabled="!valid"
                >
                    <v-icon large class="mr-3">mdi-application-import</v-icon>
                    Submit
                </v-btn>
                <v-btn class="m-2" large outlined color="grey" href="/metric/">
                    Back
                </v-btn>
            </v-row>
            <!-- --------------------------------------------------------------- -->
            <v-dialog v-model="dialog" max-width="400">
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
                            </v-btn>

                            <h2><b>คุณได้ทำการเพิ่ม Metrics!!</b></h2>
                            <h5>
                                เพื่อดูรายละเอียดของ metrics ที่เพิ่ม
                                กรุณากลับที่หน้า metrics
                            </h5>

                            <br />
                        </center>

                        <v-card-actions>
                            <v-spacer></v-spacer>

                            <v-btn
                                color="green darken-1"
                                text
                                @click="dialog = false"
                                href="/metric/"
                            >
                                Back
                            </v-btn>
                        </v-card-actions>
                    </v-container>
                </v-card>
            </v-dialog>
        </v-card>
    </v-app>
</template>

<script>
export default {
    data: () => ({
        valid: false,
        dialog: false,
        metric_name: "",
        metricnameRules: [v => !!v || "Metric name is required"],
        submetricnameRules: [v => !!v || "Sub-metric name is required"],
        purposeRules: [v => !!v || "Purpose is required"],
        items: [1, 2, 3, 4, 5],
        submetrics: [
            {
                submetric_name: null,
                purpose: null,
                method: null,
                measurement: null,
                scale: null,
                type: null,
                input: null,
                iso: null,
                target: null,
                questions: [
                    {
                        question: null,
                        max_select: null
                    }
                ]
            }
        ]

        // editedIndex: -1,
        // editedItem: {
        //     id: "",
        //     metric_name: ""
        // },
        // defaultItem: {
        //     id: "",
        //     metric_name: 0
        // }
    }),

    methods: {
        submit() {
            axios.post("/api/metrics", {
                metric_name: this.metric_name
            });
            for (let index = 0; index < this.submetrics.length; index++) {
                const element = this.submetrics[index];
                axios.post("/api/submetrics", {
                    submetric_name: element.submetric_name,
                    purpose: element.purpose,
                    method: element.method,
                    measurement: element.measurement,
                    scale: element.scale,
                    type: element.type,
                    input: element.input,
                    iso: element.iso,
                    target: element.target
                });
                for (
                    let i = 0;
                    i < this.submetrics[index].questions.length;
                    i++
                ) {
                    const e = this.submetrics[index].questions[i];
                    axios.post("/api/questions", {
                        question: e.question,
                        max_select: e.max_select
                    });
                }
            }
            this.dialog = true;
        },

        addSubmetric() {
            this.submetrics.push({
                submetric_name: null,
                purpose: null,
                method: null,
                measurement: null,
                scale: null,
                type: null,
                input: null,
                iso: null,
                target: null,
                questions: [
                    {
                        question: null,
                        max_select: null
                    }
                ]
            });
        },

        addQuestion(indexSubmetrics) {
            console.log(indexSubmetrics);
            this.submetrics[indexSubmetrics].questions.push({
                question: null
            });
        },

        deleteQuestion(item, indexSubmetrics) {
            console.log(item);
            const index = this.submetrics[indexSubmetrics].questions.indexOf(
                item
            );
            confirm("Are you sure you want to delete this question?") &&
                this.submetrics[indexSubmetrics].questions.splice(index, 1);
        },

        deleteSubmetric(item) {
            const index = this.submetrics.indexOf(item);
            confirm("Are you sure you want to delete this submetric?") &&
                this.submetrics.splice(index, 1);
        },

        validate() {
            this.$refs.form.validate();
        },
        reset() {
            this.$refs.form.reset();
        },
        resetValidation() {
            this.$refs.form.resetValidation();
        }
        // editItem(item) {
        //     this.editedIndex = this.metrics.indexOf(item);
        //     this.editedItem = Object.assign({}, item);
        // },

        // deleteItem(item) {
        //     const index = this.metrics.indexOf(item);
        //     confirm("Are you sure you want to delete this Model?") &&
        //         this.metrics.splice(index, 1);
        // },

        // close() {
        //     setTimeout(() => {
        //         this.editedItem = Object.assign({}, this.defaultItem);
        //         this.editedIndex = -1;
        //     }, 300);
        // },

        // save() {
        //     if (this.editedIndex > -1) {
        //         Object.assign(this.metrics[this.editedIndex], this.editedItem);
        //     } else {
        //         this.metrics.push(this.editedItem);
        //     }
        //     this.close();
        // }
    }
};
</script>
