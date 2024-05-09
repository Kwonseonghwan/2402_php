<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EduController extends Controller
{
    public function index() {
        $arr = [
            'id' => 1
            ,'name' => '홍'
            ,'tel' => '01099999999'
        ];
        return view('edu')
            ->with('gender', 'F')
            ->with('data', $arr)
            ->with('data2', [])
            ;
    }
}
