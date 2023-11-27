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
}
