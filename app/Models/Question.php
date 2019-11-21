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

    /*ページネーション数指定*/
    const PER_PAGE = 10;

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function tagCategory()
    {
        return $this->belongsTo(TagCategory::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);

    }

    /**
    *絞り込みのまとめ
    */
    public function getRecord($input)
    {
        if (isset($input)) {
            return $this->with(['user', 'tagCategory', 'comments'])
            ->getSameSearchWord(Arr::get($input, 'search_word'))
            ->getSameSearchCategory(Arr::get($input, 'tag_category_id'))
            ->paginate(self::PER_PAGE);
        } 
    }

    /**
     * ワード絞り込み
     */
    public function scopegetSameSearchWord($query, $searchword)
    {
        if (isset($searchword)) {
            return $query->where('title', 'like', $searchword. '%');
        }
    }

    /**
    *カテゴリ絞り込み
     */
    public function scopegetSameSearchCategory($query, $category)
    {
        if (isset($category)) {
            return $query->where('tag_category_id', $category);
        }
    }

    /**
    *ログインユーザーの質問取得
    */
    public function authUserQuestions()
    {
        return $this->with(['user','tagCategory','comments'])->where('user_id', Auth::id())
        ->paginate(self::PER_PAGE);
    }
}

