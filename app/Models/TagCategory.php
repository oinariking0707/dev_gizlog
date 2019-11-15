<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;

class TagCategory extends Model
{
    use SoftDeletes;

    protected $fillable = ['name'];
    // protected $table = 'tag_categories';
    protected $dates = ['deleted_at'];

    public function question(){
        return $this->hasMany('App\Models\Question'); 
    }
}

