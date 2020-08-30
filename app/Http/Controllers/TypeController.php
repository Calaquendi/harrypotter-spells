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
        $azIndex = array();
        $spellList = NULL;
        $typeName = NULL;
        $types = Type::all();
        foreach ($types as $type) {
            if (request()->is($type->type_url)) {
                $spellList = Spell::where('type_id', $type->id)->orderBy('name', 'ASC')->get();
                $typeName = $type->name;
            }
        }
        foreach ($spellList as $spell) {
            array_push($azIndex, $spell->name[0]);
        }
        $azList = array_unique($azIndex);
       
        return view('type', compact('typeName', 'spellList', 'azList') );
    }
}