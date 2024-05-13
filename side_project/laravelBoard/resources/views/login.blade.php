@extends('inc.layout')

{{-- 타이틀 --}}
@section('title', '로그인')

{{-- 바디에 vh클래스부여 --}}
@section('bodyClassVh', 'vh-100')


{{-- 메인 --}}
@section('main')
<main class="container d-flex justify-content-center align-items-center h-75">
    <form style="width: 250px" action="{{route('post.login')}}" method="post">
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
        <input type="text" class="form-control mb-3" name="email" id="email">
        <label for="password" class="form-label">비밀번호</label>
        <input type="password" class="form-control mb-3" name="password" id="password">
        <button type="submit" class="btn btn-dark">로그인</button>
    </form>
</main>
@endsection
