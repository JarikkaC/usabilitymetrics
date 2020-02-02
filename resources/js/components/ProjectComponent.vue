<template>
    <v-app>
        <v-container class="mt-2 mx-2">
            <v-row>
                <v-col cols="auto">
                    <h3 class="mt-3">Project Name:</h3>
                </v-col>

                <V-col cols="auto">
                    <v-text-field outlined color="indigo"></v-text-field>
                </V-col>
            </v-row>

            <v-card class="d-inline-block mx-4" @click="upload = true">
                <v-row justify="space-between">
                    <v-container>
                        <v-col cols="auto">
                            <v-img
                                class="pl-1"
                                height="100"
                                width="100"
                                src="/images/element/add.png"
                            ></v-img>
                        </v-col>
                    </v-container>
                </v-row>
            </v-card>

            <v-dialog v-model="upload" width="600px" height="400px">
                <v-card>
                    <v-card-text>
                        <v-row>
                            <h3 class="mt-3 mx-3">Upload Your Graphic Media</h3>
                        </v-row>

                        <v-row class="mx-3 mb-3 mt-3">
                            <v-file-input
                                label="File input"
                                filled
                                prepend-icon="mdi-camera"
                            ></v-file-input>
                        </v-row>

                        <v-row class="mx-5 mb-3 mt-3">
                            <v-btn class="mr-4" color="#6495D9">Upload</v-btn>
                            <v-btn @click="upload = false">Cancel</v-btn>
                        </v-row>
                    </v-card-text>
                </v-card>
            </v-dialog>
        </v-container>
    </v-app>
</template>

<script>
export default {
    data() {
        return {
            upload: false
        };
    }
};
</script>
