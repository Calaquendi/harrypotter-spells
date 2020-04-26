<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSpellRequest;
use App\Spell;
use App\Type;
use Illuminate\Http\Request;

class SpellController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $spells = Spell::all();

        return view('admin.spells.index', compact('spells'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();

        return view('admin.spells.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSpellRequest $request)
    {

        Spell::create([
            'name' => $request->name,
            'full_name' => $request->full_name,
            'type' => $request->type,
            'color' => $request->color,
            'effect' => $request->effect,
            'description' => $request->description,
            'quote' => $request->quote,
            'history' => $request->history,
            'effect_full' => $request->effect_full,
            'additional_title' => $request->additional_title,
            'additional' => $request->additional,
            'etymology' => $request->etymology
        ]);

        return redirect()->route('spells.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $spell = Spell::findOrFail($id);
        $types = Type::all();

        return view('admin.spells.edit', compact('spell', 'types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreSpellRequest $request, $id)
    {
        $spell = Spell::findOrFail($id);
        $spell->update([
            'name' => $request->name,
            'full_name' => $request->full_name,
            'type' => $request->type,
            'color' => $request->color,
            'effect' => $request->effect,
            'description' => $request->description,
            'quote' => $request->quote,
            'history' => $request->history,
            'effect_full' => $request->effect_full,
            'additional_title' => $request->additional_title,
            'additional' => $request->additional,
            'etymology' => $request->etymology
        ]);

        return redirect()->route('spells.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $spell = Spell::findOrFail($id);
        $spell->delete();

        return redirect()->route('spells.index');
    }
}
