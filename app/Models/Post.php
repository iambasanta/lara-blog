<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'slug', 'excerpt', 'body', 'category_id', 'published_at'];

    use HasFactory;

    public function category()
    {
        return $this->BelongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
