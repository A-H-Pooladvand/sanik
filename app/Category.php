<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
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

    public function projects()
    {
        return $this->morphedByMany(Project::class, 'categorizable', 'categorizables');
    }

    public function albums()
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

    public function news_query()
    {
        return $this->news()
            ->where('status', 'publish')
            ->where('publish_at', '<=', now())
            ->where(function (Builder $news) {
                $news->whereNull('expire_at')->orWhere('expire_at', '>=', now());
            });
    }

    public function project_query()
    {
        return $this->projects()->latest()
            ->where('status', 'publish')
            ->where('publish_at', '<=', now())
            ->where(function (Builder $project) {
                $project->whereNull('expire_at')->orWhere('expire_at', '>=', now());
            });
    }

    public function album_query()
    {
        return $this->albums()->latest();
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
