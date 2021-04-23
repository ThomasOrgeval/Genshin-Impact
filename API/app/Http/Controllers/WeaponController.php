<?php

namespace App\Http\Controllers;

use App\Weapon;
use Illuminate\Http\Request;

class WeaponController extends Controller
{

    public function selectAll()
    {
        return response()->json(Weapon::all());
    }

    public function select($id)
    {
        return response()->json(Weapon::find($id));
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'label' => 'required|unique:weapons',
        ]);

        $Weapon = Weapon::create($request->all());

        return response()->json($Weapon, 201);
    }

    public function update($id, Request $request)
    {
        $Weapon = Weapon::findOrFail($id);
        $Weapon->update($request->all());

        return response()->json($Weapon);
    }

    public function delete($id)
    {
        Weapon::findOrFail($id)->delete();
        return response('Deleted Successfully');
    }
}
