// 1. 버튼 클릭시 알러트출력
function myAlert() {
    alert('div찾아라');
}
// 2. 영역에 커서 닿으면 알러트출력
function heart() {
    alert('두근');
}
// 3. 영역 클릭시 색변경
function find(e) {
    alert('들켰다');
    DIV.removeEventListener('mouseenter', heart);
    e.target.style.backgroundColor = 'green';
    DIV.removeEventListener('click', find);
    DIV.addEventListener('click', hide)
}
// 4. 다시 클릭하면 사라짐
function hide(e) {
    alert('숨는다')
    let topMargin = Math.floor(Math.random() * 500) + 'px';
    let sideMargin = Math.floor(Math.random() * 500) + 'px';
    // 랜덤값 * (브라우저 너비,높이 - div 너비,높이)의 반올림
    // let topMargin = Math.round(Math.random() * (window.innerHeight - DIV.offsetHeight));
    // let sideMargin = Math.round(Math.random() * (window.innerWidth - DIV.offsetWidth));
    e.target.style.backgroundColor = 'white';
    DIV.addEventListener('mouseenter', heart);
    DIV.addEventListener('click', find);
    DIV.removeEventListener('click', hide)
    DIV.style.margin = topMargin + ' ' + sideMargin;
}

const DIV = document.querySelector('.item');

DIV.addEventListener('mouseenter', heart);
DIV.addEventListener('click', find);