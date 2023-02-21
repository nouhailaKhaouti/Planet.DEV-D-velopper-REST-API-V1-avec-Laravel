<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    use HasFactory;
    public function article()
    {
        return $this->belongsTo(article::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
