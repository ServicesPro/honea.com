<?php

namespace App\Models;

use App\Models\AttributeValue;
use TCG\Voyager\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Attribute extends Model
{
    use HasFactory, Translatable;

    protected $guarded = [];

    public function values()
    {
        return $this->hasMany(AttributeValue::class);
    }
}
