<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'gramature',
        'coresta',
        'ukuran',
        'user_id',
        'date_order',
        'month_order',
        'week_order',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
