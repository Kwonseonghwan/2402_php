<template>
    
    <slot></slot>
    <div v-for="item in modal.products" :key="item.productName">
    <h4 @click="$emit('myOpenModal', item)">{{ item.productName }}</h4>
    <p>{{ item.price }} 원</p>
  </div>
  <ProvideTest />
</template>

<script setup>
import {defineProps} from 'vue';
import ProvideTest from './ProvideTest.vue';

const modal = defineProps({
    'products': Array
});
</script>