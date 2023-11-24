<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class History extends Model
{
   protected $fillable = [
       'title',
       'description',
       'status'
   ];
}
