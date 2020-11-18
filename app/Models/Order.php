<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['price', 'received', 'description', 'employee_id','user_id'];

    public function employee()
    {
        return $this->belongsTo('App\Models\Employee');
    }

    

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
