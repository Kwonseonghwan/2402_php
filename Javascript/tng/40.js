function myAlert() {
    alert('div');
}

function heart() {
    alert('두근');
}


function find(e) {
    alert('들킴');
    DIV.removeEventListener('mouseenter', heart);
    e.target.style.backgroundColor = 'red';
    DIV.removeEventListener('click', find);
    DIV.addEventListener('click', hide)
}

function hide(e) {
    alert('숨음')
    let topMargin = Math.floor(Math.random() * 5) + 'rem';
    let sideMargin = Math.floor(Math.random() * 5) + 'rem';
    e.target.style.backgroundColor = 'white';
    DIV.addEventListener('mouseenter', heart);
    DIV.addEventListener('click', find);
    DIV.removeEventListener('click', hide)
    DIV.style.margin = topMargin + '' + sideMargin;
}

const DIV = document.querySelector('.item');



DIV.addEventListener('mouseenter', heart);
DIV.addEventListener('click', find);











