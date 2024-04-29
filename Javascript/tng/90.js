function axiosGet() {
    
    const URL = document.querySelector('#input-url').value;

    axios.get(URL)
    .then(response => {
        myImg(response.data);
    })
    .catch(err => console.log(err));
// async function axiosGet() {

//     const url = document.querySelector('#input-url').value;

//     try {
//         const response = await axios.get(url);
//         axiosGet(response.data); 
//     } catch (error) {
//         console.log(error);
//     }
}

function myImg(data) {
    const CONTAINER = document.querySelector('.img-content');
    data.forEach(item => {

        const ADD_DIV = document.createElement('div');
        ADD_DIV.textContent = item.id;
        ADD_DIV.setAttribute('class','img-box');

        const ADD_IMG = document.createElement('img');
        
        ADD_DIV.appendChild(ADD_IMG);
        CONTAINER.appendChild(ADD_DIV);
        
        ADD_IMG.setAttribute('src', item.download_url);
    
    });
}

function REMOVE() {
    const remove = document.querySelector('.img-content');
    // const footer = document.querySelectorAll('footer');
    // for(let i = 0; i < 5; i++) {
    //     let idx = footer.length.length - 1 - i
    //     if(idx < 0) {
    //         break;
    //     }
    //     footer.removeChild(remove[idx]);
    // }

    BTN_API.addEventListener('click', axiosGet);
    remove.innerHTML = '';
}

const BTN_API = document.querySelector('#btn-api');
BTN_API.addEventListener('click', axiosGet);

const BTN_RESET = document.querySelector('#btn-remove');
BTN_RESET.addEventListener('click', REMOVE);



