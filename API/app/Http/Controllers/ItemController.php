<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{

    public function selectAll()
    {
        return response()->json(Item::all());
    }

    public function select($id)
    {
        return response()->json(Item::find($id));
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'label' => 'required|unique:items',
        ]);

        $Item = Item::create($request->all());

        return response()->json($Item, 201);
    }

    public function update($id, Request $request)
    {
        $Item = Item::findOrFail($id);
        $Item->update($request->all());

        return response()->json($Item);
    }

    public function delete($id)
    {
        Item::findOrFail($id)->delete();
        return response('Deleted Successfully');
    }
}
