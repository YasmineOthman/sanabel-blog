<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'icon','slug'];

    /**
     * Get the posts for the blog post.
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
