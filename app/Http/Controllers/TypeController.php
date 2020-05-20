<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Type;
use App\Spell;

class TypeController extends Controller
{
    public function index()
    {
        $data = array();
        $spellList = NULL;
        $typeName = NULL;
        $types = Type::all();
        foreach ($types as $type) {
            if (request()->is($type->type_url)) {
                $spellList = Spell::where('type_id', $type->id)->get();
                $typeName = $type->name;
            }
        }
       
        return view('type', compact('typeName', 'spellList') );
    }
}