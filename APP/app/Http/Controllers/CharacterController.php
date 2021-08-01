<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CharacterController extends Controller
{
    function index($label)
    {
        $c = DB::table('characters')->where('label', 'like', $label)->first();
        if (!empty($c)) {
            return view('characters.index', ['character' => $c]);
        } else return redirect('/');
    }
}
