<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PortfolioSocialLink extends Model
{
    protected $fillable = [
        'platform',
        'url',
        'sort_order',
    ];
}

