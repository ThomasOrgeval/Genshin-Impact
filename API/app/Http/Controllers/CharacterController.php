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
        $this->validate($request, [
            'label' => 'required|unique:characters',
            'element' => 'required|integer',
            'weapon' => 'required|integer',
            'rarity' => 'required|integer',
            'lvl_up_material1' => 'integer',
            'lvl_up_material2' => 'integer',
            'lvl_up_material3' => 'integer',
            'talent_up_material1' => 'integer',
            'talent_up_material2' => 'integer',
            'talent_up_material3' => 'integer',
        ]);

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
