<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class admin extends Model
{
    use HasFactory;
    protected $table ='admin_info';
    protected $fillable = [
        'username',
        'email',
        'mobile_number',
        'bio',
        'gender',
        'category'
       
    ];
}
