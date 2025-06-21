<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaxObligation extends Model
{
    /** @use HasFactory<\Database\Factories\TaxObligationFactory> */
    use HasFactory;

    protected $fillable = ['name', 'description', 'percentage'];

    public function payrolls()
    {
        return $this->belongsToMany(Payroll::class, 'payroll_tax_obligation')->withPivot('amount');
    }
}
