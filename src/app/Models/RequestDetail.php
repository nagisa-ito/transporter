<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RequestDetail extends Model
{
    // 書き込みを禁止するフィールドを指定
    // ちなみに書き込みを許可したい場合は$fillableにする
    protected $guarded = ['id'];
}
