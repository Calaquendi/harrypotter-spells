<?php

namespace App\Http\Controllers;

use App\Spell;
use App\Type;
use App\User;
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

        return view('admin.index', compact('spells', 'types', 'users'));
    }
}
