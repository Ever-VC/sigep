<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advance extends Model
{
    /** @use HasFactory<\Database\Factories\AdvanceFactory> */
    use HasFactory;

    protected $fillable = ['employee_id', 'amount', 'date', 'description'];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
