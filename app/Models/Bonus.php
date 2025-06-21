<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bonus extends Model
{
    /** @use HasFactory<\Database\Factories\BonuseFactory> */
    use HasFactory;

    protected $fillable = ['employee_id', 'description', 'amount', 'date'];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

}
