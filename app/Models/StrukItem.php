<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StrukItem extends Model
{
    protected $guarded = [];

    public function struk()
    {
        return $this->belongsTo(Struk::class);
    }
}
