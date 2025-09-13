<?php

namespace App\Models;

use App\Models\WhyChooseUsFeature;
use Illuminate\Database\Eloquent\Model;

class WhyChooseUs extends Model
{
    protected $guarded = ['id'];
    public function features()
    {
        return $this->hasMany(WhyChooseUsFeature::class, 'why_choose_id');
    }
}
