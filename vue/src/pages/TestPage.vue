<template>
    <div>
        <h1>{{ title }}</h1>
        <router-link :to="{ name: ROUTE_NAME.MAIN_HOME }">Link</router-link>
    </div>
</template>

<script setup lang='ts'>
import { ref } from 'vue';
import { ROUTE_NAME } from '@/router'
const title = ref('TestPage');
</script>
