<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    /** @use HasFactory<\Database\Factories\ShiftFactory> */
    use HasFactory;

    protected $fillable = ['description', 'entry_time', 'exit_time'];

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
}
