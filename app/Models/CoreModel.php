<?php

namespace App\Models;

use App\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CoreModel extends Model
{
    use SoftDeletes;


    /**
     * Identifies that id will not be auto incrementing
     *
     * @var bool
     */
    public $incrementing = false;
}
