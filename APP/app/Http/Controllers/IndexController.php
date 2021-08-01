<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    function index()
    {
        $characters = DB::table('characters')
            ->orderByDesc('rarity')
            ->orderBy('label')->get();

        return view('index', ['characters' => $characters]);
    }

    function signin(Request $request)
    {
        $user = DB::table('user')->where('mail', $request->post()['mail'])->first();

        if (Hash::check($request->post()['pass'], $user->pass)) {
            session([
                'id' => $user->id,
                'mail' => $user->mail,
                'uid' => $user->uid,
                'admin' => $user->admin
            ]);

            flash('Welcome!')->success();
        } else flash('Wrong request :/')->warning();
        return redirect('/');

    }

    function signup(Request $request)
    {

    }

    function logout()
    {
        session()->forget(['mail', 'id', 'uid', 'admin']);
        return redirect('/');
    }
}
