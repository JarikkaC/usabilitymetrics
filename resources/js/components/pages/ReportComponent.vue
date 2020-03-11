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

            


        </v-card>
    </v-app>
</template>

<script>
export default {

    props: ["id"],
    
    mounted() {
    
    },

    data: () => ({
        
    }),

    methods: {
       
    },

    

    
};
</script>
