<template>
    <v-app>
        <v-card class="m-5">
          <h2 class="mt-5 ml-5 text-uppercase">Your Project</h2>
          <v-divider></v-divider>
            <v-dialog v-model="create" width="500">
                <template v-slot:activator="{ on }">
                    <v-btn class="m-3" color="#E1DCD6" v-on="on">
                        Create Project
                    </v-btn>
                </template>

                <v-card>
                    <v-card-title class="headline grey lighten-2" primary-title>
                        Create Your Project
                    </v-card-title>

                    <v-card-text>
                        <v-form class="px-3">
                            <v-text-field
                                label="Your project name"
                            ></v-text-field>
                        </v-form>
                    </v-card-text>

                    <v-card-actions>
                        <v-spacer></v-spacer>
                        <v-btn color="primary" text @click="create = false">
                            Create
                        </v-btn>

                        <v-btn color="#E81A1A" text @click="create = false">
                            Cancels
                        </v-btn>
                    </v-card-actions>
                </v-card>
            </v-dialog>
        </v-card>
    </v-app>
</template>

<script>
export default {
    data() {
        return {
            create: false
        };
    }
};
</script>
