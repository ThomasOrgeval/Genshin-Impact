<?php

namespace App\Http\Controllers;

use App\Character;
use Illuminate\Http\Request;

class CharacterController extends Controller
{

    public function showAllChars()
    {
        return response()->json(Character::all());
    }

    public function showOneChar($id)
    {
        return response()->json(Character::find($id));
    }

    public function create(Request $request)
    {
        $Character = Character::create($request->all());

        return response()->json($Character, 201);
    }

    public function update($id, Request $request)
    {
        $Character = Character::findOrFail($id);
        $Character->update($request->all());

        return response()->json($Character);
    }

    public function delete($id)
    {
        Character::findOrFail($id)->delete();
        return response('Deleted Successfully');
    }
}
