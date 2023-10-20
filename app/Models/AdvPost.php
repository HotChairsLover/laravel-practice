<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdvPost extends Model
{
    use HasFactory, SoftDeletes;

    const UNKNOWN_USER = 1;
    protected $fillable
        = [
            'title',
            'slug',
            'category_id',
            'price',
            'description',
            'is_published',
            'published_at',
        ];

    public function category()
    {
        return $this->belongsTo(AdvCategory::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
