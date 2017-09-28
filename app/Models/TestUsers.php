<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class TestUsers extends Authenticatable
{
    use Notifiable;
    public $incrementing = false;
    use SoftDeletes;

    protected $table = 'test_users';

    protected $fillable = ['id', 'name', 'email', 'password'];

    protected $hidden = [
        'password', 'remember_token',

    ];}
