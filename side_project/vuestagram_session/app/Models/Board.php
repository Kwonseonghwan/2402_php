<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Board extends Model
{
    use HasFactory, SoftDeletes;
    
    
    protected $fillable = [
        'user_id',
        'content',
        'img',
        'like',
    ];
    
    /**
     * JSON으로 시리얼라이즈 할 때, 날짜를 원하는 형식으로 포맷
     * 이 메소드가 없으면 디폴트는 UTC
     * 
     * @param \DateTimeInterFace $date
     * 
     * @return String('Y-m-d H:i:s')
     */
    protected function serializeDate(\DateTimeInterFace $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}