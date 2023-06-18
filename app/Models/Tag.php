<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable = ['name', 'created_at', 'updated_at', 'deleted_at'];

    public function posts()
    {
        return $this->belongsToMany(Post::class, 'post_tags');
    }
}
