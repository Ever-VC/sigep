<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Overtime extends Model
{
    /** @use HasFactory<\Database\Factories\OvertimeFactory> */
    use HasFactory;

    protected $fillable = ['employee_id', 'date', 'start_time', 'end_time', 'amount'];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
