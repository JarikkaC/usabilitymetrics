<template>
    <v-app>
        <v-card class="m-4">
            <v-card-title>
                Create Your Model
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
                                v-model="editedItem.submetric_name"
                                label="Metric Name"
                                persistent-hint
                                filled
                            >
                            </v-text-field>
                        </v-col>
                    </v-row>

                    <div>
                        <v-card>
                            <v-card-title class="ml-3"
                                >เพิ่มรายละเอียดของ Sub-metric</v-card-title
                            >
                            <v-row class="text-center ml-5 mr-5 mt-3">
                                <v-col>
                                    <v-text-field
                                        v-model="editedItem.submetric_name"
                                        label="Sub-Metric Name"
                                        persistent-hint
                                        outlined
                                    ></v-text-field>
                                </v-col>
                            </v-row>
                            <!-- -------------------------------------------------------------- -->
                            <v-row class="text-center ml-5 mr-5">
                                <v-col>
                                    <v-textarea
                                        v-model="editedItem.submetric_name"
                                        label="Purpose of the metrics"
                                        persistent-hint
                                        outlined
                                    ></v-textarea>
                                </v-col>
                                <v-col>
                                    <v-textarea
                                        v-model="editedItem.submetric_name"
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
                                        v-model="editedItem.submetric_name"
                                        label="Measurement, formula and data element computation"
                                        persistent-hint
                                        outlined
                                    ></v-textarea>
                                </v-col>
                                <v-col>
                                    <v-textarea
                                        v-model="editedItem.submetric_name"
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
                                        v-model="editedItem.submetric_name"
                                        label="Measure type"
                                        persistent-hint
                                        outlined
                                    ></v-text-field>
                                </v-col>
                                <v-col>
                                    <v-text-field
                                        v-model="editedItem.submetric_name"
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
                                        v-model="editedItem.submetric_name"
                                        label="ISO/IEC 12207 SLCP Reference"
                                        persistent-hint
                                        outlined
                                    ></v-text-field>
                                </v-col>
                                <v-col>
                                    <v-text-field
                                        v-model="editedItem.submetric_name"
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
                            <v-row class="text-center ml-5 mr-5 mt-3">
                                <v-col cols="8">
                                    <v-textarea
                                        v-model="editedItem.submetric_name"
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
                                        <v-icon> mdi-plus </v-icon>
                                    </v-btn>
                                    <v-btn small outlined color="red">
                                        <v-icon> mdi-delete </v-icon>
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
                                    >
                                        <v-icon> mdi-plus </v-icon>
                                        Add Sub-Metric
                                    </v-btn>
                                    <v-btn
                                        color="red"
                                        dark
                                        outlined
                                        class="mb-2"
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
            <v-row justify="center" class="m-3">
                <v-btn class="m-2" outlined color="teal">
                    Save
                </v-btn>
                <v-btn class="m-2" outlined color="grey" href="/example/">
                    Back
                </v-btn>
            </v-row>
        </v-card>
    </v-app>
</template>

<script>
export default {
    data: () => ({
        dialog: false,
        items: ["Foo", "Bar", "Fizz", "Buzz"],
        metrics: [],
        editedIndex: -1,
        editedItem: {
            id: "",
            metric_name: ""
        },
        defaultItem: {
            id: "",
            metric_name: 0
        }
    }),

   
    methods: {
        editItem(item) {
            this.editedIndex = this.metrics.indexOf(item);
            this.editedItem = Object.assign({}, item);
            this.dialog = true;
        },

        deleteItem(item) {
            const index = this.metrics.indexOf(item);
            confirm("Are you sure you want to delete this Model?") &&
                this.metrics.splice(index, 1);
        },

        close() {
            this.dialog = false;
            setTimeout(() => {
                this.editedItem = Object.assign({}, this.defaultItem);
                this.editedIndex = -1;
            }, 300);
        },

        save() {
            if (this.editedIndex > -1) {
                Object.assign(this.metrics[this.editedIndex], this.editedItem);
            } else {
                this.metrics.push(this.editedItem);
            }
            this.close();
        }
    }
};
</script>
