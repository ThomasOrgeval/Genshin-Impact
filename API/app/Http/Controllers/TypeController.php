<?php

namespace App\Http\Controllers;

use App\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{

    public function selectAll()
    {
        return response()->json(Type::all());
    }

    public function select($id)
    {
        return response()->json(Type::find($id));
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'label' => 'required|unique:types',
        ]);

        $Type = Type::create($request->all());

        return response()->json($Type, 201);
    }

    public function update($id, Request $request)
    {
        $Type = Type::findOrFail($id);
        $Type->update($request->all());

        return response()->json($Type);
    }

    public function delete($id)
    {
        Type::findOrFail($id)->delete();
        return response('Deleted Successfully');
    }
}
