<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'surname', 'email', 'born_date'];
    
    public function orders()
    {

        return $this->hasMany('App\Models\Order');


    }
}
