<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    /** @use HasFactory<\Database\Factories\EmployeeFactory> */
    use HasFactory;
    protected $fillable = [
        'first_name', 'last_name', 'dui', 'address', 'phone',
        'birth_date', 'gender', 'branch_id', 'contract_type_id', 'shift_id',
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function contractType()
    {
        return $this->belongsTo(ContractType::class);
    }

    public function shift()
    {
        return $this->belongsTo(Shift::class);
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }

    public function bonuses()
    {
        return $this->hasMany(Bonus::class);
    }

    public function overtimes()
    {
        return $this->hasMany(Overtime::class);
    }

    public function advances()
    {
        return $this->hasMany(Advance::class);
    }

    public function lossDeductions()
    {
        return $this->hasMany(LossDeduction::class);
    }

    public function payrolls()
    {
        return $this->hasMany(Payroll::class);
    }
}
