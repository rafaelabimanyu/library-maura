<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fine extends Model
{
    protected $fillable = ['loan_id', 'amount', 'is_paid'];

    protected $casts = [
        'is_paid' => 'boolean',
    ];

    public function loan()
    {
        return $this->belongsTo(Loan::class);
    }
}
