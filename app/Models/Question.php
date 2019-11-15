<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;

class Question extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'tag_category_id',
        'title',
        'comment',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }

    public function tagCategory()
    {
        return $this->belongsTo('App\Models\TagCategory');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function scopegetSearchRecode($query, $input)
    {
        return $query->where('title', 'like', '%'. $input['search_word']. '%')
        ->paginate(10);
    }

    public function scopegetSearchCategory($query, $input)
    {
        return $query->where('tag_category_id', $input['tag_category_id'])
        ->paginate(10);
    }
}

