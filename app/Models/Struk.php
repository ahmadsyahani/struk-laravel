<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Struk extends Model
{
    protected $guarded = [];

    public function items()
    {
        return $this->hasMany(StrukItem::class);
    }
}
