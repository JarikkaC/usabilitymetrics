<template>
    <v-app>
        <v-card class="m-4">
            <h2 class="p-3">Report</h2>

            <v-divider></v-divider>

            <v-container>
                <center>
                    <!-- <img :src="'/storage/' + pictureFil.picture_path" height="250px" /> -->
                    <img
                        src="https://cdn.pixabay.com/photo/2020/03/08/08/31/yellow-4911816_960_720.jpg"
                        width="30%"
                        @click="(dialog = true), zoom(picture)"
                    />
                </center>
            </v-container>

            <v-divider></v-divider>

            <v-container width="900px">
                <v-card-text>
                    <v-row class="mb-4" align="center">
                        <strong class="title">Title</strong>
                    </v-row>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                        sed do eiusmod tempor incididunt ut labore et dolore
                        magna aliqua. Ut enim ad minim veniam, quis nostrud
                        exercitation ullamco laboris nisi ut aliquip ex ea
                        commodo consequat. Duis aute irure dolor in
                        reprehenderit in voluptate velit esse cillum dolore eu
                        fugiat nulla pariatur. Excepteur sint occaecat cupidatat
                        non proident, sunt in culpa qui officia deserunt mollit
                        anim id est laborum.
                    </p>

                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                        sed do eiusmod tempor incididunt ut labore et dolore
                        magna aliqua. Ut enim ad minim veniam, quis nostrud
                        exercitation ullamco laboris nisi ut aliquip ex ea
                        commodo consequat. Duis aute irure dolor in
                        reprehenderit in voluptate velit esse cillum dolore eu
                        fugiat nulla pariatur. Excepteur sint occaecat cupidatat
                        non proident, sunt in culpa qui officia deserunt mollit
                        anim id est laborum.
                    </p>
                </v-card-text>
            </v-container>
        </v-card>
    </v-app>
</template>

<script>
export default {
    props: ["id"],

    mounted() {},

    data: () => ({}),

    methods: {}
};
</script>
