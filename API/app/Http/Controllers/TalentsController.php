<?php

namespace App\Http\Controllers;

use App\Talents;
use Illuminate\Http\Request;

class TalentsController extends Controller
{

    public function selectAll()
    {
        return response()->json(Talents::all());
    }

    public function select($id)
    {
        return response()->json(Talents::find($id));
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'label' => 'required|unique:Talents',
        ]);

        $Talent = Talents::create($request->all());

        return response()->json($Talent, 201);
    }

    public function update($id, Request $request)
    {
        $Talent = Talents::findOrFail($id);
        $Talent->update($request->all());

        return response()->json($Talent);
    }

    public function delete($id)
    {
        Talents::findOrFail($id)->delete();
        return response('Deleted Successfully');
    }
}
