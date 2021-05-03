<?php

namespace App\Http\Controllers;

use App\Talent;
use Illuminate\Http\Request;

class TalentController extends Controller
{

    public function selectAll()
    {
        return response()->json(Talent::all());
    }

    public function select($id)
    {
        return response()->json(Talent::find($id));
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'label' => 'required|unique:Talents',
        ]);

        $Talent = Talent::create($request->all());

        return response()->json($Talent, 201);
    }

    public function update($id, Request $request)
    {
        $Talent = Talent::findOrFail($id);
        $Talent->update($request->all());

        return response()->json($Talent);
    }

    public function delete($id)
    {
        Talent::findOrFail($id)->delete();
        return response('Deleted Successfully');
    }
}
