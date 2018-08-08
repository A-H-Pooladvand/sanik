<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ScopeOfWork extends Model
{
    protected $guarded = ['id'];

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['link'] = str_slug($value);
    }

    public function getStatusFaAttribute()
    {
        switch ($this->attributes['status']) {
            case 'publish':
                return 'منتشر شده';
                break;
            default:
                return 'پیش نویس';
        }
    }

    /** A news post has an author */
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getCreatedAtFaAttribute()
    {
        return jdate($this->attributes['created_at'])->format('Y/m/d');
    }

    public function getUpdatedAtFaAttribute()
    {
        return jdate($this->attributes['updated_at'])->format('Y/m/d');
    }

}
