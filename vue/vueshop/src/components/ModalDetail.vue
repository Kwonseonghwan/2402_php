<template>
  <transition name="container">
    <div class="bg_black" v-if="data.flgModal">
      <div class="bg_white">
        <img :src="data.product.img">
        <h4>{{data.product.productName }}</h4>
        <p>{{data.product.productContent }}</p>
        <p>{{data.product.price }}원</p>
        <p>총액 : {{ data.product.price * cnt }}</p>
        <input type="number" min="1" v-model="cnt">
        <br>
        <br>
        <button @click="close">닫기</button>
      </div>
    </div>
  </transition>
  </template>

<script setup>
import {defineEmits, defineProps, ref} from 'vue';

const data = defineProps({
    'flgModal': Boolean
    ,'product': Object
});
const emit = defineEmits(['myCloseModal']);

// 총액처리 부분
const cnt = ref(1);

function close() {
  cnt.value = 1;
  emit('myCloseModal', data.product.productName);
}
</script>

<style>
.container-enter-from {
  opacity: 0;
}
.container-enter-active {
  transition: 0.3s ease;
}
.container-enter-to {
  opacity: 1;
}

.container-leave-from {
  transform: translateX(0px)
}
.container-leave-active {
  transition: all 1s;
}
.container-leave-to {
  transform: translateX(2000px)
}
</style>