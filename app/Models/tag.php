<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $fillable = [
        'label',
    ];

    public function article()
    {
        return $this->belongsToMany(Article::class,'tags_articles', 'tag_id', 'article_id');
    }
}
