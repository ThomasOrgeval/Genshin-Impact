<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ToolsController extends Controller
{
    function calculator()
    {
        $characters = DB::table('characters')->orderBy('label')->get();

        return view('tools.calculator',  ['characters' => $characters]);
    }
}
