<template>
  <img alt="Vue logo" src="./assets/logo.png">
<!-- 헤더 -->
<!-- props : 자식 컴포넌트에게 props 속성을 이용해서 데이터는 전달 -->
  <HeaderComponent 
    :cate="cate"
    />
    <!-- slot : 자식쪽에서 <slot></slot> 부분에 전달하여 자식컴포넌트에서 렌더링 -->
    <h3>부모쪽에서 정의한 슬롯</h3>
 
  <ListComponent 
    :products="products"
    @myOpenModal="myOpenModal"
  />

  <!-- 모달 -->
  <ModalDetail 
    :product="product"
    :flgModal="flgModal" 
    @myCloseModal="myCloseModal"
  />
</template>

<script setup>

// 데이터 바인딩
import {ref, reactive, provide} from 'vue';
import HeaderComponent from './components/HeaderComponent.vue';
import ModalDetail from './components/ModalDetail.vue';
import ListComponent from './components/ListComponent.vue';

// reactive : 객체 타입만 사용 가능하며, 해당 객체에 대한 반응
const products = reactive([
  {productName: '바지', price: 10000,productContent:'바지바지', img: require('@/assets/img/2.jpg')},
  {productName: '티셔츠', price: 100000, productContent:'티', img: require('@/assets/img/1.jpg')},
  {productName: '양말', price: 1000000, productContent:'양말', img: require('@/assets/img/5otter.png')}
]);

const cate = reactive([
  {name: '홈'},
  {name: '상품'},
  {name: '기타'}
]);

// 모달용 소스코드
const flgModal = ref(false); // 모달 표시용 플래그
let product = reactive({});

function myOpenModal(item) {
  flgModal.value = true;
  product = item;
}

function myCloseModal() {
  flgModal.value = false;
}

// Provide / Inject 연습
const count = ref(0);

function addCount() {
  count.value++;
}

provide('test', {
  count,
  addCount
});

</script>

<style>
@import url('./assets/css/common.css');
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
/* 
CSS 파일 따로 분리
.nav {
  background-color: steelblue;
  padding: 15px;
  border-radius: 10px;
}
.nav > a {
  color: white;
  padding: 10px;
  text-decoration: none;
} */
</style>
