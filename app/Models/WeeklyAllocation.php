<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeeklyAllocation extends Model
{
    use HasFactory;
    protected $fillable = ['start_date', 'allocated_kilograms'];

    public function orders()
    {
        return $this->hasMany(Order::class, 'date_order', 'start_date');
    }
}