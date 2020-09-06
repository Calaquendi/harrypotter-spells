<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSpellRequest;
use App\Spell;
use App\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminSpellController extends Controller
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

        if (is_null($request->file('img'))) {
            $path = '';
        } else {
            $imgName = preg_replace('/\s+/', '-', $request->spell_url) . '.' . $request->file('img')->getClientOriginalExtension();
            $path = $request->file('img')->storeAs('spells', $imgName, 'public');
        }

        Spell::create([
            'name' => $request->name,
            'spell_url' => $request->spell_url,
            'img' => $path,
            'full_name' => $request->full_name,
            'type_id' => $request->type_id,
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

        if (!empty($request->file('img'))) {
            $imgName = preg_replace('/\s+/', '-', $request->spell_url) . '.' . $request->file('img')->getClientOriginalExtension();
            $path = $request->file('img')->storeAs('spells', $imgName, 'public');
        } elseif (!empty($spell->img)) {
            $path = $spell->img;
        } else {
            $path = '';
        }

        if (!empty($request->input('deleteImg'))) {
            Storage::disk('public')->delete($spell->img);
            $path = '';
        }

        $spell->update([
            'name' => $request->name,
            'spell_url' => $request->spell_url,
            'img' => $path,
            'full_name' => $request->full_name,
            'type_id' => $request->type_id,
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
        Storage::disk('public')->delete($spell->img);
        $spell->delete();

        return redirect()->route('spells.index');
    }

}
