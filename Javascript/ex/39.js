// 요소 선택
// ---------
// 고유한 ID로 요소를 선택
const TITLE = document.getElementById('title');
TITLE.style.color = 'blue';

// 태그명으로 요소를 선택하는 방법
const H1 = document.getElementsByTagName('h1');

H1[1].style = 'color : green; font-size : 3rem;';

// 클래스 요소를 선택
const CLASS_ELE = document.getElementsByClassName('none-li');

// CSS 선택자를 이용해서 요소를 선택
const CSS_ID = document.querySelector('#title');
const CSS_CLS = document.querySelector('.none-li');
const CSS_CLS_ALL = document.querySelectorAll('.none-li');

// ul의 두번째 자식
const SECOND = document.querySelector('ul > li:nth-child(2)');

// CSS_CLS_ALL에 획득한 모든 요소 글자색 변경
CSS_CLS_ALL.forEach(node => node.style.color = 'red');

// ----------------------------------------
// 요소 조작
// ----------------------------------------
// textContent : 컨텐츠를 획득 또는 변경, 순수한 텍스트 데이터를 전달
TITLE.textContent = '<a>링크</a>';

// innerHTML : 컨텐츠를 획득 또는 변경, 태그는 태그로 인식해서 전달
TITLE.innerHTML = '<a>링크</a>';

// setAttribute(속성명, 값) : 해당 속성과 값을 요소에 추가
const INPUT1 = document.getElementById('input1');
INPUT1.setAttribute('placeholder','값');
INPUT1.setAttribute('name','input1');

// removeAttribute(속성명) : 해당 속성을 요소에서 제거
INPUT1.removeAttribute('placeholder');

// ------------
// 요소 스타일링
// ------------

// style : 인라인으로 스타일 추가
TITLE.style.color = 'blue';
TITLE.removeAttribute('style');

// classList : 클래스로 스타일 추가 및 삭제

// add() : 추가
TITLE.classList.add('font-color-red', 'css2', 'css3', 'css4');

// classList.remove() : 제거
TITLE.classList.remove('font-color-red');

// classList.toggle() : 해당 클래스를 토글
TITLE.classList.toggle('none');

// 리스트의 요소들의 글자색을 짝수는 빨강, 홀수는 파랑으로 수정
const A = document.querySelectorAll('.none-li');

A.forEach((node, index) => {
    if (index % 2 === 0) {
        node.style.color = 'red'; 
    } else {
        node.style.color = 'blue'; 
    }
});



