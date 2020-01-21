<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Employee extends Authenticatable
{
    protected $table = 'employee_data';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'emp_id','name_prefix','first_name','middle_initial','last_name','gender','email','father_name','mother_name','mother_maiden','date_of_birth','date_of_joining','salary','ssn','phone_no','city','state','zip'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];

    public function getFullNameAttribute() {
        return implode(' ', [$this->name_prefix, $this->last_name, $this->first_name]);
    }
}
