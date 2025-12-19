<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PortfolioEducation extends Model
{
    protected $fillable = [
        'degree',
        'institute',
        'start_year',
        'end_year',
        'grade',
        'description',
        'sort_order',
    ];
}

