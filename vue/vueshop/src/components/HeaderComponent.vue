<template>
    <div class="nav">
        <a href="#" v-for="item in data.cate" :key="item.name">{{ item.name }}</a>
    <!-- <a href="#" v-for="item in cate" :key="item.cate">{{ item.name }}</a> -->
    </div>
</template>

<script setup>
import {defineProps} from 'vue';

const data = defineProps({
    'cate' : Array
});
</script>

<style>
</style>