<template>

<v-container class="mt-2 mx-2">

    <v-row>
        <v-col cols="auto">
            <h3 class="mt-3">Project Name:</h3> 
        </v-col>

        <V-col cols="auto">
            <v-text-field outlined color="indigo" :rules="rules"></v-text-field>
        </V-col>
    </v-row>

    <v-card class="d-inline-block mx-4">
        <v-row justify="space-between">
          <v-container>
            <v-col cols="auto">
                    <v-img class="pl-1" height="100" width="100" src="/images/element/add.png"></v-img>
            </v-col>
          </v-container>
        </v-row>
    </v-card>

  
</v-container>
</template>

