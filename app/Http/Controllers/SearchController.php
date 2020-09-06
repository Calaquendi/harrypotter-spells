<?php

namespace App\Http\Controllers;

use App\Spell;
use App\Type;
use App\Log_search;
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
        $search = $request->input('search');
        if ($search == null) {
            return back()->withInput();
        } else {
            return redirect('search/'.$search);
        }
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

        //Log searches
        $log_search = Log_search::where('search', $search)->get();
        if ($log_search->count() == 0) {
            Log_search::create([
                'search' => $search,
                'visits' => 1
            ]);
        } else {
            foreach($log_search as $log) {
                $id = $log->id;
                $visits = $log->visits;
            }
            Log_search::where('id', $id)->update(['visits' => $visits+1]);
        }
        
        return view('search', compact('spells', 'search'));
    }
}