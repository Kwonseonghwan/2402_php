<template>
    <form class="form-box" id="insertDataForm">
      <h3 class="form-title">글 작성</h3>
      <img :src="preview">
      <textarea name="content" placeholder="내용을 적어주세요." max="200"></textarea>
      <input @change="setFile" type="file" name="img" accept="image/*">
      <button @click="$store.dispatch('insertData')" type="button" class="btn btn-submit btn-bg-black">작성</button>
      <button @click="$router.back()" type="button" class="btn btn-submit">취소</button>
    </form>
  </template>
  <script setup>
  import { ref } from 'vue';


const preview = ref('');

function setFile(e) {
    const boardInfoimg = e.target.files[0];
    preview.value = URL.createObjectURL(boardInfoimg);
}
  </script>
  <style>
  </style>
