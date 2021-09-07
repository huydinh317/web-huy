<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = "Users";
    protected $primaryKey = 'id';
    protected $fillable = ['fullname','password','address','level','phone','email'];
    
}
