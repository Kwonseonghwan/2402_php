// Date 객체

// 요일 한글로 변환 함수
const changeDayToKoreanDay = num => {
    switch(num) {
        case 0:
            return '일요일';
            break;
        case 1:
            return '월요일';
            break;
        case 2:
            return '화요일';
            break;
        case 3:
            return '수요일';
            break;
        case 4:
            return '목요일';
            break;
        case 5:
            return '금요일';
            break;
        case 6:
            return '토요일';
            break;
    }
}

// 앞에 0을 추가해주는 함수
const lpadZero = (val, length) => {
    return String(val).padStart(length, '0')
}

// 현재 날짜/시간 획득
const NOW = new Date();

// getFullyear() : 연도만 가져오는 메소드 (yyyy)
const YEAR = NOW.getFullYear();

// getMonth() : 월만 가져오는 메소드, 0 ~ 11을 획득
const MONTH = lpadZero(NOW.getMonth() + 1, 2);

// getDate() : 일을 가져오는 메소드
const DATE = lpadZero(NOW.getDate(), 2);

// getHours() : 시를 가져오는 메소드
const HOUR = lpadZero(NOW.getHours(), 2);

// getminutes() : 분을 가져오는 메소드
const MINUTE = lpadZero(NOW.getMinutes(), 2);

// getSeconds() : 초를 가져오는 메소드
const SECOND = lpadZero(NOW.getSeconds(), 2);

// getMilliseconds() : 미리초를 가져오는 메소드
const MILLISECONDS = lpadZero(NOW.getMilliseconds(), 3);

// getDay() : 요일을 가져오는 메소드, 0(일) ~ 6(토) 반환
const DAY = NOW.getDay();

// 날짜 포맷
const FOMAT_DATE = `${YEAR}-${MONTH}-${DATE} ${HOUR}:${MINUTE}:${SECOND}, ${changeDayToKoreanDay(DAY)}`;

// getTime() : UNIX 타임스탬프를 반환
const TIME = NOW.getTime();

// 일수 차이
const TARGET_DATE = new Date('2024-04-03 00:00:00');

const DIFF_DATE = Math.floor(Math.abs(TARGET_DATE - NOW) / 86400000)

// 1000*60*60*24 = 86400000

// 2024-01-01 13:00:00과 2025-05-30 00:00:00은 몇개월 후 입니까?

const A_DATE = new Date('2024-01-01 13:00:00');
const B_DATE = new Date('2025-05-30 00:00:00');
const C_DATE = Math.floor(Math.abs(A_DATE - B_DATE) / (1000*60*60*24*30));


