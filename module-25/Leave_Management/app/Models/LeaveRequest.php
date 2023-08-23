<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LeaveRequest extends Model
{
    protected $fillable = [
        'employee_id',
        'leave_category_id',
        'leave_start_date',
        'leave_end_date',
        'reason',
        'status',
    ];

    public function employee()
    {
        return $this->belongsTo('App\Models\Employee');
    }

    public function leaveCategory()
    {
        return $this->belongsTo('App\Models\LeaveCategory');
    }
}
