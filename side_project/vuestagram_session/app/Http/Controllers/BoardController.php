<?php

namespace App\Http\Controllers;

use App\Models\Board;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BoardController extends Controller
{
    //최초 게시글 획득
    public function index() {
        $boardData = Board::select('boards.*', 'users.name')
                                ->join('users', 'users.id', '=', 'boards.user_id')
                                ->orderBy('id', 'DESC')
                                ->limit(20)
                                ->get();
        $responseData = [
            'code' => '0',
            'msg' => '게시글 획득 완료',
            'data' => $boardData->toArray()
        ];
        return response()->json($responseData, 200);
    }

    // 추가 게시글 획득
    public function moreIndex($id) {
        $boardData = Board::select('boards.*', 'users.name')
                                ->join('users', 'users.id', '=', 'boards.user_id')
                                ->where('boards.id', '<', $id)
                                ->orderBy('boards.id', 'DESC')
                                ->limit(20)
                                ->get();
        $responseData = [
            'code' => '0',
            'msg' => '게시글 획득 완료',
            'data' => $boardData->toArray()
        ];
        return response()->json($responseData, 200);
    }

    /**
     * 글 작성
     * 
     * @param Illuminate\Http\Request $request
     * 
     * @return string json
     */

     public function insertBoard(Request $request) {
        $userId = Auth::user();

        // insert 데이터 작성
        $insertData = $request->all();
        $insertData['user_id'] = $userId->id;
        $filePath = $request->file('img')->store('img');
        $insertData['img'] = '/'.$filePath;
        // $insertData['like'] = 0;

        //insert 처리
        $BoardInfo = Board::create($insertData);

        // response 데이터 생성
        $responseData = [
            'code' => '0'
            ,'msg' => ''
            ,'data' => $BoardInfo->toArray()
        ];

        return response()->json($responseData, 200);
    }
}
