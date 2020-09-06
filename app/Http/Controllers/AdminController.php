<?php

namespace App\Http\Controllers;

use App\Spell;
use App\Type;
use App\User;
use App\Log_search;
use App\Log_spell;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $spells = Spell::all();
        $types = Type::all();
        $users = User::all();
        $log_spells = Log_spell::all();
        $log_searches = Log_search::all();
        $log_spells_top = Log_spell::orderBy('visits', 'DESC')->limit(10)->get();
        $log_searches_top = Log_search::orderBy('visits', 'DESC')->limit(10)->get();
        $log_last_searches = Log_search::orderBy('updated_at', 'DESC')->limit(10)->get();

        return view('admin.index', compact(
                    'spells',
                    'types',
                    'users',
                    'log_spells',
                    'log_searches',
                    'log_spells_top',
                    'log_searches_top',
                    'log_last_searches',
                ));
    }
}
