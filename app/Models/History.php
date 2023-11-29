<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
   protected $fillable = [
       'title',
       'description',
       'status',
       'token'
   ];

    public function scopeFilterByStatus($query, $status)
    {
        if ($status === 'all') {
            return $query;
        }

        return $query->where('status', $status);
    }
}
