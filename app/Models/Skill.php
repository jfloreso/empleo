<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;

class Skill extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'level',
        'employee_id',  // foreign key
    ];

}
