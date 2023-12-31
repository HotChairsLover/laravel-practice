<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdvCategory extends Model
{
    use HasFactory, SoftDeletes;

    const ROOT = 1;
    protected $fillable
        = [
            'title',
            'slug',
            'parent_id',
            'description',
        ];

    public function parentCategory()
    {
        return $this->belongsTo(AdvCategory::class, 'parent_id', 'id');
    }

    public function getParentTitleAttribute()
    {
        $title = $this->parentCategory->title
            ?? ($this->isRoot()
                ? 'Корень'
                : '???');

        return $title;
    }

    public function isRoot()
    {
        return $this->id === AdvCategory::ROOT;
    }
}
