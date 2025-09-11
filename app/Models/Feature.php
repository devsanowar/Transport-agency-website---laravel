<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    protected $guarded = ['id'];

    public function seo()
    {
        return $this->morphOne(SeoMeta::class, 'seoable');
    }
    
}
