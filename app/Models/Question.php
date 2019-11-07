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

    public function tagcategory(){
        return $this->belongsTo(TagCategory::class);
    }

    public function getSearchRecode($input){
        return $this->where('title', 'like', '%'. $input['search-word']. '%')
                    ->get();
    }
}

