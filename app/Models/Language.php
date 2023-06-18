<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Language extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable = ['locale', 'prefix', 'created_at', 'updated_at'];

    public function translations()
    {
        return $this->hasMany(PostTranslation::class);
    }
}
