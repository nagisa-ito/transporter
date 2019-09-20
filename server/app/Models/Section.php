<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class Section extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'user_id', 'is_regular', 'from', 'to', 'cost'
    ];

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'   => ['required', 'string', 'max:255'],
            'from'   => ['required', 'string', 'max:255'],
            'to'     => ['required', 'string', 'max:255'],
            'cost'   => ['required', 'numeric'],
        ]);
    }
}
