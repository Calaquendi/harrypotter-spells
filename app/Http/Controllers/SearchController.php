<?php

namespace App\Http\Controllers;

use App\Spell;
use App\Type;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
	 * Display a listing of the resource.
	 *
     * @param  string  $search
	 * @return Response
	 */
    public function postSearch(Request $request)
    {
        /*
        $meta_title = "Search results";
        $search = $request->input('search');
        $query = Spell::where('id', 'like', '%'.$search.'%')
                        ->orWhere('name', 'like', '%'.$search.'%')
                        ->orWhere('spell_url', 'like', '%'.$search.'%')
                        ->orWhere('full_name', 'like', '%'.$search.'%')
                        ->orWhere('effect', 'like', '%'.$search.'%')
                        ->orWhere('effect_full', 'like', '%'.$search.'%')
                        ->orWhere('history', 'like', '%'.$search.'%')
                        ->orWhere('additional_title', 'like', '%'.$search.'%');
        $spells = $query->get()->sortByDesc("created_at");

        return view('search', compact('spells', 'search'));
        */
        $search = $request->input('search');

        return redirect('search/'.$search);
    }

    /**
	 * Display a listing of the resource.
	 *
     * @param  string  $search
	 * @return Response
	 */
    public function getSearch($search)
    {
        $meta_title = "Search results";
        $query = Spell::where('id', 'like', '%'.$search.'%')
                        ->orWhere('name', 'like', '%'.$search.'%')
                        ->orWhere('spell_url', 'like', '%'.$search.'%')
                        ->orWhere('full_name', 'like', '%'.$search.'%')
                        ->orWhere('effect', 'like', '%'.$search.'%')
                        ->orWhere('effect_full', 'like', '%'.$search.'%')
                        ->orWhere('history', 'like', '%'.$search.'%')
                        ->orWhere('additional_title', 'like', '%'.$search.'%');
        $spells = $query->get()->sortByDesc("created_at");

        return view('search', compact('spells', 'search'));
    }
}