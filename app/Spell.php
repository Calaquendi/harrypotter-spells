<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Spell extends Model
{
    protected $fillable = ['name', 'full_name', 'type', 'color', 'effect', 'description', 'quote', 'history', 'effect_full', 'additional_title', 'additional', 'etymology'];
}