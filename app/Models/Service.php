<?php

namespace App\Models;

use App\Models\SeoMeta;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $guarded = ['id'];
    public function seo()
    {
        return $this->morphOne(SeoMeta::class, 'seoable');
    }

    protected $casts = [
        'service_features' => 'array',
    ];
}
