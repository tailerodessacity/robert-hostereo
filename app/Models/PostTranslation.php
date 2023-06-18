<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PostTranslation extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable = [
        'post_id',
        'language_id',
        'title',
        'description',
        'content',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function language()
    {
        return $this->belongsTo(Language::class);
    }
}
