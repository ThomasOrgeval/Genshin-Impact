<?php

namespace App\Http\Controllers;

use App\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{

    public function selectAll()
    {
        return response()->json(Experience::all());
    }

    public function select($id)
    {
        return response()->json(Experience::find($id));
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'label' => 'required|unique:Experiences',
        ]);

        $Experience = Experience::create($request->all());

        return response()->json($Experience, 201);
    }

    public function update($id, Request $request)
    {
        $Experience = Experience::findOrFail($id);
        $Experience->update($request->all());

        return response()->json($Experience);
    }

    public function delete($id)
    {
        Experience::findOrFail($id)->delete();
        return response('Deleted Successfully');
    }
}
