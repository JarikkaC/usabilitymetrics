<template>
    <v-app>
        <v-parallax
            dark
            src="https://cdn.pixabay.com/photo/2014/05/02/21/49/home-office-336373_1280.jpg"
            style="height: 700px"
        >
            <v-row>
                <v-col class="text-center">
                    <h1 style="font-size: 100px">
                        <br /><br />
                        Welcome
                    </h1>
                    <h4 class="subheading">
                        Create your project and upload graphic media before
                        start the evaluation. <br>
                    </h4>
                    <v-btn
                        class="m-5"
                        large
                        dark
                        color="#fed136"
                        href="/project"
                    >
                        <h4 class="m-3">Create Project</h4>
                    </v-btn>
                </v-col>
            </v-row>
        </v-parallax>
    </v-app>
</template>
