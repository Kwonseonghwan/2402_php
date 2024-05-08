<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// 존재하지 않는라우터 정의, 되도록이면 가장 최하단에 위치
Route::fallback(function() {
    return '없는 url';
});

Route::get('/', function () {
    return view('welcome');
});

// ---------------------------
// 라우터 정의
// ---------------------------
// 문자열 리턴
Route::get('/hi', function() {
    return '안녕하세요.';
});

Route::get('/hello', function() {
    return '녕하세요.';
});


// 뷰파일 리턴
Route::get('/myview', function() {
    return view('myView');
});

// HTTP 메소드에 대응하는 라우터
Route::get('/home', function() {
    return view('home');
});

Route::post('/home', function() {
    return 'POST HOME';
});

Route::put('/home', function() {
    return 'PUT HOME';
});

Route::delete('/home', function() {
    return 'DELETE HOME';
});

// 라우터에서 파라미터 제어
// 파라미터 획득
Route::get('/param', function(Request $request) {
    return 'ID : '.$request->id.", name : ".$request->name;
});

// 세그먼트 파라미터
Route::get('/segment/{id}/{gender}', function($id, $gender) {
    return $id." : ".$gender;
});


// 세그먼트 파라미터를 기본값 설정
Route::get('/segment3/{id?}', function($id = 'base') {
    return $id;
});

// 라우터명 지정
Route::get('/name', function() {
    return view('name');
});

Route::get('/name/home/php505/root', function() {
    return 'URL 매우 길다';
})->name('name.root');

// 뷰에 데이터 전달
// with(키, 값) 메소드를 이용해서 뷰에 전달
// 뷰에서는 $키로 사용 가능
Route::get('/send', function() {
    $arr = [
        'id' => 1
        ,'email' => 'admin@admin.com'
    ];

    return view('send')
    // ->with(['gender' => '무성', 'name' => 'hong']);
    
        ->with('gender', '무성')
        ->with('name', '홍')
        ->with('data', $arr);
});