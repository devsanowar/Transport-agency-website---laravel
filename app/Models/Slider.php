<?php

namespace App\Models;

use App\Models\SeoMeta;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $guarded = ['id'];

    public function seo()
    {
        return $this->morphOne(SeoMeta::class, 'seoable');
    }
}
