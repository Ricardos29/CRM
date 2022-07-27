<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory, SoftDeletes, Uuids;

    protected $table = 'courses';

    protected $fillable = [
        'title',
        'slug',
        'description',
        'body',
        'isActive'
    ];
}
