function nowTime() {
    const NOW = new Date();
    
    const lpadZero = (val, length) => {
        return String(val).padStart(length, '0');
    };
    
    let HOUR = NOW.getHours();

    const MINUTE = lpadZero(NOW.getMinutes(), 2);
    const SECOND = lpadZero(NOW.getSeconds(), 2);
    
    let str = '현재 시각 ';

    if (HOUR >= 12) {
        str += '오후';
        if (HOUR > 12) {
            HOUR -= 12;
        }
    } else {
        str += '오전';
        if (HOUR === 0) {
            HOUR = 12;
        }
    }
    HOUR = lpadZero(HOUR, 2);

    

    const FOMAT_DATE = `${str} ${HOUR}:${MINUTE}:${SECOND}`;
    
    const B = document.querySelector('div');
    B.innerHTML = FOMAT_DATE;
};
    let timeInterval;
    document.addEventListener('DOMContentLoaded', () => {
    nowTime();
    timeInterval = setInterval(nowTime, 1000);

    const stopTime = document.querySelector('#stop');
    stopTime.addEventListener('click', stopB)
    
    const restart = document.querySelector('#start');
    restart.addEventListener('click', start)
});

function stopB(){
    clearInterval(timeInterval);
    const stopTime = document.querySelector('#stop');
    stopTime.removeEventListener('click', stopB);
}

function start(){
    nowTime();
    timeInterval = setInterval(nowTime, 1000);

    const stopTime = document.querySelector('#stop');
    stopTime.addEventListener('click', stopB);
}

