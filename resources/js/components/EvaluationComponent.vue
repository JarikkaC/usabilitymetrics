<template>
    <v-app>
        <v-card class="m-4">
            <div>
                <v-row class="mr-3 ml-3">
                    <v-toolbar-title class="m-4">Evaluation </v-toolbar-title>
                    <v-spacer></v-spacer>
                    <v-btn
                        color="#F4D03F"
                        dark
                        class="m-4"
                        @click="upload = true"
                    >
                        Prepare Evaluation
                    </v-btn>
                </v-row>
                <v-divider></v-divider>

                <div class="text-center d-flex pb-4 m-4">
                    <v-spacer></v-spacer>
                    <v-btn outlined color="gray" @click="all">all</v-btn>
                    <!-- <div>{{ panel }}</div> -->
                    <v-btn class="ml-4" outlined color="gray" @click="none"
                        >none</v-btn
                    >
                </div>

                <v-expansion-panels v-model="panel" multiple>
                    <v-expansion-panel v-for="(item, i) in items" :key="i">
                        <v-expansion-panel-header
                            >Project {{ item }}</v-expansion-panel-header
                        >
                        <v-expansion-panel-content>
                            <v-img
                                src="https://cdn.pixabay.com/photo/2020/03/08/11/21/british-4912211_1280.jpg"
                                max-width="300px"
                            ></v-img>

                            <div class="m-3">
                                <v-btn>Evaluation</v-btn>
                                <v-btn>See Report</v-btn>
                            </div>
                        </v-expansion-panel-content>
                    </v-expansion-panel>
                </v-expansion-panels>
            </div>

            <v-dialog v-model="upload" width="600px" >
                <v-card>
                    <v-card-text>
                        <v-row>
                            <h3 class="mt-3 mx-3">Upload Your Graphic Media</h3>
                        </v-row>
                        <v-row>
                            <v-container id="dropdown-example-3">
                                <v-overflow-btn
                                    class="my-2"
                                    :items="dropdown_edit"
                                    label="Select Your Project"
                                    counter
                                    item-value="text"
                                >
                                </v-overflow-btn>
                            </v-container>
                        </v-row>

                        <v-row class="mx-3 mb-3 mt-3">
                            <input
                                id="uploadImage"
                                type="file"
                                @change="onImageChange"
                            />
                        </v-row>
                        <center>
                            <img
                                :src="image"
                                v-if="image"
                                class="img-responsive"
                                height="120"
                            />
                        </center>
                        <v-row class="mx-5 mb-3 mt-3">
                            <v-btn
                                class="mr-4"
                                color="#6495D9"
                                @click="addPicture"
                                >Upload</v-btn
                            >
                            <v-btn @click="upload = false">Cancel</v-btn>
                        </v-row>
                    </v-card-text>
                </v-card>
            </v-dialog>
        </v-card>
    </v-app>
</template>

<script>
export default {
    data() {
        return {
            dialog: false,
            upload: false,
            panel: [],
            items: 5,
            dropdown_edit: [
                { text: "5" },
                { text: "4" },
                { text: "3" },
                { text: "2" },
                { text: "1" }
            ]
        };
    },
    methods: {
        // Create an array the length of our items
        // with all values as true
        all() {
            this.panel = [...Array(this.items).keys()].map((k, i) => i);
        },
        // Reset the panel
        none() {
            this.panel = [];
        }
    }
};
</script>
