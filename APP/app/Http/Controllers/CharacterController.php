<?php

namespace App\Http\Controllers;

use DateTime;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CharacterController extends Controller
{
    /**
     * @throws Exception
     */
    function index($label)
    {
        $c = DB::table('characters')
            ->where('label', 'like', str_replace('-', ' ', $label))->first();

        if (!empty($c)) {
            $date = new DateTime($c->birthday . '-0000');
            $c->birthday = $date->format('d F');

            return view('characters.index', ['character' => $c]);
        } else return redirect('/');
    }
}
