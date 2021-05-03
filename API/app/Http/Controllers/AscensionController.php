<?php

namespace App\Http\Controllers;

use App\Ascension;
use Illuminate\Http\Request;

class AscensionController extends Controller
{

    public function selectAll()
    {
        return response()->json(Ascension::all());
    }

    public function select($id)
    {
        return response()->json(Ascension::find($id));
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'label' => 'required|unique:Ascensions',
        ]);

        $Ascension = Ascension::create($request->all());

        return response()->json($Ascension, 201);
    }

    public function update($id, Request $request)
    {
        $Ascension = Ascension::findOrFail($id);
        $Ascension->update($request->all());

        return response()->json($Ascension);
    }

    public function delete($id)
    {
        Ascension::findOrFail($id)->delete();
        return response('Deleted Successfully');
    }
}
