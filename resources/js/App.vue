<template>
    <app-header />
    <router-view />
    <app-footer />
</template>

<script setup lang='ts'>
import AppFooter from '@/components/layouts/AppFooter.vue';
import AppHeader from '@/components/layouts/AppHeader.vue';
</script>
