
const leftPadZero = (target, length, fillstr) => {
    return String(target).padStart(length, fillstr);
}

const GET_DATE = () => {
    const NOW = new Date(); // date 객체(현재시간) 생성
    const hour = NOW.getHours();
    const minute = NOW.getMinutes();
    const second = NOW.getSeconds();
    let ampm = '오전'; // 오전, 오후
    let hour_12 = hour; // 시간(12시 포맷)

    if(hour > 12) {
        ampm = '오후';
        hour_12 = hour - 12;
    } 

    let printTime = 
        ampm + ' ' 
        + leftPadZero(hour_12, 2, '0') + ':' 
        + leftPadZero(minute, 2, '0') + ':' 
        + leftPadZero(second, 2, '0');

    const SPAN_TIME = document.querySelector('#time');
    SPAN_TIME.textContent = printTime;
}

GET_DATE();
let intervalID = setInterval(GET_DATE, 1000);

// 스탑버튼
const BTN_STOP = document.querySelector('#btn-stop');
BTN_STOP.addEventListener('click', () => {
    clearInterval(intervalID);
});

// 리셋버튼
const BTN_RESTART = document.querySelector('#btn-restart');
BTN_RESTART.addEventListener('click', () => {
    GET_DATE();
    intervalID = setInterval(GET_DATE, 1000);
});