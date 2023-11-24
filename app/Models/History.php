<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class History extends Model
{
   protected $fillable = [
       'title',
       'description',
       'status',
       'token'
   ];
    public static function boot(): void
    {
        parent::boot();

        static::creating(function ($model) {
            $model->token = hash('sha256', Str::random(32));
        });
    }
}
