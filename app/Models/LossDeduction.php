<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LossDeduction extends Model
{
    /** @use HasFactory<\Database\Factories\LossDeductionFactory> */
    use HasFactory;

    protected $fillable = ['employee_id', 'description', 'amount', 'date'];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
