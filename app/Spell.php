<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Spell extends Model
{
    protected $fillable = ['name', 'spell_url', 'img', 'full_name', 'type_id', 'color', 'effect', 'description', 'quote', 'history', 'effect_full', 'additional_title', 'additional', 'etymology'];
    
    public function type()
    {
        return $this->belongsTo(Type::class);
    }

}