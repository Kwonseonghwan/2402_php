<template>
  <div class="form-box">
    <h3 class="form-title">회원가입</h3>
    <input v-model="userInfo.account" type="text" name="account" placeholder="아이디">
    <input v-model="userInfo.password" type="password" name="password" placeholder="비밀번호" autoComplete="off">
    <input v-model="userInfo.password_chk" type="password" name="password_chk" placeholder="비밀번호 확인" autoComplete="off">
    <input v-model="userInfo.name" type="text" name="name" placeholder="이름" autoComplete="off">
    <div class="radio-box">
      <div>
        <label for="male">남자</label>
        <input v-model="userInfo.gender" type="radio" name="name" id="male" value="0">
      </div>
      <div>
        <label for="female">여자</label>
        <input v-model="userInfo.gender" type="radio" name="name" id="female" value="1">
      </div>
    </div>
    <input @change="setFile" type="file" name="img" accept="image/*">
    <hr>
    <button @click="$store.dispatch('regist', userInfo)" class="btn btn-submit btn-bg-black">가입하기</button>
    <button @click="$router.back()" class="btn btn-cancel">취소</button>
  </div>
</template>

<script setup>
import {reactive} from 'vue';

const userInfo = reactive({
    account: '',
    password: '',
    password_chk: '',
    name: '',
    gender: '',
});
</script>

<style>
</style>
