<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log_spell extends Model
{
    protected $fillable = ['spell_id', 'visits'];
    
    public function spell()
    {
        return $this->belongsTo(Spell::class);
    }
}
