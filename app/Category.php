<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed $id
 */
class Category extends Model
{
    protected $guarded = ['id'];

    public function news()
    {
        return $this->morphedByMany(News::class, 'categorizable', 'categorizables');
    }

    public function album()
    {
        return $this->morphedByMany(Album::class, 'categorizable', 'categorizables');
    }

    public function pages()
    {
        return $this->morphedByMany(Page::class, 'categorizable', 'categorizables');
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function child()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function children()
    {
        return $this->child()->with('children');
    }

    public function getCreatedAtAttribute()
    {
        return jdate($this->attributes['created_at'])->format('Y/m/d');
    }

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = strFa($value);
    }

    public function getUpdatedAtAttribute()
    {
        return jdate($this->attributes['updated_at'])->format('Y/m/d');
    }
}
