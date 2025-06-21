<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    /** @use HasFactory<\Database\Factories\PayrollFactory> */
    use HasFactory;

    protected $fillable = [
        'employee_id', 'start_date', 'end_date',
        'total_hours_worked', 'total_overtime_hours',
        'total_bonuses', 'total_deductions', 'total_advances',
        'gross_salary', 'net_salary', 'payment_date'
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function taxObligations()
    {
        return $this->belongsToMany(TaxObligation::class, 'payroll_tax_obligation')->withPivot('amount');
    }
}
