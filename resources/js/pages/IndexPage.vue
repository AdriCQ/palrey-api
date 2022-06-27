<template>
    <div>
        <h1>{{ title }}</h1>
        <router-link :to="{ name: ROUTE_NAME.MAIN_TEST }">Link</router-link>
    </div>
</template>

<script setup lang='ts'>
import { ref } from 'vue';
import { ROUTE_NAME } from '@/router'
const title = ref('IndexPage');
</script>
