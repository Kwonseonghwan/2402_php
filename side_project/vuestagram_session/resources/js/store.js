import { createStore } from 'vuex';
import router from './router';

const store = createStore({
    state() {
        return {
            authFlg: document.cookie.indexOf('auth=') >= 0 ? true : false,
            userInfo: localStorage.getItem('userInfo') ? JSON.parse(localStorage.getItem('userInfo')) : null,
            boardData: [],
            moreBoardFlg: true,
        }
    },
    mutations: {
        // 인증 플래그 저장
        setAuthFlg(state, flg) {
            state.authFlg = flg;
        },
        //유저 정보 저장
        setUserInfo(state, userInfo) {
            state.userInfo = userInfo;
        },
        // 게시글 초기삽입
        setBoardData(state, data) {
            state.boardData = data;
        },
        // 더보기 버튼 플래그
        setMoreBoardFlg(state, flg) {
            state.moreBoardFlg = flg;
        },
        // 게시글 추가
        setMoreBoardData(state, data) {
            state.boardData = [...state.boardData, ...data];
        },
        // 게시글 관련
        setConcatBoardList(state, data) {
            state.boardData = state.boardList.concat(data);
        },
        // 작성 게시글 맨앞에 추가
        setUnshiftBoardList(state, data) {
            state.boardData.unshift(data);
        },
        // 유저 작성글 수 + 1
        setAddUserBoardsCount(state) {
            state.userInfo.boards_count++;
            localStorage.setItem('userInfo', state.userInfo);
        },

        // 게시글 삭제
        setUserBoardData(state, index) {
            state.boardData.splice(index, 1);
        },
        setUserBoardsCountSub(state) {
            state.userInfo.boards_count--;
        },

    },
    actions: {
        /**
         * 로그인 처리
         * 
         * @param {*} context 
         */
        login(context) {
            const url = '/api/login';
            const form = document.querySelector('#loginForm');
            const data = new FormData(form);
            axios.post(url, data)
            .then(response => {
                console.log(response.data); // TODO
                localStorage.setItem('userInfo', JSON.stringify(response.data.data));
                context.commit('setUserInfo', response.data.data);
                context.commit('setAuthFlg', true);

                router.replace('/board');
            })
            .catch(error => {
                console.log(error.response); // TODO
                alert('로그인에 실패 (' + error.response.data.code + ')');
            });
        },
        logout(context) {
            const url = '/api/logout';

            axios.post(url)
            .then(response => {
                console.log(response.data); // TODO
            })
            .catch(error => {
                console.log(error.response); // TODO
                alert('문제가 발생해 강제로그아웃 (' + error.response.data.code + ')');
            })
            .finally(() => {
                localStorage.clear();

                context.commit('setAuthFlg', false);
                context.commit('setUserInfo', null);
                context.commit('setBoardData' , []);

                router.replace('/login');
            });
        },
        /**
         * 최초 게시글 획득
         * @param {*} context 
         */
        getBoardData(context) {
            const url = '/api/board';

            axios.get(url)
            .then(response => {
                console.log(response.data); // TODO
                context.commit('setBoardData', response.data.data);
            })
            .catch(error => {
                console.log(error.response); // TODO
                alert('게시글 습득에 실패 (' + error.response.data.code + ')');
            });
        },
        /**
         * 추가 게시글 획득
         * @param {*} context 
         */
        getMoreBoardData(context) {
            const lastItem = context.state.boardData[context.state.boardData.length - 1];
            const url = '/api/board/' + lastItem.id;
            axios.get(url)
            .then(response => {
                console.log(response.data); // TODO
                context.commit('setMoreBoardData', response.data.data);

                // 더보기 버튼 플래그 갱신
                if(response.data.data.length<20) {
                    context.commit('setMoreBoardFlg', false);
                }
            })
            .catch(error => {
                console.log(error.response); // TODO
                alert('추가 게시글 획득에 실패했습니다. (' + error.response.data.data + ')');
            });
        },
        // 회원가입
        registration(context) {
            const url = 'api/registration';
            const data = new FormData(document.querySelector('#registrationForm'));

            axios.post(url, data)
            .then(response => {
                console.log(response.data); // TODO
                router.replace('login');
            })
            .catch(error => {
                console.log(error.response.data); // TODO
                alert('회원가입 실패 (' + error.response.data.code + ')');
            });

        },
        /**
         * 게시글 작성
         * @param {*} context 
         */
        insertData(context) {
            const url = '/api/insertboard';
            const data = new FormData(document.querySelector('#insertDataForm'));

            axios.post(url, data)
            .then(response => {
                if(context.state.boardData.length > 1) {
                // 보드리스트의 가장 앞에 작성한 글 정보 추가
                context.commit('setUnshiftBoardList', response.data.data);
                }

                // 유저의 작성글 수 1증가
                context.commit('setAddUserBoardsCount');
                localStorage.setItem('userInfo', JSON.stringify(context.state.userInfo));

                // 게시글 인덱스로 이동
                router.replace('/board');
            })
            .catch(error => {
                console.log(error.response.data); // TODO
                alert('글 작성 실패 (' + error.response.data.code + ')');
            });
        },
        // 게시글 삭제 처리
        removeBoardItem(context, id) {
            const url = '/api/delete/' + id;
            console.log(id);
            axios.delete(url)
            .then(response => {

                context.state.boardData.forEach((item, key) => {
                    if(item.id == response.data.data) {
                        context.commit('setUserBoardData', key)
                        return false;
                    }
                });

                // 유저의 작성글 수 1 하락
                context.commit('setUserBoardsCountSub');
                localStorage.setItem('userInfo', JSON.stringify(context.state.userInfo));

                router.replace('/board')
            })
            .catch(error => {
                console.log(error.response); // TODO
                alert('글 삭제에 실패했습니다. ( ' + error.response.data.code + ') ');
            });
        },
        // 유저id 불러오기
        getUserBoardData(context, userId) {
            const url = '/api/board/' + userId;

            axios.get(url)
            .then(response => {
                context.commit('setBoardData', response.data.data);
            })
            .catch(error => {
                alert('사용자 게시글 (' + error.response.data.code + ')');
            });
        },
    }    
});

export default store;
