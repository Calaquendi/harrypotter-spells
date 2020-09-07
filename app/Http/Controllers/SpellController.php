<?php

namespace App\Http\Controllers;

use App\Spell;
use App\Type;
use App\Log_spell;
use Illuminate\Http\Request;

class SpellController extends Controller
{
    public function index($id)
    {
        $spell_id = null;
        $spells = Spell::where('spell_url', $id)->get();

        foreach($spells as $spell) {
            $spell_id = $spell->id;
        }
        if ($spell_id == null) {
            return back()->withInput();
        }
        //Log visits
        $log_spells = Log_spell::where('spell_id', $spell_id)->get();
        if ($log_spells->count() == 0) {
            Log_spell::create([
                'spell_id' => $spell_id,
                'visits' => 1
            ]);
        } else {
            foreach($log_spells as $log) {
                $visits = $log->visits;
            }
            Log_spell::where('spell_id', $spell_id)->update(['visits' => $visits+1]);
        }

        return view('spell', compact('spells'));
    }
}