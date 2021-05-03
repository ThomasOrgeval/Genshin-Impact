<?php

namespace App\Http\Controllers;

use App\TypeWeapon;
use Illuminate\Http\Request;

class TypeWeaponController extends Controller
{

    public function selectAll()
    {
        return response()->json(TypeWeapon::all());
    }

    public function select($id)
    {
        return response()->json(TypeWeapon::find($id));
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'label' => 'required|unique:weapons',
        ]);

        $Weapon = TypeWeapon::create($request->all());

        return response()->json($Weapon, 201);
    }

    public function update($id, Request $request)
    {
        $Weapon = TypeWeapon::findOrFail($id);
        $Weapon->update($request->all());

        return response()->json($Weapon);
    }

    public function delete($id)
    {
        TypeWeapon::findOrFail($id)->delete();
        return response('Deleted Successfully');
    }
}
