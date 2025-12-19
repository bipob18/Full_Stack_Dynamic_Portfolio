<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PortfolioProfile extends Model
{
    protected $fillable = [
        'brand_name',
        'full_name',
        'headline',
        'about',
        'email',
        'phone',
        'footer_text',
    ];
}

