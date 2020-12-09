<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Otp_code extends Model
{
    //
    protected $guarded = [];

    protected static function boot()
    {
        # code...
        static::creating(function($model) {
            if(! $model->getKey()) {
                $model->{$model->getKeyName()} = (string) Str::uuid();
            }
        });
    }

    public function getIncrementing()
    {
        # code...
        return false;
    }

    public function getKeyType()
    {
        # code...
        return 'string';
    }

    public function user()
    {
        # code...
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
