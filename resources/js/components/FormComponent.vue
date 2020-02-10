<template>
    <v-app>
        <v-card class="m-4">
            <h2 class="p-3">Evaluation Form</h2>
            <v-divider></v-divider>

            <h4 class="p-3">Question:</h4>
            <p class="ml-5">
                <!-- {{ questions.query }} -->
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
                <!-- {{ questions.query }} -->
                คุณเข้าใจหรือไม่ว่า interface นี่ทำงานอย่างไร
            </p>
            <v-radio-group class="ml-5" v-model="column" column>
                <v-radio label="เข้าใจ" value="1"></v-radio>
                <v-radio label="เข้าใจบางส่วน" value="2"></v-radio>
                <v-radio label="ไม่เข้าใจ" value="3"></v-radio>
            </v-radio-group>

            <h4 class="p-3">Question:</h4>
            <p class="ml-5">
                <!-- {{ questions.query }} -->
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
    </v-app>
</template>

<script>
export default {
    props: ["id"],
    mounted() {
        this.getQuestion();
    },
    data: () => ({
        questions: [],
        column: null,
        row: null
    }),

    methods: {
        getQuestion() {
            axios.get("/api/questions/").then(response => {
                this.question = response.data;
                console.log(this.questions);
            });
        }
        // getQuestion() {
        //     axios.get("/api/questions/").then(response => {
        //         let res = response.data;
        //         this.questions = this.tranFormData(res);
        //         console.log("res", this.res);
        //     });
        // },
        // tranFormData(data) {
        //     const result = data.map(element => ({
        //         id: element.id,
        //         query: element.query
        //     }));
        //     return result;
        // }
    }
};
</script>
