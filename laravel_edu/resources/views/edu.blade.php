{{-- 상속 --}}
@extends('layout.layout')

{{-- @section : 부모템플릿에 해당하는 yield 부분에 삽입 --}}
@section('title', '에듀')

{{-- @section ~ @endsection : 처리해야할 코드가 많을 경우 범위를 지정해서 삽입 --}}
@section('main')
<main>
    <h1>자식 템플릿 메인</h1>
</main>
@endsection

@section('show')
<h1>자식 show</h1>
<h2>자식</h2>
@endsection

{{-- @if : 조건문 --}}
@if($gender === 'F') 
    <span>성별 : 여자</span>
@elseif($gender === 'M')
    <span>성별 : 남자</span>
@else
    <span>성별 : 기타</span>
@endif

{{-- 반복문 --}}
{{-- @for ~ @endfor : for 반복문 --}}
@for($i = 0; $i < 5; $i++)
    <span>for : {{$i}}</span>
@endfor
<hr>
{{-- @foreach ~ @foreach : foreach 반복문 --}}
<h2>foreach문</h2>
{{-- $loop : foreach, forelse 에서 루프의 정보를 담고 있는 자동으로 생성되는 객체 --}}
@foreach($data as $key => $val)
    @if($loop->odd)
        <span>{{$key." : ".$val}}</span>
    @else
        <span style="color: red">{{$key." : ".$val}}</span>
    @endif
    <br>
@endforeach

{{-- 
    @forelse ~ @empty ~ @endforelse : 루프를 할 데이터가 길이가 1이상이면 루프처리,
    배열의 길이가 0이면 @empty 처리
--}}
<h2>forelse문</h2>
@forelse($data2 as $key => $val)
<span>{{$key." : ".$val}}</span>
<br>
@empty
<span>빈 배열입니다</span>
@endforelse
<hr>