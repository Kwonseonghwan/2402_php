// 이벤트

// 인라인 이벤트
function myAlert() {
    alert('안녕하세요. myAlert()');
}

// 프로퍼티 리스너 적극적으로 사용하진 않음
const btn2 = document.querySelector('#btn2');
btn2.onclick = () => (alert('안녕하세요'));

// addEventListener 가장 많이 사용
const BTN3 = document.querySelector('#btn3');
// BTN3.addEventListener('click', () => (alert('버튼 3')));
BTN3.addEventListener('click', function(){
    alert('버튼 3')
});
BTN3.addEventListener('click', test);
    
// removeEventListener() : 이벤트 추가시 사용했던 이벤트 형식과 콜백함수가 완전 동일해야한다
BTN3.removeEventListener('click', function(){
    alert('버튼 3')
}); // 제거 안됨

BTN3.removeEventListener('click', test); // 제거 됨

function test() {
    alert('test함수 dkffjxm')
};

// 이벤트 객체
const BTN4 = document.querySelector('#btn4');
BTN4.addEventListener('click', e => {
    console.log(e)
    console.log(e.target.value)
});

// -------------
// 팝업
const BTN_POPUP = document.querySelector('#popup');
BTN_POPUP.addEventListener('click', () => {
    open('https://naver.com', '', 'width=500 height=500')
});

// 모달
const BTN_MODAL = document.querySelector('#btn-modal');
BTN_MODAL.addEventListener('click', toggleModalContainer);

function toggleModalContainer() {
    const MODAL_CONTAINER = document.querySelector('.modal-container');
    MODAL_CONTAINER.classList.toggle('display-none');
}

// 모달 컨테이너 영역 클릭시 모달 닫기
const MODAL_CONTAINER = document.querySelector('.modal-container');
MODAL_CONTAINER.addEventListener('click', toggleModalContainer);

// 모달 아이템 영역 눌렀을 때 안꺼지게 하는 방법 중 하나
const TEST = document.querySelector('.modal-item');
TEST.addEventListener('click', toggleModalContainer);

// 마우스를 눌렀을 때 이벤트
const H1 = document.querySelector('h1');
H1.addEventListener('mousedown', e => {
    e.target.style.backgroundColor = 'red';
});

// 마우스를 뗄 때 이벤트
H1.addEventListener('mouseup', e => {
    e.target.style.backgroundColor = 'white';
});

// 마우스 포인터가 진입했을 때 이벤트
H1.addEventListener('mouseenter', e => {
    e.target.style.color = 'green';
});

// 마우스 포인터가 벗어났을 때 이벤트
H1.addEventListener('mouseleave', e => {
    e.target.style.color = 'black';
});