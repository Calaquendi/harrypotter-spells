<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Type;
use App\Spell;

class HomeController extends Controller
{
    public function index()
    {
        $spells = Spell::all();
        $types = Type::all();
        return view('index', compact('types', 'spells') );
    }
}
