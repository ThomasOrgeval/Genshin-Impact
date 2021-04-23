<?php

namespace App\Http\Controllers;

use App\Element;
use Illuminate\Http\Request;

class ElementController extends Controller
{

    public function selectAll()
    {
        return response()->json(Element::all());
    }

    public function select($id)
    {
        return response()->json(Element::find($id));
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'label' => 'required|unique:elements',
        ]);

        $Element = Element::create($request->all());

        return response()->json($Element, 201);
    }

    public function update($id, Request $request)
    {
        $Element = Element::findOrFail($id);
        $Element->update($request->all());

        return response()->json($Element);
    }

    public function delete($id)
    {
        Element::findOrFail($id)->delete();
        return response('Deleted Successfully');
    }
}
