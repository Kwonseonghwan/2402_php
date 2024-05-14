@extends('inc.layout')

{{-- 타이틀 --}}
@section('title', '로그인')

{{-- 바디에 vh클래스부여 --}}
@section('bodyClassVh', 'vh-100')


{{-- 메인 --}}
@section('main')
<main class="container d-flex justify-content-center align-items-center h-75">
    <form style="width: 250px" action="{{route('regist.store')}}" method="post">
        @csrf
        {{-- 에러 메세지 표시 --}}
        @if($errors->any())
        <div class="text-danger">
        {{-- 에러 메세지 루프 처리 --}}
        @foreach($errors->all() as $error)
        <span>{{$error}}</span>
        <br>
        @endforeach
        </div>
        @endif

        <label for="email" class="form-label">이메일</label>
            <span id="print-chk-email"></span>
            <button id="btn-chk-email" type="button" class="btn btn-secondary float-end">중복 확인</button>
            <input type="text" class="form-control mb-3" id="email" name = "email">
            
            <label for="password" class="form-label">비밀번호</label>
            <input type="password" class="form-control mb-3" id="password" name="password">
            
            <label for="name" class="form-label">이름</label>
            <input type="text" class="form-control mb-3" id="name" name = "name">
            
            <button id="my-btn-complete" type="submit"  class="btn btn-dark">완료</button>
            <a href="{{route('get.login')}}" class="btn btn-secondary float-end">취소</a>
    </form>
</main>
@endsection
