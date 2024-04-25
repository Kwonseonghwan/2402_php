// 타이머 함수

// setTimeout(콜백함수, 시간(ms단위)) : 일정 시간이 흐른 후에 콜백 함수를 실행
// setTimeout(() => (console.log('타임아웃')), 5000);

// 1초뒤 A, 2초뒤 B, 3초뒤 C 출력
// setTimeout(() => console.log('A'), 1000);
// setTimeout(() => console.log('B'), 2000);
// setTimeout(() => console.log('C'), 3000);

// console.log('A');
// setTimeout( () => {
//     console.log('B');
//     console.log('C');
// }, 1000);

// clearTimeout(타임아웃ID) : 해당 타임아웃ID의 처리를 제거
// const TIMEOUT_ID = setTimeout(() => console.log('ttt'), 5000);
// clearTimeout(TIMEOUT_ID);
// console.log(TIMEOUT_ID);

// setInterval(콜백함수, 시간(ms)[, 아규먼트1, 아규먼트2]) : 일정시간마다 콜백함수 실행
// setInterval(() => console.log('인터벌'), 1000);

// clearInterval() : 해당 intervalID 처리 제거
// clearInterval(INTERVAL_ID);

// 화면에 5초 뒤에 '두두등장'이라는 매우 큰 글씨가 나타났다가 사라지게 해주세요

setTimeout(() => {
    const B = document.querySelector('body');
    B.innerHTML = '두두등장';
    B.style.fontSize = '5rem';
    setTimeout(() => {
        // B.innerHTML = '';
        B.remove();
    }, 5000);
}, 5000);


// 강사님

setTimeout(() => {
    const H1 = document.createElement('h1'); // h1 태그 생성
    H1.innerHTML = '등장'; // h1 태그에 컨텐츠 삽입
    H1.style.fontSize = '5rem'; // 글자 크기 조절
    
    document.body.appendChild(H1); // body에 h1 추가

    // 삭제 타임아웃 처리
    setTimeout(() => {
        const DEL_H1 = document.querySelector('h1'); // h1 요소 획득
        document.body.removeChild(DEL_H1); // h1 요소 삭제
    }, 3000);
}, 5000);
    
// callback hell abc순서대로 출력되게 하기위해
setTimeout(() => console.log('A'), 3000);
setTimeout(() => console.log('B'), 2000);
setTimeout(() => console.log('C'), 1000);

setTimeout(() => {
    console.log('A');
    setTimeout(() => {
        console.log('B');
        setTimeout(() => {
            console.log('C');
        }, 1000);
    }, 2000)
}, 3000);