<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeaturedBlog extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'post_id'
    ];

    protected $table = 'featured_blog';

    public function post() {
        return $this->belongsTo(Post::class);
    }
}
