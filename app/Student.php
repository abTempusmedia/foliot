<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
    'id',
    'name',
    'lastname',
    'parrent_name_1',
    'parrent_name_2',
    'birth_date',
    'address',
    'school',
    'email',
    'telephone',
    'mobile',
    'single_childe',
    'note',
    ];
}
