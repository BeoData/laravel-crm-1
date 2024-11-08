<?php

namespace Webkul\Category\Models;

use Illuminate\Database\Eloquent\Model;
use Webkul\Category\Contracts\Matters as MattersContract;

class Matters extends Model implements MattersContract
{
    protected $fillable = [];
}