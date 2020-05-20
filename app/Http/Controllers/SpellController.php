<?php

namespace App\Http\Controllers;

use App\Spell;
use App\Type;
use Illuminate\Http\Request;

class SpellController extends Controller
{
    public function index($id)
    {
        $spells = Spell::where('spell_url', $id)->get();

        return view('spell', compact('spells'));
    }
}