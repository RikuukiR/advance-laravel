<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes as EloquentSoftDeletes;
use Illuminate\Database\SoftDeletes;

class Person extends Model
{
    use HasFactory;
    use EloquentSoftDeletes;
    protected $fillable = ['name', 'age'];
}
