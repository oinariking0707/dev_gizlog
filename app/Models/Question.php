<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Arr;

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

    /**
     * ページネーション数指定
     */
    const PAGENUM = 10;

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

    /**
    *絞り込みのまとめ
    */
    public function getRecode($input)
    {
        if (!empty($input))
        {
        return $this->getSearchRecode(Arr::get($input, 'search_word'))
        ->getSearchCategory(Arr::get($input, 'tag_category_id'))
        ->paginate(self::PAGENUM);
        } else {
        return $this->paginate(self::PAGENUM);
        }
    }

    /**
     * ワード絞り込み
     */
    public function scopegetSearchRecode($query, $searchword)
    {
        if (!empty($searchword)) {
            return $query->where('title', 'like', '%'. $searchword. '%');
        }
    }

    /**
    *カテゴリ絞り込み
     */
    public function scopegetSearchCategory($query, $category)
    {
        if (!empty($category)) {
            return $query->where('tag_category_id', $category);
        }
    }

    /**
    *ログインユーザーの質問取得
    */
    public function scopeauthUserQuestions($query)
    {
        return $query->where('user_id', Auth::id())
        ->paginate(self::PAGENUM);
    }
}

