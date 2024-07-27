<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transactions';
    protected $fillable = ['employee_id', 'hours', 'is_paid'];

    protected $attributes = [
        'is_paid' => false,
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
