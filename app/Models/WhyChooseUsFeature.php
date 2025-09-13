<?php

namespace App\Models;

use App\Models\WhyChooseUs;
use Illuminate\Database\Eloquent\Model;

class WhyChooseUsFeature extends Model
{
    protected $guarded = ['id'];

    public function section()
    {
        return $this->belongsTo(WhyChooseUs::class, 'why_choose_id');
    }
}
