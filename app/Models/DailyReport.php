<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DailyReport extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'user_id',
        'title',
        'content',
        'reporting_time',
    ];

    protected $dates = [
        'reporting_time',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function getAllRecode($id)
    {
        return $this->where('user_id',$id)
                    ->get();
    }

    public function getMonthRecode($id,$input)
    {
        return $this->where('user_id',$id)
                    ->where('reporting_time', 'like', '%'. $input['search-month']. '%')
                    ->get();
    }
}
