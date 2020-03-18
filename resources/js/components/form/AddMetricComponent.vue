<template>
    <v-app>
        <v-card class="m-4">
            <v-card-title>
                Create Your Metrics
            </v-card-title>
            <v-divider></v-divider>
            <v-card-text>
                <p class="ml-5 mr-5">
                    At vero eos et accusamus et iusto odio dignissimos ducimus
                    qui blanditiis praesentium voluptatum deleniti atque
                    corrupti quos dolores et quas molestias excepturi sint
                    occaecati cupiditate non provident, similique sunt in culpa
                    qui officia deserunt mollitia animi, id est laborum et
                    dolorum fuga.
                </p>
                <v-container>
                    <v-row class="text-center">
                        <v-col>
                            <v-text-field
                                v-model="metric_name"
                                label="Metric Name"
                                persistent-hint
                                filled
                                required
                            >
                            </v-text-field>
                        </v-col>
                    </v-row>

                    <div>
                        <v-card class="mt-5" v-for="s in submetrics" :key="s">
                            <v-card-title class="ml-3"
                                >เพิ่มรายละเอียดของ Sub-metric</v-card-title
                            >
                            <v-row class="text-center ml-5 mr-5 mt-3">
                                <v-col>
                                    <v-text-field
                                        v-model="s.submetric_name"
                                        label="Sub-Metric Name"
                                        persistent-hint
                                        outlined
                                        required
                                    ></v-text-field>
                                </v-col>
                            </v-row>
                            <!-- -------------------------------------------------------------- -->
                            <v-row class="text-center ml-5 mr-5">
                                <v-col>
                                    <v-textarea
                                        v-model="s.purpose"
                                        label="Purpose of the metrics"
                                        persistent-hint
                                        outlined
                                    ></v-textarea>
                                </v-col>
                                <v-col>
                                    <v-textarea
                                        v-model="s.method"
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
                                        v-model="s.measurement"
                                        label="Measurement, formula and data element computation"
                                        persistent-hint
                                        outlined
                                    ></v-textarea>
                                </v-col>
                                <v-col>
                                    <v-textarea
                                        v-model="s.input"
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
                                        v-model="s.type"
                                        label="Measure type"
                                        persistent-hint
                                        outlined
                                    ></v-text-field>
                                </v-col>
                                <v-col>
                                    <v-text-field
                                        v-model="s.scale"
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
                                        v-model="s.iso"
                                        label="ISO/IEC 12207 SLCP Reference"
                                        persistent-hint
                                        outlined
                                    ></v-text-field>
                                </v-col>
                                <v-col>
                                    <v-text-field
                                        v-model="s.target"
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
                                v-for="q in questions"
                                :key="q"
                            >
                                <v-col cols="8">
                                    <v-textarea
                                        v-model="q.question"
                                        label="Question"
                                        persistent-hint
                                        outlined
                                    ></v-textarea>
                                </v-col>
                                <v-col cols="4">
                                    <v-select
                                        :items="items"
                                        label="Outlined style"
                                        outlined
                                    ></v-select>
                                    <v-btn small outlined color="indigo">
                                        <v-icon @click="addQuestion">
                                            mdi-plus
                                        </v-icon>
                                    </v-btn>
                                    <v-btn small outlined color="red">
                                        <v-icon @click="deleteQuestion(item)">
                                            mdi-delete
                                        </v-icon>
                                    </v-btn>
                                </v-col>
                            </v-row>
                            <!-- -------------------------------------------------------------- -->

                            <v-row class="text-center">
                                <v-col cols="12">
                                    <v-btn
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
                                    >
                                        <v-icon> mdi-delete</v-icon>
                                        Detete Sub-Metric
                                    </v-btn>
                                </v-col>
                            </v-row>
                        </v-card>
                    </div>
                </v-container>
            </v-card-text>
            <!-- -------------------------------------------------------------- -->
            <v-row class="m-3">
                <v-spacer></v-spacer>
                <v-btn class="m-2" large dark color="teal" @click="submit">
                    <v-icon large class="mr-3">mdi-application-import</v-icon>
                    Submit
                </v-btn>
                <v-btn class="m-2" large outlined color="grey" href="/example/">
                    Back
                </v-btn>
            </v-row>
        </v-card>
    </v-app>
</template>

<script>
export default {
    data: () => ({
        metric_name: "",
        metricnameRules: [v => !!v || "Metric name is required"],
        submetric_name: "",
        submetricnameRules: [v => !!v || "Sub-metric name is required"],
        purpose: "",
        purposeRules: [v => !!v || "Purpose is required"],
        method: "",
        measurement: "",
        scale: "",
        type: "",
        input: "",
        iso: "",
        target: "",
        question: "",
        select: null,
        items: [1, 2, 3, 4, 5],

        questions: [{ question: null }],
        submetrics: [
            {
                metric_name: null,
                submatric_name: null,
                purpose: null,
                method: null,
                measurement: null,
                scale: null,
                type: null,
                iso: null,
                target: null,
                question: null,
                select: null
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
                metric_name: this.metric_name,
                submetric_name: this.submetric_name,
                purpose: this.purpose,
                method: this.method,
                measurement: this.measurement,
                scale: this.scale,
                type: this.type,
                input: this.input,
                iso: this.iso,
                target: this.target,
                question: this.question
            });
        },

        addSubmetric() {
            this.submetrics.push({
                metric_name: null,
                submatric_name: null,
                purpose: null,
                method: null,
                measurement: null,
                scale: null,
                type: null,
                iso: null,
                target: null,
                question: null,
                select: null
            });
        },

        addQuestion() {
            this.questions.push({
                question: null
            });
        },

        deleteQuestion(item) {
            console.log(item);
            const index = this.questions.indexOf(item);
            confirm("Are you sure you want to delete this question?") &&
                this.questions.splice(index, 1);
        },

        deleteSubmetric(item){
            const index = this.submetrics.indexOf(item);
            confirm("Are you sure you want to delete this submetric?") &&
                this.submetrics.splice(index, 1);

        },

        clear() {
            this.$v.$reset();
            this.metric_name = "";
            this.submetric_name = "";
            this.purpose = "";
            this.method = "";
            this.measurement = "";
            this.input = "";
            this.iso = "";
            this.type = "";
            this.scale = "";
            this.target = "";
            this.question = "";
            this.select = null;
            this.checkbox = false;
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
