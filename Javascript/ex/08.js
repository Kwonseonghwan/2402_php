// -----------------------
// 조건문 ( if, switch )
// -----------------------
/*
// 기본형태
if(조건1) {
	// 조건1이 참이면 실행할 처리
}
// 조건1이 거짓일경우 다음 체크로 진행
else if(조건2) {
	// 조건2가 참이면 실행할 처리
}
// 앞선 조건1, 조건2 모두 거짓일경우 else가 실행
else {
	
}
*/

// 1이면 1등, 2면 2등, 3이면 3등, 나머지는 순위 외, 5번만 특별상을 출력
let num = 3;

if (num === 1){
    console.log('1등');
}
else if (num === 2){
    console.log('2등');
}
else if (num === 3){
    console.log('3등');
}
else if (num === 5){
    console.log('특별상');
}
else {
    console.log('순위 외');
}

// 나이가 20대면 '20대', 30대면 '30대', 나머지는 '모름'
let age = 20;
switch(age) {
    case 20:
        console.log('20대');
        break;
    case 30:
        console.log('30대');
        break;
    default:
        console.log('모르겠다');
        break;
}


// -------------------------
// 반복문 ( for, while, do_while )
// -------------------------
for(let i = 1; i < 11; i++) {
    if(i % 3 === 0) {
        continue;
    }
    console.log(i + '번째 루프');
    if(i === 7) {
        break;
    }
}

let cnt = 1;
while(cnt <= 10) {
    if(cnt % 3 === 0) {
        cnt++;
        continue;
    }
    console.log(cnt + '번째 루프');

    if(cnt === 7) {
        break;
    }
    cnt++;
}


let a = 2;
for(let b = 1; b < 10; b++) {
    console.log( a ,' X ', b , ' = ',a * b);
}

const DAN = 19;
for(let dan = 2; dan <= DAN; dan++) {
    console.log(`**${dan}단**`);
    for(let multi = 1; multi <= DAN; multi++) {
        console.log(`${dan} X ${multi} = ${dan * multi}`);
        // console.log(dan + ' X ' + multi + '=' + (dan * multi));
    }
}

// for...in
// 모든 객체를 반복하는 문법
// key에만 접근이 가능
const OBJ = {
    key1: 'val1',
    key2: 'val2'
};

for(let key in OBJ) {
    console.log(OBJ[key]);
}

const ARR1 = [1, 2, 3];
for(let key in ARR1) {
    console.log(ARR1[key]);
}

// for...of
// iterable 객체를 반복하는 문법(String, Array, Map, Setm TypeArray..)
// value에만 접근이 가능
const STR1 = '안녕하세요';
for(let val of STR1) {
    console.log(val);
}




