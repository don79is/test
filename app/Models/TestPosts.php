<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TestPosts extends CoreModel
{
    protected $table = 'test_posts';

    protected $fillable = ['id', 'user_id', 'title', 'text','image','path'];


}
