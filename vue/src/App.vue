<template>
    <app-header />
    <router-view />
    <app-footer />
</template>

<script setup lang='ts'>
import AppHeader from '@/components/layouts/AppHeader.vue';
import AppFooter from '@/components/layouts/AppFooter.vue';
</script>
