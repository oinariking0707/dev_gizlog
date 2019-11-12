<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;

class Comment extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'question_id',
        'comment',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function question(){
        return $this->belongTo('App\Models\Question');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}