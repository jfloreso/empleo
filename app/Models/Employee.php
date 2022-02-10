<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Skill;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employees';
    protected $with = ['skills'];
    protected $fillable = [
        'name',
        'email',
        'jobposition',
        'datebirth',
        'address'
    ];

    public function skills()
    {
        return $this->hasMany(Skill::class,'employee_id','id');
    }

}
